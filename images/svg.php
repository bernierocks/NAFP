<?header('Content-type: image/svg+xml');
echo '<?xml version="1.0" encoding="iso-8859-1"?>';
include('../includes/functions/svg_icons.php');
if($_GET['i'] != ''){
	$size = ($_GET['s'] != '')?$_GET['s']:'25';
	if(strlen($_GET['c'])==6){
		$color = '#'.$_GET['c'];
	} else {
		$color = ($_GET['c'] != '')?$_GET['c']:'#000000';
	}
	echo svg_icon($_GET['i'],$size,$color);
} else {
	echo 'X';
}?>