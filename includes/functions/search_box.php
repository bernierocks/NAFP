<?
$dso = array( 	//default search options.  For making a simple search, feel free to call
				// search_box($dso);
	'bootstrap-button' 	=> 'right',
	'submit_button' 	=> 'Submit',
	'placeholder'		=> 'Search&hellip;'
);
function search_box($o = ''){
	global $google_search_code;
	global $domain;
	if($o['bootstrap_button'] == 'right'){
		$search_button_r = '<span class="input-group-addon"><input value="'.$o['submit_button'].'" name="sa" class="search-button" type="submit"></span>';
	} elseif ($o['bootstrap_button'] == 'left'){
		$search_button_l = '<span class="input-group-addon"><input value="'.$o['submit_button'].'" name="sa" class="search-button" type="submit"></span>';
	} else {
		$search_button_r = '<input value="'.$o['submit_button'].'" name="sa" class="search-button" type="submit">';
	}
	if(isset($o['bootstrap_button']) && $o['bootstrap_button'] != false){
		$ig = '<div class="input-group">';
		$ig_end = '</div>';
		$fc = 'form-control';
	}
	return '
		<form id="searchbox" action="http://'.$domain.'/search.php?ma=Y">
			'.$ig.'
				<input value="'.$google_search_code.'" name="cx" type="hidden">
				<input value="FORID:11" name="cof" type="hidden">
				'.$search_button_l.'
				<input id="q" '.$fc.' name="q" type="search" class="search-input '.$fc.'" placeholder="'.$o['placeholder'].'">
				'.$search_button_r.'
			'.$ig_end.'
		</form>';
}
?>