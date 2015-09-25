<?

header("Content-type: image/gif");

$string = $o_row[name];



$im = imagecreate(100,40);  //create the big image...



$bg = imagecolorallocate($im, 235, 235, 255);

$blue = imagecolorallocate($im, 0, 0, 255);

$red = imagecolorallocate($im, 255, 150, 150);

$green = imagecolorallocate($im, 0, 255, 0);

$grey = imagecolorallocate($im, 120,120,120);

$light_grey = imagecolorallocate($im, 220,220,220);

$black = imagecolorallocate($im, 0,0,0);

//$px    = (imagesx($im) - 7.5 * strlen($string)) / 2;



$ts_year = date("Y")-3;

$base_ts = strtotime($ts_year."-01-01");

//$base_ts = strtotime("2003-01-01");

$scale = 3;



$style = array($red);

imagesetstyle($im, $style);



		

//imagestring($im, 4, 20,20, "test", $grey);

	

//determine top number, record counts\

for ($i = 1; $i <=15; $i++)

	{

	$xx1 = rand(-50,150);

	$yy1 = rand(-50,150);

	$xx2 = rand(-50,150);

	$yy2 = rand(-50,150);

	

imageline ( $im, $xx1, $yy1, $xx2, $yy2, IMG_COLOR_STYLED );  

	}

//imagesetthickness($im, 8);

//imageline ( $im, $x+10, 200, $x+10, 200-($sf*$count_array[$tm]), $red );  



$string = $_GET['code'];



imagestring($im, 5, 10 ,15, $string, $black);



imagegif($im);

imagedestroy($im);



?> 