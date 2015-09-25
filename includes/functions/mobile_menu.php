<?php
require_once('menus.php');

function handleChildren2($value){
	global $menu;
	if(!empty($value['children'])){ 
		//If there are children
		$menu .= '<li><a href="#" class="mToggle">'.$value['name'].'<b class="caret"></b></a>';
		$menu .= '<ul class="mDropdown">';
		
		if($value['href']!='#'){
			$menu .= '<li><a href="'.$value['href'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>'; 
		}
		
		foreach($value['children'] as $c_value){ //loop through the child elements
			if(substr($c_value['name'], 0, 4)=='CRM_'){
				$c_value['name'] = substr($c_value['name'],4);
			}
			$menu .=handleChildren2($c_value);
		}
		$menu .= '</ul></li>';
	}else{ 
		//If there are no children
		$menu .= '<li><a href="'.$value['href'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>';
	}
}

function mobile_menu($o = ''){
	global $menu;
	$menu = '';
	$file = menu_file_path();
	$json_menu = json_decode(file_get_contents($file), true);
	if(is_array($json_menu)){
		foreach($json_menu as $value){
			$menu.=handleChildren2($value);
		}
	}
	$before = '';
	$after = '';
	if(!empty($o['before'])){
		$before = $o['before'];
	}	
	if(!empty($o['after'])){
		$after = $o['after'];
	}
	$menu = '<div id="mobileMenuWrapper" class="test3"><ul id="mobile-menu" class="test2">'.$before.$menu.$after.'</ul></div>';
	$js = '<script type="text/javascript">
	$(function(){
		var $trigger = $(\'.mobileMenuTrigger\');
		var $target  = $(\'#mobileMenuWrapper\');
		$trigger.click(function(e){
			$target.toggleClass(\'open\');
			e.stopPropagation();
		});
		//Handles menu hide/show
		$(".mToggle").click(function(e){
			$(this).siblings("ul.mDropdown").toggleClass("open");
			e.stopPropagation();
		});
		$("body").click(function(e){
			clicked = $(e.target);
			console.log(clicked);
			var pass = true;
			if(clicked.parents("#mobile-menu").length){
				pass = false;
			}
			if(!$target.hasClass("open")){
				pass = false;
				console.log("this");
			}
			console.log(pass);
			if(pass == true){
				e.stopPropagation();
				$target.toggleClass(\'open\');
			}
		});
		
		//
		
	});
</script>';
	echo $menu.$js;
}


		
	