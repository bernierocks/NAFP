<?
$logindefs = array(
	'get'					=> 'form',
	'layout' 				=> 'vertical',
	'user_placeholder' 		=> 'Username',
	'user_label'			=> '',
	'user_class'			=> '',
	'pass_placeholder'		=> 'Password',
	'pass_label'			=> '',
	'pass_class'			=> '',
	'forgot_pass_label'		=> 'Forgot Password?',
	'forgot_pass_class'		=> '',
	'forgot_pass_position' 	=> 'left',
	'forgot_pass'			=> true,
	'submit_value'			=> 'Sign In',
	'submit_class'			=> '',
	'use_bootstrap'			=> false
);
function setDefaults($o){
	global $logindefs;
	global $server_name;
	global $org_id;
	global $domain;
	if(is_array($o)){
		foreach($logindefs as $k => $v){
			if(!isset($o[$k])){
				$o[$k] = $logindefs[$k];
			}
		}
	} else {
		$o = $logindefs;
	}
	$o['server_name'] = $server_name;
	$o['org_id'] = $org_id;
	$o['domain'] = $domain;
	return $o;
}
function get_form($o){
	//Create Forgot Pass link
	if($o['forgot_pass'] == true){
		$fplink = '<a class="'.$o['forgot_pass_class'].'" href="http://'.$o['domain'].'/forgot_pwd.php">'.$o['forgot_pass_label'].'</a>';
	}
	
	//set position of Forgot Password link
	if($o['forgot_pass_position'] == 'left'){
		$fplink_left = $fplink;
	} else if($o['forgot_pass_position'] == 'right'){
		$fplink_right = $fplink;
	}
	
	//set up bootstrap options
	if($o['use_bootstrap'] == true){
		$v1_class = ' class="input-group" ';
		$form_control = ' form-control';
		$user_label = '<span class="input-group-addon">'.$o['user_label'].'</span>';
		$pass_label = '<span class="input-group-addon">'.$o['pass_label'].'</span>';
	} else {
		$user_label = $o['user_label'];
		$pass_label = $o['pass_label'];
	}
	
	//If layout = vertical, add the necessary divs
	if($o['layout'] == 'vertical'){
		$v1 = '<div'.$v1_class.'>';
		$v2 = '</div>';
	}
	return '
	<div id="login">
		<form action="https://'.$o['server_name'].'/members/gateway.php" method="post">
		<input type="hidden" name="org_id" value="'.$o['org_id'].'" />
		'.$v1.'
		'.$user_label.' <input name="Username" type="text" placeholder="'.$o['user_placeholder'].'" class="'.$o['user_class'].$form_control.'" />
		'.$v2.$v1.'
		'.$pass_label.' <input name="Password" type="password" placeholder="'.$o['pass_placeholder'].'" class="'.$o['pass_class'].$form_control.'" />
		'.$v2.'
		'.$fplink_left.'
		<input type="submit" value="'.$o['submit_value'].'" class="'.$o['submit_class'].'" />
		'.$fplink_right.'
		
		</form>
	</div>
	';
}
function get_pieces($o){
	$peices = array(
		'form_start'	=> '<form action="https://'.$o['server_name'].'/members/gateway.php" method="post"><input type="hidden" name="org_id" value="'.$o['org_id'].'" /><input type="hidden" name="org_id" value="'.$o['org_id'].'" />',
		'input_user'	=> '<input name="Username" type="text" placeholder="'.$o['u_placeholder'].'" class="'.$o['u_class'].'" />',
		'input_pass'	=> '<input name="Password" type="password" placeholder="'.$o['p_placeholder'].'" class="'.$o['p_class'].'" />',
		'input_submit'	=> '<input type="submit" value="'.$o['s_value'].'" class="'.$o['s_class'].'" />',
		'forgot_pass'	=> '<a class="'.$o['forgot_pass_class'].'" href="http://'.$o['domain'].'/forgot_pwd.php">'.$o['forgot_pass_label'].'</a>',
		'form_end'		=> '</form>'
	);
	return $peices;
}

function log_in_form($o = ''){
	$o = setDefaults($o);
	$output = 'There was a problem with your log in form options.  Please make sure things are set correctly and try again.';
	if($o['get'] == 'form'){
		$output = get_form($o);
	} else if($o['get'] == 'pieces'){
		$output = get_pieces($o);
	}
	return $output;
} 
