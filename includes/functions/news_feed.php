<?
include('includes/config.php');
/************************************************************

		DON'T EDIT ANYTHING BELOW THIS :)

************************************************************/
function news_feed($o){
		//sets some globals and vars
	global $org_id;
	global $server_name;
	global $base;
	$counter=1;
	$template = file_get_contents($o['template_file']);
	if($template === false){
		echo '<br><br><br><br><center><b>Template not set.  Please set template.</b></center><br><br><br><br>';
		return;
	}
		//gets the json feed of $events
	$ch = 	curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.'.$server_name.'/members/news_xml/'.$org_id.'_rss.json');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
		$data = array('org_code' => $org_id,
		'username' => $username,
		'password' => $password
	);
	$data = curl_exec($ch);
	$news_items = json_decode($data, true);
		//uncomment the next part to see all your mistakes!
	// echo '<pre>';
	// print_r($events);
	// echo '<pre>';
	// die();
	
	
	
	$replace_keys = array(
		'##DATE##',
		'##DAY##',
		'##MONTH##',
		'##YEAR##',
		
		'##TITLE##',
		'##DESCRIPTION##',
		'##URL##',
		'##MORE_LINK##',
		'##IMAGE##'
	);
	
	//start the looooooooooop!
	if (count($news_items) < 1){
		echo '<br><br><br><br><center><b>No Current News</b></center><br><br><br><br>';
	} else {
		if($o['newest_first'] == true){
			rsort($news_items);
		}
		foreach ($news_items as $news){
				//continue test
				//skip this event if A) max number of events has been reached OR B) if it's an empty event record OR C) The event startdate is before today
			if(/*A*/$o['number_of_news_items'] !== false && $o['number_of_news_items'] < $counter || /*B*/ $news['news_id'] == '' || ($o['news_categories'] != '' && !in_array($o['news_categories'],$news['news_cats'])) ){
				continue;
			}
				//setting more vars!
			$news_id	= $news['news_id'];
			
				// full details URL and "more" link 
			$target = ($o['open_links_in_new_tab'] == true)?' target="_blank" ':'';
			
			if (substr($news['link'], -3) == "htm"){
				$details_url = $base.'news_manager.php?page='.$news_id;
			} else {
				$details_url = $news['link'];
			}
			
			if($o['read_more_link'] !== false && $o['read_more_link'] != '' && $details_url != ''){
				$news_more_link = '<a class="news-more-info-link" '.$target.' href="'.$details_url.'">'.$o['read_more_link'].'</a>';
			} else {
				$news_more_link = '';
			}
				//Get the news image and put it in an image tag
			if(count($news['image'])>0){
				$news_image = '<img src="'.$news['image']['url'].'" />';
			}
				//set title link or not
			if($o['title_as_link'] === true && $details_url != ''){
				$news_title = '<a class="news-title-link" '.$target.' href="'.$details_url.'">'.$news['title'].'</a>';
			} else {
				$news_title = $news['title'];
			}
			
				// format the blurb: remove tags, handle text limits
			$news_blurb = $news['description'];
			if($o['desc_text_limit'] !== false){
				if($o['desc_text_hard_break'] === false){
					$news_blurb = (strlen($news_blurb)>$o['desc_text_limit'])? substr($news_blurb, 0, strpos($news_blurb, ' ', $o['desc_text_limit'])).'... ': $news_blurb;
				} else {
					$news_blurb = (strlen($news_blurb)>$o['desc_text_limit'])? substr($news_blurb, 0,  $o['desc_text_limit']).'... ': $news_blurb;
				}
			}
			
			$replace_values = array(
				date($o['format_full_date'],strtotime($news['publish_date'])),
				date($o['format_day'],strtotime($news['publish_date'])),
				date($o['format_month'],strtotime($news['publish_date'])),
				date($o['format_year'],strtotime($news['publish_date'])),
				
				$news_title,
				$news_blurb,
				$details_url,
				$news_more_link,
				$news_image
			);
			echo str_replace($replace_keys,$replace_values,$template);
			++$counter;
		}
	}
}
echo '<!-- News Feed Loaded -->';
?>