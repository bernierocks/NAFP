<?
$url = 'https://www.memberleap.com/slideshows/json_feed.php?org_id=AHAM&ban=FD3';		
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
$data = curl_exec($ch);
curl_close($ch);  
if($data && strlen($data) > 2){
	$data = json_decode($data, true);
	$randKey = array_rand($data);
	$bg_slide = $data[$randKey]['src'];
	
}else{
	echo 'SLIDESHOW NOT CONFIGURED';
}
?>