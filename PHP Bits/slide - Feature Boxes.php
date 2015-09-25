<?	$url = 'https://www.memberleap.com/slideshows/json_feed.php?org_id=MOTA&ban=FD1';		
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
$data = curl_exec($ch);
curl_close($ch);  
if($data && strlen($data) > 2){
	$data = json_decode($data, true);
	echo '<div class="row">';
	foreach($data as $k => $v){
		$fb_src = $v['src'];
		$fb_link = $v['url'];
		$fb_cap_text = $v['cap'];
		$fb_alt_text = $v['alt'];
		echo  '
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="feature-box">
				<a href="'.$fb_link.'"><img src="'.$fb_src.'" class="img-responsive" alt="'.$fb_alt_text.'" /></a>
			</div>
		</div>';
	}
	echo '</div>';
}else{
	echo 'Feature Boxes Not Set';
} ?>