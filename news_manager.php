<?php
$full_width = 'Y';
require_once('includes/config.php');
$title = $org_name.' News';
include('header.php'); 
//echo '<br />';
if (!isset($_GET['page'])){
	echo 'No news page specified';
} else {
	$page_file = 'sn/'.$_GET['page'].'.htm';
	include ($page_file);
}

//echo '<br><br><br>';	
	
include('footer.php'); ?>