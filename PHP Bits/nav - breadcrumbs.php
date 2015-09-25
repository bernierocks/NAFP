<?
			//set bread crumb separator and starting link
			$separator = ' / ';
			$bci = 0;
			$bc[0] = '<a href="'.$base.'index.php">Home</a>';
			
			//parse crumbs
			function parseCrumbs($bc){
				global $separator;
				$trail = '';
				foreach($bc as $key => $value){
					if($trail != ''){
						$sep = $separator;
					}
					$trail .= $sep.$value;
				}
				return $trail;
			}
			//make crumb links
			function breadCrumbMenu($value, $bc, $bci, $needle){
				++$bci;
				$bc[$bci] = '<a href="'.$value['href'].'">'.$value['name'].'</a>';
				if($value['name']==$needle){
					$bctrail = parseCrumbs($bc);
					echo '<div class="bc-menu">'.$bctrail.'</div>';
				} else {
					if(!empty($value['children'])){ //if the top level item has children items, make an empty copy of the first value
						foreach($value['children'] as $c_value){ //loop through the child elements
							breadCrumbMenu($c_value, $bc, $bci, $needle);
						}
						--$bci;
					}
				}
			}
			//get json for bread crumbs
			if(isset($_COOKIE["rem_sess"]) || isset($_GET['logged_in'])){
				$file = 'v_menu_MOA'.$menu_language.'.json'; //navigation for members only
			} else {
				$file = 'v_menu'.$menu_language.'.json'; //navigation for everyone
			}
			$json_menu = json_decode(file_get_contents($file), true);
			$needle = $title;
			if(is_array($json_menu)){
				foreach($json_menu as $value){
					breadCrumbMenu($value, $bc, $bci, $needle);
				}
			}
			?>