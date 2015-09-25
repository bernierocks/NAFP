<?
/*
-------SVG Icons
-SVG Social Media icons are there to make icons quick and easy without copying the simple icons that we have for each person
-To use one, call it like this <?=socialMedia('##Social Media##','##height in px##','##color of icon if not white##' )
-For example, if you wanted a blue facebook social media icon with a height of 28px, it would look like:
- socialMedia('facebook','28','#2514F3');
Format for New SVG Icons is here:

case '';
	$ratio =;
	$width = $height * $ratio;
	echo '';
break;

*/

function svg_icon($smGroup, $height = '25', $color = '#ffffff', $class=false){

	if($height == false){
		$height = '25';
	}
	if($class != false){
		$class='class="'.$class.'"';
	}
	switch($smGroup){
		case 'blogger':
			$ratio = 97.3/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 97.3 100" enable-background="new 0 0 97.3 100" xml:space="preserve">
				<g>
					<g>
						<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M97.2,72.2V46c0,0-0.2-3.8-1.4-5.3c-1.2-1.4-4.3-1.5-4.3-1.5h-13
							l0.8-4.7v-11c0,0-0.7-9.3-7.8-15.7C64.1,1.1,56,0,56,0H27.2c0,0-11.3,0-18.7,7.1C0.3,15,0,24.3,0,24.3v55c0,0,1.3,8.5,7.8,14.1
							c7.6,6.5,15.6,6.7,15.6,6.7h49c0,0,11.1-0.5,18.7-9.8C97.7,82.1,97.2,72.2,97.2,72.2z M29.5,21.1h23.3c0,0,6.2,1.2,6.2,8.6
							c0,7.1-6.2,7.8-6.2,7.8H29.5c0,0-7-0.6-7-8.6C22.5,21,29.5,21.1,29.5,21.1z M69.9,76.8H27.2c0,0-7-0.2-7-7.8c0-7.6,7-8.6,7-8.6
							h42.7c0,0,7.4,1.5,7,8.6C76.5,76,69.9,76.8,69.9,76.8z"/>
					</g>
				</g>
				</svg>
				';
			break;
		case 'hamburger':
			$ratio = 100/100;
			$width = $height * $ratio;
			return '<svg '.$class.' $version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
				<rect x="0" fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" width="100" height="23"/>
				<rect x="0" y="77" fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" width="100" height="23"/>
				<rect x="0" y="38.5" fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" width="100" height="23"/>
				</svg>';
			break;
		case 'email';
			$ratio = 1;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
					<g>
						<path fill="'.$color.'" d="M71.9,27.2V60c0,2,0.3,3.5,0.9,4.5c0.6,1,1.3,1.8,2.1,2.2c0.8,0.5,1.8,0.7,3,0.7c2.4,0,4.5-0.7,6.1-2
							c1.6-1.3,2.9-2.9,3.9-4.8c1-1.9,1.6-3.8,2-5.8c0.4-2,0.6-4.5,0.6-7.4c0-3.4-0.5-6.6-1.4-9.8c-1-3.1-2.3-6.1-4-8.9
							c-1.7-2.8-3.8-5.3-6.3-7.7c-2.4-2.3-5.2-4.3-8.2-6c-3-1.7-6.2-3-9.7-3.9c-3.5-0.9-7.1-1.4-10.8-1.4c-3.7,0-7.3,0.5-10.7,1.4
							c-3.4,1-6.7,2.3-9.6,4.1c-3,1.7-5.7,3.8-8.2,6.3c-2.5,2.4-4.5,5.1-6.3,8.1c-1.7,3-3.1,6.2-4,9.6c-1,3.4-1.4,7-1.4,10.7
							c0,3.7,0.5,7.3,1.4,10.7c1,3.4,2.3,6.7,4,9.7c1.7,3,3.8,5.7,6.3,8.2c2.5,2.4,5.2,4.5,8.2,6.3c3,1.7,6.2,3.1,9.6,4.1
							c3.4,1,7,1.4,10.7,1.4c3.8,0,7.4-0.5,11-1.5c3.5-1,6.8-2.4,9.9-4.3l4.6,7.8c-3.7,2.3-7.7,4-12,5.3c-4.3,1.2-8.8,1.9-13.5,1.9
							c-4.5,0-8.9-0.6-13.1-1.8c-4.2-1.2-8.2-2.8-11.8-5c-3.7-2.1-7-4.7-10-7.7c-3-3-5.6-6.4-7.7-10c-2.1-3.7-3.8-7.6-5-11.8
							C1.1,59,0.5,54.6,0.5,50.1c0-4.5,0.6-8.9,1.8-13.1c1.2-4.2,2.8-8.1,5-11.8c2.1-3.7,4.7-7,7.7-10c3-3,6.4-5.6,10-7.7
							c3.7-2.1,7.6-3.8,11.8-5c4.2-1.2,8.6-1.8,13.1-1.8c4.6,0,9,0.6,13.3,1.7c4.2,1.1,8.2,2.7,11.8,4.8c3.7,2,7,4.5,10,7.4
							s5.6,6,7.7,9.5c2.1,3.5,3.8,7.2,4.9,11.1c1.2,3.9,1.8,8,1.8,12.2c0,2.2-0.2,4.5-0.6,6.8c-0.4,2.3-1.1,4.4-1.9,6.5
							c-0.9,2.1-1.9,4-3.1,5.8c-1.2,1.8-2.7,3.4-4.3,4.7c-1.6,1.3-3.4,2.4-5.4,3.2c-2,0.8-4.1,1.2-6.4,1.2c-3,0-5.6-0.7-7.6-2
							s-3.6-3-4.8-5.1c-2.1,1.7-4.4,3-7,4c-2.6,1-5.4,1.4-8.4,1.4c-3.5,0-6.6-0.6-9.5-1.8c-2.9-1.2-5.4-2.9-7.5-5
							c-2.1-2.1-3.7-4.6-4.9-7.4C26.6,57,26,54,26,50.8c0-3.2,0.6-6.2,1.8-9c1.2-2.8,2.9-5.3,5-7.4c2.1-2.1,4.6-3.8,7.5-5
							c2.9-1.2,6-1.9,9.3-1.9c2.4,0,4.7,0.3,6.9,1c2.2,0.7,4.3,1.6,6.1,2.8v-4.1H71.9z M49.7,64.8c3.1,0,5.8-0.7,8-2.1
							c2.2-1.4,3.9-3.3,5-5.6V44.6c-0.6-1.2-1.3-2.2-2.2-3.2s-1.9-1.8-3-2.5c-1.1-0.7-2.3-1.3-3.7-1.7c-1.3-0.4-2.7-0.6-4.2-0.6
							c-2.1,0-4.1,0.4-5.8,1.1c-1.8,0.8-3.3,1.8-4.6,3.1c-1.3,1.3-2.3,2.8-3,4.5c-0.7,1.7-1.1,3.6-1.1,5.5c0,1.9,0.3,3.8,1,5.5
							c0.7,1.7,1.7,3.2,2.9,4.4c1.3,1.3,2.8,2.3,4.6,3C45.5,64.5,47.5,64.8,49.7,64.8z"/>
					</g>
					</svg>';
			break;
		case 'envelope';
			$ratio = 175.6/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 175.6 100" enable-background="new 0 0 175.6 100" xml:space="preserve">
					<g>
						<g>
							<path fill-rule="evenodd" fill="'.$color.'" clip-rule="evenodd" d="M88.9,53.3c3.3-0.4,11.1-4.4,11.1-4.4L171.1,0H4.4L80,51.1
								C80,51.1,85.6,53.7,88.9,53.3z M111.1,48.9v4.4l64.4,42.2V4.4L111.1,48.9z M100,57.8c-1.6,0.6-5.5,2.1-11.1,2.2
								c-5.7,0.1-11.1-2.2-11.1-2.2l-4.4-2.2L4.4,100h164.4l-64.4-44.4C104.4,55.6,101.6,57.1,100,57.8z M64.4,48.9L0,4.4v91.1l64.4-42.2
								V48.9z"/>
						</g>
					</g>
					</svg>';
			break;
		case 'eye';
			$ratio = 218.8/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 218.8 100" enable-background="new 0 0 218.8 100" xml:space="preserve">
					<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'"d="M104.4,0.1C28.6-2.8,0,56.9,0,56.9s38.5,44.3,109.4,43.1
						c70.9-1.2,109.4-43.1,109.4-43.1S180.3,3,104.4,0.1z M19.5,56.9c0,0,15.1-35.8,62.1-43.8c-11.2,8.4-18.5,21.8-18.5,37
						c0,15.3,7.4,28.8,18.9,37.2C32,81.5,19.5,56.9,19.5,56.9z M139.2,85.3c10-8.5,16.4-21.2,16.4-35.3c0-11.5-4.2-22-11.1-30.1
						c33.1,12.9,53.1,35.9,53.1,35.9S182.9,77.2,139.2,85.3z"/>
					</svg>';
			break;
		case 'facebook':
			$ratio = 47.6/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 47.6 100" enable-background="new 0 0 47.6 100" xml:space="preserve">
			<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M11.1,33.3H0v15.9h11.1V100h19.1V49.2h14.3l3.2-15.9H31.8
				c0,0,0-11.1,0-12.7c0-1.6,1.6-3.2,3.2-3.2s12.7,0,12.7,0V0c0,0-10.6,0-19.1,0S11.4,5.8,11.1,17.5C10.9,29.1,11.1,33.3,11.1,33.3z"/>
			</svg>
			';
			break;
		case 'google':
			$ratio = 115.9/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 115.9 100" enable-background="new 0 0 115.9 100" xml:space="preserve">
				<g>
					<g>
						<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M36.6,0.2c0,0-11.8-0.2-19.5,5.7c-7.4,5.7-14,16.9-7.6,29.5
							C15.9,48,32.3,45.9,32.3,45.9s-1,3.7-0.9,6.7c0,2.9,3.8,7.1,3.8,7.1s-12.7,0-19.5,2.9c-6.8,2.8-15.3,8-15.7,19
							c-0.3,8.8,9,18.5,29.9,18.5c20.9,0,27.5-9.9,30.4-15.2c3.5-6.4,2.3-12.8,1.4-16.2c-0.9-3.3-6.6-9-9-10.9c-2.5-1.9-7.1-5.7-7.1-5.7
							s-1.9-3.4-1.9-4.3c0-0.9,0.8-4.4,2.8-5.7c3.9-2.5,11.9-9.2,11.9-19.5s-9.1-16.5-9-17.1c0.1-0.6,1.4,0,1.4,0s6.2,0.2,6.6,0
							c0.4-0.2,7.2-4.2,7.1-4.8c0-0.1-0.9-0.5-0.9-0.5H36.6z M44.2,67.3c5.3,3.2,12.6,10,8.1,19c-4.5,9-21.1,9.2-29.4,6.2
							c-8.4-3.1-15.1-13.4-8.1-21.9c7-8.5,25.2-7.1,25.2-7.1S40.7,65.1,44.2,67.3z M38.9,41.1c-8.5,3.4-14.6-2.7-18.5-11.9
							c-4.5-10.4-1.1-20.4,5.2-22.8c8.1-3.1,13.2,0.2,18.5,10.5C49.2,26.7,47.5,37.7,38.9,41.1z M96.9,39.7v-19H85.9v19H67v10.9h19v19
							h10.9v-19h19V39.7H96.9z"/>
					</g>
				</g>
				</svg>
			';
			break;
		case 'home';
			$ratio =106.2/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 106.2 100" enable-background="new 0 0 106.2 100" xml:space="preserve">
					<g>
						<g>
							<path fill="'.$color.'" fill-rule="evenodd" clip-rule="evenodd" d="M28.9,6.8H15.8v19.4l13.1-11.5V6.8z M53.1,0L0,46.8l5.9,5.9l47.2-41.9l47.4,41.9
								l5.6-5.9L53.1,0z M15.8,51.1c0,0,0,45.5,0,46.8c0,1.3,0.8,2,2,2c1.3,0,23.5,0,23.5,0s0-20.4,0-21.2c0-0.8,0.5-1.6,1.4-1.6h20.8
								c0.6,0,1.4,0.4,1.4,1.4c0,0.9,0,21.4,0,21.4s22.7,0,23.5,0c0.8,0,2-0.8,2-1.6c0-0.8,0-47.5,0-47.5L53.1,18L15.8,51.1z"/>
						</g>
					</g>
					</svg>';
			break;
		case 'instagram':
			$ratio = 99.7/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 99.7 100" enable-background="new 0 0 99.7 100" xml:space="preserve">
					<g>
						<g>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M96.5,85.8c0,6.4-3.2,11.3-11.3,11.3H14.5
								c-7.9,0-11.3-3.7-11.3-11.3c0-4.4,0-46.7,0-46.7H0c0,0,0,46.6,0,50.4c0,4.4,4.4,10.7,10.7,10.7H89c7.3,0,10.7-5.7,10.7-12.9
								c0-4.8,0-48.3,0-48.3h-3.2C96.5,39.1,96.5,80.6,96.5,85.8z M24.7,0h-5.4v31.6h5.4V0z M89,0c-5.2,0-60.6,0-60.6,0v33.8H15.6V0h-4.8
								C4.7,0,0,7.7,0,11.3C0,14.8,0,37,0,37h30.6c0,0-7.5,8-7.5,19.8c0,11.8,9.8,25.7,27.3,25.7c17.6,0,26.3-15.5,26.3-26.3
								c0-11.5-7.5-19.3-7.5-19.3h30.6c0,0,0-20.5,0-25.7C99.7,6,94.2,0,89,0z M72.4,55.5c0,12.6-10.2,22.8-22.8,22.8
								S26.8,68.1,26.8,55.5S37,32.7,49.6,32.7S72.4,42.9,72.4,55.5z M91.7,26.3c0,1.1-1.5,2.1-2.7,2.1H71.3c-1.1,0-2.1-1.3-2.1-2.7V11.8
								c0-1.3,1.4-2.7,2.7-2.7H89c1.3,0,2.7,1.2,2.7,2.7V26.3z M49.9,37c-10.4,0-18.8,8.4-18.8,18.8s8.4,18.8,18.8,18.8
								c10.4,0,18.8-8.4,18.8-18.8S60.2,37,49.9,37z M54.2,46.1l3.8-2.1l2.7,3.8l-3.2,1.1L54.2,46.1z M60.1,52.6l-1.6-2.1l2.7-1.1
								l1.1,2.1L60.1,52.6z"/>
						</g>
					</g>
					</svg>
			';
			break;
		case 'instagram2':
			$ratio = 100/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
				<g>
					<g>
						<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M88.4,0H11.7C5.2,0,0,5.2,0,11.5v76.9C0,94.9,5.2,100,11.7,100
							h76.7c6.4,0,11.7-5.2,11.7-11.5V11.5C100,5.2,94.8,0,88.4,0z M50,31.7c10.5,0,18.9,8.4,18.9,18.8c0,10.4-8.5,18.8-18.9,18.8
							c-10.5,0-18.9-8.4-18.9-18.8C31.1,40.1,39.6,31.7,50,31.7z M88.4,84.6c0,1.5-1.5,2.9-2.9,2.9H14.6c-2.3,0-2.9-0.7-2.9-2.9
							c0-2.2,0-42.3,0-42.3h8.7c0,0-4.1,17.1,4.9,26c4.5,4.4,9.4,11.9,25.3,11.9S71,72.1,74.8,68.3c7.7-7.6,5.8-26,5.8-26h7.8
							C88.4,42.3,88.4,83.2,88.4,84.6z M88.4,26c0,2.7-2.2,4.8-4.9,4.8h-9.7c-2.7,0-4.9-2.2-4.9-4.8v-9.6c0-2.7,2.2-4.8,4.9-4.8h9.7
							c2.7,0,4.9,2.2,4.9,4.8V26z"/>
					</g>
				</g>
				</svg>
			';
			break;
		case 'leftqote';
			$ratio = 151.9/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 151.9 100" enable-background="new 0 0 151.9 100" xml:space="preserve">
					<g>
						<path fill="'.$color.'" d="M50.2,0v7.9c-11.4,5.9-19.5,12.1-24.4,18.6s-7.4,13.5-7.4,21.1c0,4.5,0.6,7.6,1.9,9.3c1.2,1.8,2.6,2.7,4.3,2.7
							s3.9-0.5,6.8-1.5c2.8-1,5.4-1.5,7.8-1.5c5.3,0,9.9,2,13.9,5.9s5.9,8.8,5.9,14.4c0,6.2-2.4,11.5-7.2,16S41,99.8,33.9,99.8
							c-8.7,0-16.5-3.7-23.4-11.2C3.5,81.1,0,71.8,0,60.9c0-12.9,4.3-25,12.9-36.1S33.9,5.3,50.2,0z M142.6,0.6v7.4
							c-13,7.5-21.6,14.2-25.8,20.2S110.7,41,110.7,49c0,3.6,0.7,6.3,2.1,8.1c1.4,1.8,2.9,2.7,4.5,2.7c1.4,0,3.6-0.5,6.4-1.6
							s5.7-1.6,8.5-1.6c5.3,0,9.9,1.9,13.9,5.7s5.9,8.5,5.9,14.1c0,6.3-2.5,11.8-7.5,16.5c-5,4.7-11.1,7-18.3,7c-8.5,0-16.2-3.7-23.1-11
							c-6.8-7.4-10.3-16.5-10.3-27.5c0-13.6,4.3-25.9,13-37.1S126.7,5.2,142.6,0.6z"/>
					</g>
					</svg>';
			break;
		case 'linkedin':
			$ratio = 105.1/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 105.1 100" enable-background="new 0 0 105.1 100" xml:space="preserve">
			<g>
				<g>
					<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M2.2,100H25V33.2H2.2V100z M89.9,33.2
						c-16.4-8.3-31.4,8.6-31.4,8.6v-8.6H36.9V100h21.6V59.1c0,0,2.6-9.6,13-9.7c10.4-0.1,10.8,9.7,10.8,9.7V100h22.7V56.9
						C105.1,56.9,104.7,40.8,89.9,33.2z"/>
				</g>
			</g>
			<circle fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" cx="13" cy="13.3" r="13"/>
			</svg>
			';
			break;
		case 'lock';
			$ratio = 89/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 89 100" enable-background="new 0 0 89 100" xml:space="preserve">
					<path fill="'.$color.'" d="M81.3,33.7C81.3,15.1,67.3,0,44.5,0C20,0,7.7,15.1,7.7,33.7H0V100h89V33.7H81.3z M48.2,67.6v16.6h-7.3V67.6
						c-2.7-1.4-4.6-4.1-4.6-7.3c0-4.6,3.7-8.3,8.3-8.3s8.3,3.7,8.3,8.3C52.8,63.5,50.9,66.2,48.2,67.6z M15.7,33.4
						c0-17.1,11.1-27.9,28.9-27.7c17,0.1,28.6,10.7,28.6,27.7H15.7z"/>
					</svg>
					';
			break;
		case 'news';
			$ratio = 116.9/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 116.9 100" enable-background="new 0 0 116.9 100" xml:space="preserve">
					<g>
						<path fill="'.$color.'" d="M66.1,56.7c3.7-3.7,3.7-9.8,0-13.5c-3.7-3.7-9.8-3.7-13.5,0c-3.7,3.7-3.7,9.8,0,13.5
							C56.3,60.5,62.3,60.5,66.1,56.7z"/>
						<path fill="'.$color.'" d="M79.4,17.3l-8.9,8.9c6.2,6.4,9.6,14.8,9.6,23.8c0,8.9-3.4,17.4-9.7,23.8l8.9,8.9C97,64.5,97,35.5,79.4,17.3
							z"/>
						<path fill="'.$color.'" d="M96.7,0l-8.9,8.9c22.3,22.8,22.3,59.4-0.1,82.3l8.9,8.9C123.8,72.3,123.9,27.7,96.7,0z"/>
						<path fill="'.$color.'" d="M37.7,17.3C20,35.5,20,64.5,37.7,82.7l8.9-8.9C40.4,67.4,37,59,37,50c0-8.9,3.4-17.4,9.7-23.8L37.7,17.3z"
							/>
						<path fill="'.$color.'" d="M29.3,8.9L20.5,0C-6.8,27.7-6.8,72.3,20.4,100l8.9-8.9C6.9,68.3,7,31.7,29.3,8.9z"/>
					</g>
					</svg>';
			break;
		case 'newsletter';
			$ratio = 87/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 87 100" enable-background="new 0 0 87 100" xml:space="preserve">
					<g>
						<g>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M43.5,43.5H8.7v4.3h34.8V43.5z M78.3,43.5H52.2v30.4h26.1V43.5z
								 M43.5,56.5H8.7v4.3h34.8V56.5z M43.5,69.6H8.7v4.3h34.8V69.6z M0,0v100h87V0H0z M82.7,95.7H4.4V34.8h78.3V95.7z M82.7,30.4H4.4
								V4.3h78.3V30.4z M78.3,82.6H8.7V87h69.6V82.6z"/>
						</g>
					</g>
					</svg>';
			break;
		case 'phone';
			$ratio =62.5/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 62.5 100" enable-background="new 0 0 62.5 100" xml:space="preserve">
					<g>
						<g>
							<path fill="'.$color.'" fill-rule="evenodd" clip-rule="evenodd" d="M59,0H3.5C1.6,0,0,1.6,0,3.5v93c0,1.9,1.6,3.5,3.5,3.5H59c1.9,0,3.5-1.6,3.5-3.5
								v-93C62.5,1.6,60.9,0,59,0z M32.7,96.9c-4.3,0-7.9-3.5-7.9-7.9c0-4.4,3.5-7.9,7.9-7.9c4.3,0,7.9,3.5,7.9,7.9
								C40.5,93.4,37,96.9,32.7,96.9z M57,74.4c0,1.9-1.6,3.5-3.5,3.5H9c-1.9,0-3.5-1.6-3.5-3.5v-65C5.5,7.4,7,5.8,9,5.8h44.6
								c1.9,0,3.5,1.6,3.5,3.5V74.4z"/>
						</g>
					</g>
					</svg>';
			break;
		case 'photo';
			$ratio = 118.2/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 118.2 100" enable-background="new 0 0 118.2 100" xml:space="preserve">
					<g>
						<path fill="'.$color.'" d="M0,0v100h118.2V0H0z M113.6,90.9H86.4c0,0,0-11.2,0-18.9c0-8.9-11.7-9.1-11.7-9.1s-2.6,4.5-15.1,4.5
							S42,62.9,42,62.9s-10.1,1.8-10.1,10.4s0,17.6,0,17.6H4.5v-82l109.1-0.1V90.9z"/>
						<circle fill="#F15E22" cx="59.1" cy="37.1" r="19.1"/>
					</g>
					</svg>';
			break;
		case 'pinterest':
			$ratio = 78.4/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 78.4 100" enable-background="new 0 0 78.4 100" xml:space="preserve">
			<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M15.4,59.9l1-10.1c0,0-7.7-9.3-3-21.1
				c6.1-15.6,19.1-17.3,27.4-17.1c8.4,0.2,19.4,4.4,22.4,16.1c2.6,10.4-3.4,27.5-10.2,31.2s-13.6,3.2-15.2-4
				c-1.6-7.2,4.1-19.1,4.1-19.1s1.3-11.9-6.1-13.1c-7.4-1.2-14.8,7.6-14.2,12.1c0.6,4.5,2.4,11.4,2,13.1C23.2,49.5,16.4,74,16.4,74
				s-1,4.1-1,6c0,1.9,1,18.1,1,18.1s0.5,1.9,2,2c1.5,0.1,3.7-3.6,6.1-7c2.4-3.4,4.1-9.1,4.1-9.1l4.1-17.1c0,0,7.4,7.6,17.3,7
				c9.8-0.5,20.6-9.8,24.4-18.1c3.7-8.3,4.1-17.5,4.1-23.1S75,16.6,68.3,10.6C60.8,4,45.5-5.1,24.6,3.5C6.2,11.1-1.2,23.9,0.2,39.8
				C1.6,56.3,15.4,59.9,15.4,59.9z"/>
			</svg>
			';
			break;
		case 'rightqote';
			$ratio = 151.9/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 151.9 100" enable-background="new 0 0 151.9 100" xml:space="preserve">
					<g>
						<path fill="'.$color.'" d="M9.3,100v-8.1c13-7.4,21.6-14.1,25.7-20.1s6.1-13,6.1-20.8c0-3.6-0.6-6.3-1.9-8.1c-1.4-1.8-3-2.7-4.7-2.7
							c-1.3,0-3.4,0.5-6.2,1.6s-5.7,1.6-8.5,1.6c-5.4,0-10.1-1.9-14-5.8S0,28.8,0,23.3C0,17.1,2.5,11.6,7.5,7s11-7,18.1-7
							c8.5,0,16.2,3.7,23.2,11S59.1,27.7,59.1,39c0,13.6-4.4,26-13.1,37.2S25.1,95.3,9.3,100z M101.7,100v-8.1
							c11.2-5.8,19.3-12,24.3-18.5c5-6.5,7.5-13.6,7.5-21.2c0-4.5-0.6-7.7-1.9-9.5c-1.3-1.7-2.7-2.5-4.3-2.5c-1.7,0-3.9,0.5-6.8,1.6
							c-3,1-5.6,1.6-7.8,1.6c-5.3,0-9.9-2-13.9-6c-3.9-4-5.9-8.8-5.9-14.3c0-6.2,2.4-11.6,7.2-16.1C105,2.3,110.9,0,117.8,0
							c8.8,0,16.7,3.8,23.6,11.3s10.5,16.8,10.5,27.8c0,12.9-4.3,25-12.9,36.1C130.5,86.5,118,94.7,101.7,100z"/>
					</g>
					</svg>';
			break;
		case 'search';
			$ratio = 101.3/100;
			$width = $height * $ratio;
			return '
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 101.3 100" enable-background="new 0 0 101.3 100" xml:space="preserve">
				<path fill="'.$color.'" d="M57,0C32.6,0,12.8,19.9,12.8,44.3c0,9,2.7,17.4,7.4,24.4c-0.1,0.1-0.3,0.1-0.4,0.2L2.3,86.4
					c-3.1,3.1-3.1,8.1,0,11.2c1.6,1.6,3.6,2.3,5.6,2.3c2,0,4.1-0.8,5.6-2.3l17.5-17.5c0,0,0-0.1,0.1-0.1c7.3,5.3,16.2,8.5,25.9,8.5
					c24.4,0,44.3-19.9,44.3-44.3S81.4,0,57,0z M57,77.9c-18.6,0-33.7-15.1-33.7-33.7S38.5,10.6,57,10.6s33.7,15.1,33.7,33.7
					S75.6,77.9,57,77.9z"/>
				</svg>

			';
			break;
		case 'site_map';
			$ratio = 183.5/100;
			$width = $height * $ratio;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 183.5 100" enable-background="new 0 0 183.5 100" xml:space="preserve">
				<g>
					<rect fill-rule="evenodd" clip-rule="evenodd" width="126.4" height="28.2"/>
					<rect fill="'.$color.'" x="67.6" y="48.3" fill-rule="evenodd" clip-rule="evenodd" width="115.9" height="15.3"/>
					<rect x="67.6" y="84.7" fill-rule="evenodd" clip-rule="evenodd" width="115.9" height="15.3"/>
				</g>
				</svg>';
			break;
		case 'square';
			$ratio = 1;
			$width = $height;
			return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  height="'.$height.'" width="'.$width.'"
						 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
					<rect fill="'.$color.'" width="100" height="100"/>
					</svg>
					';
			break;
		case 'tumbler';
			$ratio = 103/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 103 100" enable-background="new 0 0 103 100" xml:space="preserve">
			<g>
				<g>
					<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M40.5,82.8c-7.1-2.8-6-11.8-6-11.8V41.5h23V25.3H34V0.3H20
						c0,0-0.7,10.9-6.1,17.2C8.1,24.2,0,26.8,0,26.8v14.7h11v36.4c0,0-0.5,9.8,6.6,15.4c7.2,5.6,12.2,6.2,23.1,6.4
						c10.8,0.2,19.8-5.6,19.8-5.6V78.9C60.5,78.9,48.7,86.1,40.5,82.8z M89,72.5c-7.7,0-14,6.2-14,13.8c0,7.6,6.3,13.8,14,13.8
						c7.7,0,14-6.2,14-13.8C103,78.6,96.8,72.5,89,72.5z"/>
				</g>
			</g>
			</svg>
			';
			break;
		case 'twitter':
			$ratio = 119.4/100;
			$width = $height * $ratio;
			return '
			<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 119.4 100" enable-background="new 0 0 119.4 100" xml:space="preserve">
			<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M8.8,6c17.3,22.7,50.9,26.5,50.9,26.5S53.6,10.9,72,2.5
				c18.4-8.4,31.6,7.1,31.6,7.1s7.8-3.2,14-7.1c-0.3,3.8-8.8,12.4-8.8,12.4s4.6,0,10.5-1.8c0.3,4.9-10.5,12.4-10.5,12.4
				s4.4,39.2-33.3,63.6C37.7,113.5,1,89.4,0,89.1c24,3.4,36.9-10.6,36.9-10.6S13.7,73.7,14,62.6c11.2,0.4,10.5-1.8,10.5-1.8
				s-22.1-8-19.3-24.7c3.5,1.4,10.5,3.5,10.5,3.5S-3.4,25.2,8.8,6z"/>
			</svg>';
			break;
		case 'vimeo':
			$ratio = 118.8/100;
			$width = $height * $ratio;
			return '<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
					 viewBox="0 0 118.8 100" enable-background="new 0 0 118.8 100" xml:space="preserve">
				<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M3.9,32.8c-0.5-0.5-2.6-2.8-3.6-4.4c-0.5-0.9-0.3-2.5,0.9-3.5
					c1.1-0.9,17.6-14.6,20.6-16.8c3-2.2,8.7-8.1,17-6.2C48,4,49.6,10.8,49.6,10.8s2.9,15.5,4.5,23.8c1.6,8.3,7.4,29.1,10.8,29.1
					c3.4,0,7.9-6.6,11.7-12.3c4.8-7.1,8.9-18.7,5.4-22.9c-4.5-5.5-13.6-0.7-14.4-1.8c-0.8-1.1,6-16.4,13.5-21.2c6.4-4,22.4-8.5,30.5-2.6
					c10,7.3,8.8,24.9,1.8,37c-7,12.2-10.9,18.6-15.3,24.7c-4.4,6.1-22,27.1-31,31.3c-9,4.2-14.4,5.5-19.3,3.1
					c-6.1-2.9-12.2-11.4-17-31.7C26,47.1,21.9,34.9,18.2,31c-3.7-3.8-6.9-0.4-9.9,1.8C6.7,34,4.9,33.7,3.9,32.8z"/>
				</svg>';
			break;
		case 'youtube':
			$ratio = 87.6/100;
			$width = $height * $ratio;
			return '
			<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 87.6 100" enable-background="new 0 0 87.6 100" xml:space="preserve">
			<g>
				<g>
					<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M24.6,14.9L19.9,0h-5.6l6.5,19.6v17.7h6.5V19.6L33,0h-4.7
						L24.6,14.9z M41.5,8.4C34.8,9,34,14.9,34,14.9v17.7c0,0,0.7,5.4,7.5,5.6c6.8,0.1,7.5-5.6,7.5-5.6V14C48.9,14,48.1,7.8,41.5,8.4z
						 M42.4,33.5c-2.2,0.7-2.8-2.8-2.8-2.8V15.8c0,0-0.5-3,1.9-2.8c2.3,0.2,2.8,2.8,2.8,2.8v14.9C44.3,30.7,44.6,32.8,42.4,33.5z
						 M63.9,9.3v21.4c0,0-0.7,2.8-2.8,2.8c-2.1,0-1.9-1.9-1.9-1.9V9.3h-5.6v25.1c0,0,0.8,4.2,4.7,3.7c3.6-0.5,5.6-3.7,5.6-3.7v3.7h5.6
						V9.3H63.9z"/>
				</g>
			</g>
			<g>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M75.1,68.9c0,0-0.1-2.7-2.8-2.8c-2.7-0.1-2.8,2.8-2.8,2.8v3.7h5.6
					V68.9z"/>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M53.6,66.1c-2.1-0.4-2.8,1.9-2.8,1.9v16.8c0,0,0,1.5,1.9,1.9
					c1.9,0.4,2.8-1.9,2.8-1.9V67.9C55.5,67.9,55.7,66.5,53.6,66.1z"/>
				<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$color.'" d="M75,43.2H12.7C5.7,43.2,0,48.9,0,55.8v31.5
					c0,7,5.7,12.7,12.7,12.7H75c7,0,12.7-5.7,12.7-12.7V55.8C87.6,48.9,81.9,43.2,75,43.2z M19,90.3h-5.6V57.7H6.8v-6.5h17.8v6.5H19
					V90.3z M40.5,90.3h-5.6v-2.8c0,0-0.6,2.5-4.7,2.8c-5.2,0.4-5.6-3.7-5.6-3.7V61.4h5.6v22.3c0,0,0.3,1.9,1.9,1.9
					c2.5-0.1,2.8-2.8,2.8-2.8V61.4h5.6V90.3z M60.1,87.5c0,0-0.5,2.9-4.7,2.8c-2.8-0.1-4.7-1.9-4.7-1.9v1.9h-5.6V51.2h5.6v12.1
					c0,0,4.4-3,6.5-1.9c2.7,1.4,2.8,4.7,2.8,4.7V87.5z M73.2,91.2c-7,0.8-8.4-5.6-8.4-5.6V67.9c0,0,0.4-6.5,7.5-6.5
					c7.3,0,7.5,5.6,7.5,5.6v10.2H69.5v6.5c0,0,0.2,2.7,2.8,2.8c2.6,0.1,2.8-1.9,2.8-1.9v-4.7h4.7v5.6C79.8,85.6,80.2,90.4,73.2,91.2z"
					/>
			</g>
			</svg>';
			break;
		//Bootstrap Glyphs (BSG)
		case 'bsg-login':
			$ratio = 118.2/100;
			$width = $height * $ratio;
			return '
			<svg '.$class.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="'.$height.'" width="'.$width.'"
				 viewBox="0 0 118.2 100" enable-background="new 0 0 118.2 100" xml:space="preserve">
				<path fill="'.$color.'" d="M63.6,50L27.3,81.8V63.6H0V36.4h27.3V18.2L63.6,50z M45.5,0h36.4c10,0,18.6,3.6,25.7,10.7
				c7.1,7.1,10.7,15.7,10.7,25.7v27.3c0,10-3.6,18.6-10.7,25.7c-7.1,7.1-15.7,10.7-25.7,10.7H45.5V81.8h45.5c2.5,0,4.6-0.9,6.4-2.7
				c1.8-1.8,2.7-3.9,2.7-6.4V27.3c0-2.5-0.9-4.6-2.7-6.4c-1.8-1.8-3.9-2.7-6.4-2.7H45.5V0z"/>
			</svg>
			';
			break;
		//default - add new ones before this line
		default:
			return 'X';
			
	}
}
echo '<!-- SVG Icons Loaded -->';
?>