<?
//require_once('../config.php');
function handleChildren($value){
	global $ch_level;
	global $menu;
	if(!empty($value['children'])){ //if the top level item has children items, make an empty copy of the first value
		if($ch_level>0){
			$menu_class="dropdown-submenu";
			$toggles = 'class="sub-a" class="dropdown-toggle" data-toggle="dropdown"';
		} else {
			$menu_class="dropdown t".$ch_level;
			$toggles = 'class="dropdown-toggle" data-toggle="dropdown"';
			
		}
		$menu .= '<li class="'.$menu_class.'"><a href="#" '.$toggles.'>'.$value['name'].'<b class="caret"></b></a>';
		$menu .= '<ul class="dropdown-menu men-level-'.$ch_level.'">';
		if($value['href']!='#'){
			//$menu .= '<li class="dropdown">'.$value['name'].'</li>'; //this copies the top level item into the first child
			$menu .= '<li><a href="'.$value['href'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>'; //this copies the top level item into the first child
		}
		++$ch_level;
		foreach($value['children'] as $c_value){ //loop through the child elements
			if(substr($c_value['name'], 0, 4)=='CRM_'){
				$c_value['name'] = substr($c_value['name'],4);
			}
			$menu .=handleChildren($c_value);
			//$menu .= '<li><a href="'.$c_value['href'].'" target="'.$c_value['target'].'">'.$c_value['name'].'</a></li>';
		}
		--$ch_level;
		$menu .= '</ul></li>';
	}else{ //if there are no child elements, just echo out the menu item
		$menu .= '<li><a href="'.$value['href'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>';
	}
}
function menu_file_path(){
	global $site_is_a_redesign;
	global $redesign_menu_addon;
	global $domain;
	global $redesign_use_main_menu;
	global $their_domain;
	if($redesign_use_main_menu){
		$redesign_modifier = '';
		$this_domain = $their_domain;
	} else {
		$this_domain = $domain;
		$redesign_modifier = $redesign_menu_addon;
	}
	if(isset($_SERVER['HTTPS'])){
		$this_server = 'https://'.$this_domain.'/';
	} else {
		$this_server = 'http://'.$this_domain.'/';
	}
	if(isset($_COOKIE["rem_sess"]) || isset($_GET['logged_in'])){
		$file = $this_server.'v_menu'.$redesign_modifier.'_MOA.json'; //navigation for members only
	} else {
		$file = $this_server.'v_menu'.$redesign_modifier.'.json'; //navigation for everyone
	}
	return $file;
}
function quick_menu($before='', $after='', $custom_caret = ''){ //pulls domain from config file
	global $menu;
	$menu = '';
	$menu .= '<ul class="nav navbar-nav men-level-'.$ch_level.'">'.$before;
	$file = menu_file_path();
	$json_menu = json_decode(file_get_contents($file), true);
	if(is_array($json_menu)){
		foreach($json_menu as $value){
			$menu.=handleChildren($value);
		}
	}
	$menu .= $after.'</ul>';
	echo '<div id="NP" class="collapse navbar-collapse navbar-ex1-collapse">'.$menu.'</div>';
	$da_neccessary_javascript = "<script type=\"text/javascript\">
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().toggleClass('open');
			var menu = $(this).parent().find(\"ul\");
			var menupos = menu.offset();
		  
			if ((menupos.left + menu.width()) + 30 > $(window).width()) {
				var newpos = - menu.width();      
			} else {
				var newpos = $(this).parent().width();
			}
			menu.css({ left:newpos });
		});
		function checkForChanges(){
			if (!$('.navbar-collapse').hasClass('in')){
				$('.nav-row').css('max-height','40px');
			} else {
				$('.nav-row').css('max-height','none');
				setTimeout(checkForChanges, 500);
			}
		}
		$(function(){
			checkForChanges();
		});
	</script>";
	echo $da_neccessary_javascript;
}

function sub_menu(){
	global $menu;
	global $top_parent_id;
	global $sub_nav_file;
	$menu = '';
	
	$menu .= '<ul class="sub-top" >';
	$file = menu_file_path();
	$var = $top_parent_id;
	if($var === '0'){
		$var = preg_replace("/[^0-9]/","",$sub_nav_file);
	}
	$json_menu = json_decode(file_get_contents($file), true);
	if(is_array($json_menu)){
		foreach($json_menu as $value){
			//echo 'id: '.$value['id'];
			//echo 'Should print sub nav number: '.preg_replace('/[^0-9]/','', $sub_nav_file ).' FROM '.$sub_nav_file.'<br />';
			if($value['id']==$var){
				if(!empty($value['children'])){ //if the top level item has children items, make an empty copy of the first value
					
					$menu .= '<li ><a href="'.$value['href'].'" >'.$value['name'].'</b></a>';
					$menu .= '<ul id="smenu">';
					//if($value['href']!='#'){
					//	$menu .= '<li class="><a href="'.$value['href'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>'; //this copies the top level item into the first child
					//}
					foreach($value['children'] as $c_value){ //loop through the child elements
						if(substr($c_value['name'], 0, 4)=='CRM_'){
							$c_value['name'] = substr($c_value['name'],4);
						}
						$menu .= '<li class=""><a href="'.$c_value['href'].'" target="'.$c_value['target'].'">'.$c_value['name'].'</a>';
						
						if(!empty($c_value['children'])){
							$menu .= '<ul class="sub-border">';
							foreach($c_value['children'] as $d_value){
								$menu .= '<li class=""><a href="'.$d_value['href'].'" target="'.$d_value['target'].'">'.$d_value['name'].'</a></li>';
							}
							$menu .= '</ul></li>';
							
						} else{
							$menu .= '</li>';
						}
					}
					$menu .= '</ul></li>';
				}else{ //if there are no child elements, just echo out the menu item
					$menu .= '<li><a href="'.$value['href'].'" target="'.$value['target'].'">'.$value['name'].'</a></li>';
				}
			}
		}
	}
	$menu .= '</ul>';
	echo $menu;
}
$superCrumb = array();
function makeCrumb($name,$href,$parent_id){
	global $superCrumb;
	$superCrumb[] = array(
		'href' => $href,
		'name' => $name,
		'parent_id' => $parent_id
	);
}
$ci = 0;

function getCrumbs($file, $target, $og_file = ''){
	global $crumbs;
	global $ci;
	//echo $target;
	if($target === '0'){
		return $crumbs;
	}
	foreach($file as $value){
		if($value['id'] == $target){
			//echo '!!'.$value['name'].'<br/>';
			makeCrumb($value['name'], $value['href'], $value['parent_id']);
			if($value['parent_id'] != '0'){
				getCrumbs($og_file, $value['parent_id'], $og_file);
			}
			
		} else{
			//echo 'boo- '.$value['name'].'<br/>';
			getCrumbs($value['children'],$target,$og_file);
		}
	}
	return $crumb;
}

function breadcrumb_menu($separator = ' > ', $use_index = 'Home'){
		global $content_id;
		global $base;
		if($use_index != false){
			$bcm = '<a href="'.$base.'">'.$use_index.'</a>'.$separator;
		}
		//get menu json
		$file = menu_file_path();
		$json_menu = json_decode(file_get_contents($file), true);
		
		//run GetCrumbs to cycle through menu and find the crumbs.
		getCrumbs($json_menu,$content_id,$json_menu);
		global $superCrumb;
		
		$finalCrumb = array_reverse($superCrumb);
		
		foreach($finalCrumb as $v){
			$bcm .= '<a href="'.$v['href'].'">'.$v['name'].'</a>'.$separator;
		}
		$bcm = trim($bcm,$separator);
		return $bcm;
}
echo '<!-- Menus Loaded -->';
?>