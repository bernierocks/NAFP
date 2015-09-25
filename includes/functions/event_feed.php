<?
/************************************************************

		DON'T EDIT ANYTHING BELOW THIS :)

************************************************************/


function event_feed($o){
		//sets some globals and vars
	global $org_id;
	global $server_name;
	global $site_is_a_redesign;
	global $domain;
	$counter=1;
	$template = @file_get_contents($o['template_file']);
	if($template === false){
		echo '<br><br><br><br><center><b>Template not set.  Please set template.</b></center><br><br><br><br>';
		return;
	}
		//gets the json feed of $events
	$ch = 	curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.'.$server_name.'/members/cal_json/'.$org_id.'_results.json');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
		$data = array('org_code' => $org_id,
		'username' => $username,
		'password' => $password
	);
	$data = curl_exec($ch);
	$events = json_decode($data, true);
		//uncomment the next part to see all your mistakes!
	// echo '<pre>';
	// print_r($events);
	// echo '<pre>';
	// die();
	
	
	
	$replace_keys = array(
		'##TITLE##',		
		'##DESCRIPTION##',	
		'##DETAILS##',
		'##MORE_LINK##',
		'##URL##',
		'##LINK_1_TITLE##',
		'##LINK_1_URL##',
		'##LINK_2_TITLE##',
		'##LINK_2_URL##',
		'##HIGHLIGHT##',
		
		
		'##START_TIME##',
		'##END_TIME##',
		'##DAY##',
		'##MONTH##',
		'##YEAR##',
		'##DATE##',

		'##CONTACT_NAME##',
		'##CONTACT_EMAIL##',
		'##CONTACT_PHONE##',

		'##LOCATION_NAME##',
		'##ADDRESS_1##',
		'##ADDRESS_2##', // only shows up if it contains information
		'##CITY##',
		'##STATE##',
		'##ZIP##'
	);
	
	//start the looooooooooop!
	if (count($events) < 1){
		echo '<br><br><br><br><center><b>No Current Events</b></center><br><br><br><br>';
	} else {
		foreach ($events as $event){
				//continue test
				//skip this event if A) max number of events has been reached OR B) if it's an empty event record OR C) The event startdate is before today 
			if(/*A*/$o['number_of_events'] !== false && $o['number_of_events'] < $counter || /*B*/ $event['eventid'] == '' || /*C*/ strtotime($event['startdate'])<time()){
				continue;
			}
				//setting more vars!
			$ev_id		= $event['eventid'];
			
				// full details URL and "more" link - if alt_landing_page is set, the link points there instead
			$target = ($o['open_links_in_new_tab'] == true)?' target="_blank" ':'';
			if($event['alt_landing_page'] == ''){
				$det_url = 'http://www.'.$server_name.'/Calendar/moreinfo.php?eventid='.$ev_id;
			} else{
				$det_url = $event['alt_landing_page'];
				$target = ' target="_blank" ';
			}
			//Sets the default read more link
			if($o['read_more_link'] !== false && $o['read_more_link'] != ''){
				$default_more_link = '<a class="ev-more-info-link" '.$target.' href="'.$det_url.'">'.$o['read_more_label'].'</a>';
			} else {
				$default_more_link = '';
			}
			//sets the read more link if it was declared false in the options, but was used in the template
			if(strpos($template,'##MORE_LINK##') != false){
				$more_link = '<a class="ev-more-info-link" '.$target.' href="'.$det_url.'">'.$o['read_more_label'].'</a>';
			}


				//set title link or not
			if($o['title_as_link'] === true){
				$ev_title = '<a class="ev-title-link" '.$target.' href="'.$det_url.'">'.$event['name'].'</a>';
			} else {
				$ev_title = $event['name'];
			}
			
				// format the blurb: remove tags, handle text limits
			$ev_blurb = ($o['desc_strip_tags']==true)?strip_tags($event['description'],'<br><br/>'):$event['description'];
			if($o['desc_text_limit'] !== false){
				if($o['desc_text_hard_break'] === false){
					$ev_blurb 	= (strlen($ev_blurb)>$o['desc_text_limit'])? substr($ev_blurb, 0, strpos($ev_blurb, ' ', $o['desc_text_limit'])).'... '.$default_more_link: $ev_blurb.$default_more_link;
				} else {
					$ev_blurb = (strlen($ev_blurb)>$o['desc_text_limit'])? substr($ev_blurb, 0,  $o['desc_text_limit']).'... '.$default_more_link: $ev_blurb.$default_more_link;
				}
			}
			
				//set highlighting on item if checked
			if($event['highlight'] == 'X'){
				$highlight_class = $o['highlight_class'];
			} else {
				$highlight_class = '';
			}
			
			$replace_values = array(
				$ev_title,
				$ev_blurb,
				$event['details'],
				$more_link,
				$det_url,
				$event['link_title_1'],
				$event['link_url_1'],
				$event['link_title_2'],
				$event['link_url_2'],
				$highlight_class,

				$event['start_time'],
				$event['end_time'],
				date($o['format_day'],strtotime($event['startdate'])),
				date($o['format_month'],strtotime($event['startdate'])),
				date($o['format_year'],strtotime($event['startdate'])),
				date($o['format_full_date'],strtotime($event['startdate'])),

				$event['contactname'],
				$event['contactemail'],
				$event['contactphone'],

				$event['location_name'],
				$event['address'],
				$event['address2'],
				$event['city'],
				$event['state'],
				$event['zip']
			);
			echo str_replace($replace_keys,$replace_values,$template);
			++$counter;
		}
	}
}
echo '<!-- Event Feed Loaded -->';
?>