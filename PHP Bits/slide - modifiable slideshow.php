			<?
			$url = 'https://www.memberleap.com/slideshows/json_feed.php?org_id=AHAM&ban=FD2';		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
			$data = curl_exec($ch);
			curl_close($ch);  
			if($data && strlen($data) > 2){
				$data = json_decode($data, true);
				$randNum = mt_rand();
				// echo '<pre>';
				// print_r($data);
				// echo '</pre>';
				$slide_number = 0;
				$fs=1;
				foreach($data as $key => $value){
					$alt = $value['alt'];
					$caption = ($value['cap'] != '')?'<div class="carousel-caption"><p>'.$value['cap'].'</p></div>':'';
					if($fs<=1){
						$active = " active";
						++$fs;
					} else {
						$active = '';
					}
					$slides .= '<div class="item '.$active.'" data-slide-number="'.$slide_number.'">
									<a href="'.$value['url'].'" >
										<img src="'.$value['src'].'" alt="" title="" />
										'.$caption.'
									</a>
								</div>';
					$indicators .= '<li data-target="#carousel_'.$randNum.'" data-slide-to"'.$slide_number.'"></li>';
					
				}
				echo '<div id="carousel_'.$randNum.'" class="carousel slide">';
				 // echo '	<ol class="carousel-indicators">
						 // '.$indicators.'
					 // </ol>';
				echo '<div class="carousel-inner">
						'.$slides.'
					</div>
						<a class="carousel-control left" href="#carousel_'.$randNum.'" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#carousel_'.$randNum.'" data-slide="next">&rsaquo;</a>
					</div>
					<script type="text/javascript">
						$(\'.carousel\').carousel({ 
							interval: 5000 
						});
					</script>';
			}else{
				echo 'SLIDESHOW NOT CONFIGURED';
			}
			?>