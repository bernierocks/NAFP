<?
function print_element($element, $params = array()){
	global $org_id, $org_name, $login_url, $PTR, $base, $svr_name;

	switch($element){
		case 'content_area':
			if(!isset($params['file_name'])){
				echo 'FILENAME NOT SET';
			}else{
				?>
				<div class="content-wrapper">
					<div class="content-head">
						<div class="content-title">
							<?=$params['title']?>
						</div>
					</div>
					<div class="content-accent"></div>
					<div class="content-body">
						<?
						if($params['file_name']=='__NEW__'){
							echo $params['inline_content'];
						}else{
							@readfile($PTR.$params['file_name']);
						}
						?>
					</div>
				</div>
				<?
			}
		break;
		
		case 'newsfeed':
			if(!isset($params['feed']) || $params['feed'] == ''){
				echo 'FEED NOT SET';
				print_r($params);
			}else{
				?>
				<div class="content-wrapper">
					<div class="content-head">
						<div class="content-title">
							<?=$params['title']?>
						</div>
					</div>
					<div class="content-accent"></div>
					<div class="content-body">
						<?
						//Newsfeed URL: /public_html/members/news_xml/ORG_ID_rss.json
						$url = $params['feed'];

						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
						$data = curl_exec($ch);
						curl_close($ch);  

						if($data && strlen($data) > 2){
							$records = json_decode($data, true);
							if (!empty ($records))
							{
							foreach($records as $row){
								$time = strtotime($row['publish_date']);
								$mm = date('F',$time);
								$day = date('d',$time);

								++$news_counter;
								echo '<div class="event-news-container">
										<div class="clear-both"></div>';
								
								if ($row['link'] <> ""){
									if (substr($row['link'], -3) == "htm"){
										echo '
											<div class="event-news-date-box float-left">
												<div class="event-news-date-box-text"><a class="news-link" href="'.$base.'news_manager.php?page='.$row['news_id'].'">'.$mm.' <br />'.$day.' <bt></a></div>
											</div>
											<div class="event-news-arrow float-left"></div>
											<span class="event-news-title"><a href="'.$base.'news_manager.php?page='.$row['news_id'].'">'.$row['title'].'</a></span><br />';
									} else {
										echo '
											<div class="event-news-date-box float-left">
												<div class="event-news-date-box-text"><a class="news-link" href="'.$row['link'].'">'.$mm.' <br />'.$day.' <bt></a></div>
											</div>
											<div class="event-news-arrow float-left"></div>
											<span class="event-news-title"><a href="'.$row['link'].'">'.$row['title'].'</a></span><br />';	
									}
								} else {
									echo '<div class="event-news-date-box float-left">
											<div class="event-news-date-box-text">'.$mm.' <br />'.$day.' <bt></div>
										</div>
										<div class="event-news-arrow float-left"></div>
										<span class="event-news-title">'.$row['title'].'</span><br />';
								}
								echo '<span class="news-date">Posted '.$mm.' '.$day.', '.$year.'</span><br />';
								
								
								
								echo '<div class="news-body">';
								
								if(isset($row['image']) && is_array($row['image']) && $row['image']['url'] != ''){
									echo '<img class="news-image" src="'.$row['image']['url'].'" align="left" width="90" />';
								}

								echo nl2br(trim($row['description'])).'<br />';

								if ($row['link'] <> ""){
									if (substr($row['link'], -3) == "htm"){
										echo '<a class="news-read-more-link" href="'.$base.'news_manager.php?page='.$row['news_id'].'"><span class="news-read-more">Read More &gt;&gt;</span></a><br />';
									} else {
										echo '<a href="'.$row['link'].'"><span class="news-read-more" >Read More &gt;&gt;</span></a><br />';	
									}
								}
								echo '</div>';
								echo '</div><div class="clear-both"></div>';
							}
							}
						}else{
							echo 'No News Available';
						}
						?>
					</div>
				</div>
				<?
			}
		break;
		
		case 'calendar':
			$rand = md5(uniqid(rand(), true));
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<div id="gcal_<?=$rand?>"></div>
					<script type="text/javascript">
						$(function(){
							$('#gcal_<?=$rand?>').fullCalendar({
								header: {
									left: 'prev',
									center: 'title',
									right: 'next'
								},
								eventMouseover: function(event, jsEvent, view) {
									if (view.name !== 'agendaDay') {
										$(jsEvent.target).attr('title', event.title);
										$('.fc-event').tooltip();
									}
								},
								events: {
									url: '<?=$params['feed']?>',
									type: 'POST',
									dataType: "jsonp"
								}
							});
						});
					</script>
					<style type="text/css">
						.col-md-3 #gcal_<?=$rand?>, .span4 #gcal_<?=$rand?>{
							font-size: 12px;		
						}
						.col-md-3 #gcal_<?=$rand?> .fc-header-title h2, .span4 #gcal_<?=$rand?> .fc-header-title h2 {
							font-size: 1em;
						}
						.col-md-3 #gcal_<?=$rand?> .fc-view-month .fc-event, .col-md-3 #gcal_<?=$rand?> .fc-view-agendaWeek .fc-event, .span4 #gcal_<?=$rand?> .fc-view-month .fc-event, .span4 #gcal_<?=$rand?> .fc-view-agendaWeek .fc-event {
							font-size: 0;
							overflow: hidden;
							height: 6px;
						}
						.col-md-3 #gcal_<?=$rand?> .fc-view-agendaWeek .fc-event-vert, .span4 #gcal_<?=$rand?> .fc-view-agendaWeek .fc-event-vert {
							font-size: 0;
							overflow: hidden;
							width: 2px !important;
						}
						.col-md-3 #gcal_<?=$rand?> .fc-agenda-axis, .span4 #gcal_<?=$rand?> .fc-agenda-axis {
							width: 20px !important;
							font-size: .9em;
						}
						.col-md-3 #gcal_<?=$rand?> .fc-button-content, .span4 #gcal_<?=$rand?> .fc-button-content {
							padding: 0;
						}?
					</style>
				</div>
			</div>
			<?
		break;
		
		case 'slideshow':
			if($params['wrapper']){
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<?
			}else{
				echo '<div class="slideshow-wrapper">';
			}
			$url = $params['scroller'];
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
			$data = curl_exec($ch);
			curl_close($ch);  
			if($data && strlen($data) > 2){
				$data = json_decode($data, true);
				echo $data['html'];
			}else{
				echo 'SLIDESHOW NOT CONFIGURED';
			}
			
			if($params['wrapper']){
					?>
				</div>
			</div>
			<?
			}else{
				echo '</div>';
			}
		break;
		
		case 'new_member_scroller':
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<iframe src="//<?=$svr_name?>/news_scroller/member_content.php?org_id=<?=$org_id?>&size=<?=intval($params['font_size'])?>&face=<?=$params['font_face']?>&days=<?=intval($params['days'])?>&font_color=<?=urlencode($params['font_color'])?>" height="<?=intval($params['height'])?>" width="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" seamless="seamless"></iframe>
				</div>
			</div>
			<?
		break;
		
		case 'scrolling_calendar':
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<iframe 
						src="//<?=$svr_name?>/calendar_scroller/content_fancy.php?org_id=<?=$org_id?>&size=<?=intval($params['font_size'])?>&face=<?=$params['font_face']?>&days=<?=intval($params['days'])?>&clr=<?=urlencode($params['font_color'])?>" height="<?=intval($params['height'])?>" width="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" seamless="seamless"></iframe>
				</div>
			</div>
			<?
		break;
		
		case 'scrolling_press_releases':
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<iframe src="//<?=$svr_name?>/news_scroller/pr_content.php?org_id=<?=$org_id?>&size=<?=intval($params['font_size'])?>&face=<?=$params['font_face']?>&days=<?=intval($params['days'])?>&clr=<?=$params['font_color']?>" height="<?=intval($params['height'])?>" width="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" seamless="seamless"></iframe>
				</div>
			</div>
			<?
		break;
		
		case 'scrolling_news':
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<iframe src="//<?=$svr_name?>/news_scroller/content.php?org_id=<?=$org_id?>&size=<?=intval($params['font_size'])?>&face=<?=$params['font_face']?>&days=<?=intval($params['days'])?>&clr=<?=$params['font_color']?>" height="<?=intval($params['height'])?>" width="100%" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" seamless="seamless"></iframe>
				</div>
			</div>
			<?
		break;
		
		case 'coupon_signup_form':
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<iframe src="//<?=$svr_name?>/members/directory/coupons/signup.php?org_id=<?=$org_id?>&HEADLESS" scrolling="no" frameborder="0" width="100%" height="300">
					<p>Your browser does not support iframes.</p>
					</iframe>
				</div>
			</div>
			<?
		break;
		
		case 'multi_search':
			?>
			<div class="content-wrapper">
				<div class="content-head">
					<div class="content-title">
						<?=$params['title']?>
					</div>
				</div>
				<div class="content-accent"></div>
				<div class="content-body">
					<form method="POST" action="//<?=$svr_name?>/members/search/query.php">
						<input type="hidden" name="org_id" value="<?=$org_id?>" />
						<input type="text" class="search-query" name="keyword" size="20" placeholder="Search" />
						<input type="submit" value="Search" class="btn" />
					</form>
				</div>
			</div>
			<?
		break;

		case 'login_box':
			?>
			<div style="text-align:right;">
				<a class="btn btn-primary" data-toggle="modal" href="#login_box" >Login</a>
			</div>

			<div class="modal hide" id="login_box">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h3>Login to <?=$org_name?></h3>
			  </div>
			  <div class="modal-body">
				<form method="post" action="<?=$login_url?>" name="login_form">
				  <p><input type="text" class="col-md-3" name="Username" id="Username" placeholder="Username"></p>
				  <p><input type="password" class="col-md-3" name="Password" placeholder="Password"></p>
				  <p><button type="submit" class="btn btn-primary">Sign in</button>
					<a href="#">Forgot Password?</a>
				  </p>
				</form>
			  </div>
			  <div class="modal-footer">
				New To <?=$org_name?>?
				<a href="<?=str_replace('gateway.php','',$login_url).'newmem/registration.php?orgcode='.$org_id?>" class="btn btn-primary">Register</a>
			  </div>
			</div>
			<?
		break;
	}

}
?>