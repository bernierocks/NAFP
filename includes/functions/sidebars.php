<?php

$sidebar_default = array(
	'left_sidebar'					=> false,
	'left_sidebar_columns' 			=> '3',
	'left_sidebar_width'			=> '',
	'left_push_pull' 				=> '',
	'left_adtl_classes'				=> '',
	
	'right_sidebar'					=> false,
	'right_sidebar_columns' 		=> '3',
	'right_sidebar_width'			=> '',
	'right_push_pull' 				=> '',
	'right_adtl_classes'			=> '',
	
	'default_sidebar_left'			=> false,
	'default_sidebar_left_source'	=> '',
	'default_sidebar_right'			=> false,
	'default_sidebar_right_source'	=> '',
	
	'equal_height'					=> false,
	'equal_height_group'			=> '',
	'equal_height_limit'			=> '',

	'disable_in_mms'				=> true
);

function sidebar($o){
	if($o['disable_in_mms'] !== false){
		if($_GET['mms'] == 'X'){
			return array();
		}
	}
	//set a few variables I'll use to 0 or blank or their default correct size
	global $sidebar_left;
	global $sidebar_right;
	$left_pull 	= '';
	$main_push 	= '';
	$main_size 	= 12;
	$eh_class 	= '';
	$eh_group	= '';
	
	//Set up Equal Heights if need be
	$accepted_ehl_types = array(
		'interger',
		'double'
	);
	if($equal_height != ''){
		if($o['equal_height_group'] == ''){
			$error .= 'Please give the sidebar function an equal height group, or disable equal height.<br />';
		}
		//Make sure EHL is a number.  If it is, set it.  If not, set it to 990px
		if(gettype(!inarray(gettype($o['equal_height_limit'])),$accepted_ehl_types)){
			$equal_height = '990';
		} else {
			$equal_height = $o['equal_height_limit'];
		}
		$equal_height_class = ' equal-height ';
		$equal_height_group = ' data-group="'.$equal_height_group.'" data-to="'.$equal_height.'" ';
	}
	
	//set sizes of sidebars back to zero if the sidebar does not exist for the current page, then set main size
	if($sidebar_left == '0'){
		$left_size = 0;
	}
	if($sidebar_right == '0'){
		$right_size = 0;
	}
	
	//Check for default sidebar.  If one exists and the left/right counterpart is blank, set the left/right data to point to the default sidebar
	//echo '<!-- oLS: '.$o['left_sidebar'].' | SL: '.$sidebar_left.' | oDSL: '.$o['default_sidebar_left'].' | oDSLS: '.$o['default_sidebar_left_source'].' -->';
	
	if($o['left_sidebar'] == true && ($sidebar_left == '0' || $sidebar_right == '') && $o['default_sidebar_left'] == true){
		$sidebar_left = $o['default_sidebar_left_source'];
		//echo '<!-- here! -->';
	}
	if($o['right_sidebar'] == true && ($sidebar_right == '0' || $sidebar_right == '')  && $o['default_sidebar_right'] == true){
		$sidebar_right = $o['default_sidebar_right_source'];
	}
	
	//Check for pixel/percentage size vs column size, set main_size based on columns or percentages, create sidebar
	if($o['left_sidebar'] == true && $sidebar_left != '0'){
		if(strlen($o['left_sidebar_columns'])>0){
			$left_size_c = 'col-md-'.$o['left_sidebar_columns'];
			$main_size = 12;
		} elseif(strlen($o['left_sidebar_size'])>0){
			$left_size_p = $o['left_sidebar_percent'];
			$left_size_c = '';
			$main_size = 100;
		} else {
			$error .= "Please set a size for the left sidebar.<br />";
		}
		$SBL = file_get_contents($sidebar_left);
		echo '<!-- SBL: '.$sidebar_left.' oSBL: '.$o['default_sidebar_left_source'].' -->';
		$sb_left = '<div id="sidebar-left" '.$left_size_p.' class="'.$left_size_c.' '.$left_pull.' '.$equal_height_class.' '.$o['left_adtl_classes'].' user" '.$eh_group.'>'.$SBL.'</div>';
	}
	
	if($o['right_sidebar'] == true && $sidebar_right != '0'){
		if(strlen($o['right_sidebar_columns'])>0){
			$right_size_c = 'col-md-'.$o['right_sidebar_columns'];
			$main_size = 12;
		} elseif(strlen($o['left_sidebar_size'])>0){
			$right_size_p = $o['left_sidebar_percent'];
			$right_size_c = '';
			$main_size = 100;
		} else {
			$error .= "Please set a width for the right sidebar.<br />";
		}
		$SBR = file_get_contents($sidebar_right);
		echo '<!-- SBR: '.$sidebar_right.' oSBR: '.$o['default_sidebar_right_source'].' -->';
		$sb_right = '<div id="sidebar-right" '.$right_size_p.' class="'.$right_size_c.' '.$right_pull.' '.$equal_height_class.' '.$o['right_adtl_classes'].' user" '.$eh_group.'>'.$SBR.'</div>';
	}
	echo '<!-- here -->';

	//Do the math and set the main size
	$main_size = $main_size - $left_size - $right_size;
	if($o['left_sidebar_columns'] != '' || $o['right_sidebar_columns'] != ''){
		$main_size_c = 'col-md-'.$main_size;
		$main_size_p = '';
	} else {
		$main_size_c = '';
		$main_size_p = ' width="'.$main_size.'%" ';
	}
	
	//create Main div with push and correct size if need be
	$main_div = '<div '.$main_size_p.' class="'.$main_size_c.' main-col '.$main_push.' '.$eh_class.'" '.$eh_group.' >';
	
	//set the return and return it
	$return = array(
		'left' 			=> $sb_left,
		'right'			=> $sb_right,
		'main_size' 	=> $main_size,
		'left_size' 	=> $left_size,
		'right_size'	=> $right_size,
		'main' 			=> $main_div,
	);
	if($error == ''){
		return $return;
	} else {
		echo $error;
	}
}

?>