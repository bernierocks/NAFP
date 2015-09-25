<div class="collapse navbar-collapse navbar-ex1-collapse">
	<? 
		$ch_level = 0;
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
		
		$menu .= '<ul class="nav navbar-nav men-level-'.$ch_level.'">
			
		';
		
		if(isset($_COOKIE["rem_sess"]) || isset($_GET['logged_in'])){
			$file = 'v_menu_MOA.json'; //navigation for members only
		} else {
			$file = 'v_menu.json'; //navigation for everyone
		}
		$json_menu = json_decode(file_get_contents($file), true);
		if(is_array($json_menu)){
			foreach($json_menu as $value){
				$menu.=handleChildren($value);
			}
		}
		$menu .= '</ul>';
		echo $menu;
	?>
	<script type="text/javascript">
		
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault(); 
			// Avoid having the menu to close when clicking
			event.stopPropagation(); 
			// If a menu is already open we close it
			//$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
			// opening the one you clicked on
			$(this).parent().toggleClass('open');

			var menu = $(this).parent().find("ul");
			var menupos = menu.offset();
		  
			if ((menupos.left + menu.width()) + 30 > $(window).width()) {
				var newpos = - menu.width();      
			} else {
				var newpos = $(this).parent().width();
			}
			menu.css({ left:newpos });

		});
		// $('body').on('click', 'button.navbar-toggle', function(){
			
				// var NB = $('.navbar-collapse');
				// var NR = $('.nav-row');
				// if(!NB.hasClass('in')){
					// NR.css('max-height','40px');
				// } else {
					// NR.css('max-height','none');
				// }
		
		// });
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
	</script>
</div>
