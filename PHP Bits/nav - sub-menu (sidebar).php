<?
$menu = '';
echo '	<div class="content-box desktop" style="padding-top: 0px; margin-top: 15px;">';
$menu .= '<ul class="sub-top" >';
if(isset($_COOKIE["rem_sess"]) || isset($_GET['logged_in'])){
	$file = 'v_menu_MOA.json'; //navigation for members only
} else {
	$file = 'v_menu.json'; //navigation for everyone
}
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
?>