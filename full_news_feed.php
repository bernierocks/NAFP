<?
$full_width = 'Y';
$title = "News Archive";
include("header.php");
require_once("includes/config.php");
include ("chap_news_curl.php");

$news1 = json_decode($data, true);

//echo '<pre>';
//print_r ($news1);
//echo '</pre>';

if (count($news1) == "0"){
	echo '<center><span style="font-size:14px; color:#000000; font-weight:bold;">No Current News Posts</span></center>';
} else {
	$news_counter==0;
	$txt_limit = 100;
	foreach ($news1 as $news){	
		$category = $news['news_cats'];		
		

		$nws_month = date('M', strtotime($news['publish_date']));
		$nws_day = date('d', strtotime($news['publish_date']));
		$nws_title = $news['title'];
		$nws_blurb = $news['description'];
		$nws_id = $news['news_id'];
		$nws_link = $news['link'];
		//$nws_blurb = (strlen($nws_blurb)>$txt_limit)? substr($nws_blurb, 0, strpos($nws_blurb, ' ', $txt_limit)).'... ': $nws_blurb;
		++$news_counter;
		echo '<div class="nws-item">
				<table class="nws-table">
					<tr>
						<td class="nws-date" valign="top">
							<div class="nws-date-wrapper">
								<div class="nws-month">
									'.$nws_month.'
								</div>
								<div class="nws-day">
									'.$nws_day.'
								</div>
							</div>
						</td>
						<td class="nws-text" valign="top">';
						if ($nws_link != ""){
							if (substr($nws_link, -3) == "htm"){
								echo '<a class="black" href="'.$base.'news_manager.php?page='.$nws_id.'">'.$nws_title.'</a>';
								$readmore = '<a class="nws-more-info-link" href="'.$base.'news_manager.php?page='.$nws_id.'">More Info</a>';
							} else {
								echo '<a class="black" href="'.$base.'news_manager.php?page='.$nws_id.'">'.$nws_title.'</a>';	
								$readmore = '<a class="nws-more-info-link" href="'.$nws_link.'">Read More</a>';
							}
						} else {
							echo '<div class="black nws-title">'.$nws_title.'</div>';
						}
			echo '<br />
							'.$nws_blurb.' '.$readmore.'
							
						</td>
					</tr>
				</table>
			</div>';
		}
		
	}
	//echo '<div class="txt-r"><a href="http://www.memberleap.com/news_archive.php?org_id=NHVT">News Archive <img src="'.$base.'images/icon-adtl.png" /></a>&nbsp;</div>';
	echo '<div class="clearfix"></div>';
include('footer.php');
?>