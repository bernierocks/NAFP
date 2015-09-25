<?php
echo '<!-- RSS News Feed Loaded -->';
require_once("parseXML3.php");

function get_rss_news($feed_url){
	$ch = 	curl_init();
		curl_setopt($ch, CURLOPT_URL, $feed_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
		curl_setopt($ch,CURLOPT_TIMEOUT,5000);
		$data = curl_exec($ch);

		curl_close($ch);  
		//define class 
		$pxml = new ParseXML;
		//parse xml array data
		$xml_array = $pxml->GetXMLTree($data);
		//define variable for array data
		$array_news=$xml_array;
		return $array_news;
}
function rss_news_feed($o = ''){
	$template = file_get_contents($o['template_file']);
	$array_news = get_rss_news($o['feed_url']);
	$news1 = $array_news['RSS']['0']['CHANNEL']['0']['ITEM'];

	if (count($news1) == "0"){
		$errors .= '<center><span style="font-size:14px; color:#000000; font-weight:bold;">No Current News Posts</span></center>';
	} else {
		$news_counter==0;
		$replace_keys = array(
			'##DATE##',
			'##DAY##',
			'##MONTH##',
			'##YEAR##',
			
			'##TITLE##',
			'##DESCRIPTION##',
			'##URL##',
			'##MORE_LINK##',
		);
		
		foreach ($news1 as $news){			
			
			$date 			= $news['PUBDATE']['0']['VALUE'];
			//$date 			= date("F jS, Y", strtotime($date));
			$title 			= $news['TITLE']['0']['VALUE'];
			$category 		= $news['CATEGORY']['0']['VALUE'];
			$details_url	= $news['LINK']['0']['VALUE'];
			$news_blurb 	= $news['DESCRIPTION']['0']['VALUE'];
			echo 't: '.$title;
			
			if ($news_counter == $o['number_of_news_items']){
				continue;
			}
		
			$target = ($o['open_links_in_new_tab'] == true)?' target="_blank" ':'';
			
			if($o['read_more_link'] !== false && $o['read_more_link'] != ''){
				$news_more_link = '<a class="news-more-info-link" '.$target.' href="'.$details_url.'">'.$o['read_more_link'].'</a>';
			} else {
				$news_more_link = '';
			}
			
			if($o['title_as_link'] === true){
				$news_title = '<a class="news-title-link" '.$target.' href="'.$details_url.'">'.$title.'</a>';
			} else {
				$news_title = $news['title'];
			}
						
			$news_blurb = iconv("utf-8","iso-8859-1//translit",$news_blurb);
			$news_blurb = strip_tags($news_blurb);
			
			if($o['desc_text_limit'] !== false){
				if($o['desc_text_hard_break'] === false){
					$news_blurb = (strlen($news_blurb)>$o['desc_text_limit'])? substr($news_blurb, 0, strpos($news_blurb, ' ', $o['desc_text_limit'])).'... ': $news_blurb;
				} else {
					$news_blurb = (strlen($news_blurb)>$o['desc_text_limit'])? substr($news_blurb, 0,  $o['desc_text_limit']).'... ': $news_blurb;
				}
			}
			
			$replace_values = array(
				date($o['format_full_date'],strtotime($date)),
				date($o['format_day'],strtotime($date)),
				date($o['format_month'],strtotime($date)),
				date($o['format_year'],strtotime($date)),
				
				$title,
				$news_blurb,
				$details_url,
				$news_more_link,
			);
			
			echo str_replace($replace_keys,$replace_values,$template);
			++$news_counter;
		}
	}
}