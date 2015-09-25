<?php
//function for returning times
function timeBoxer($array){
	foreach($array as $value){
		$return .= '<span class="countdown-element">'.$value.'</span>';
	}	
	return $return;
}

//Primary Timer maker
function getCountdown($eventCategory){
	global $server_name;
	global $org_id;
	//get event data - function in event_feed.php
	$events = getEventData($server_name,$org_id);

	//make sure there is event data
	if (count($events) < 1){
		echo '<br><br><br><br><center><b>No Current Events</b></center><br><br><br><br>';
		return;
	} 

	//make sure there is an appropriate event and get its start time
	$count_time = 0;
	foreach($events as $event){
		//set vars
		$cal_types = explode('*',$event['cal_types']);
		
		//check for cal type
		if(in_array($eventCategory,$cal_types)){
			
			//find most up-coming start time
			$temp_start_time =($event['start_time'] != 'null')?$event['start_time']:'3:00 PM';
			//echo $event['start_time'];
			$temp_time =  strtotime($event['startdate'].' '.$temp_start_time);
			if($count_time == 0 || ($temp_time < $count_time)){
				$ev_start_date = $event['startdate'];
				$count_time = $temp_time;
				$count_title = $event['name'];
			}
		}
	}
	$today = time();
	$diff = abs($count_time - $today);


	$days = floor(($diff)/(60*60*24));
	$hours = floor(($diff - $days * 60 * 60 * 24) / (60 * 24));
	$minutes = floor(($diff - ($days * 60 * 60 * 24) - ($hours * 60 * 24)) / (60));

	while($minutes>60){
		$minutes -= 60;
		$hours += 1;
	}
	while($hours>24){
		$hours -= 24;
		$days +=1;
	}

	$days_e = str_split($days,1);
	$hours_e = str_split($hours,1);
	$minutes_e = str_split($minutes,1);
	
	$timeDays = timeBoxer($days_e);
	$timeHours = timeBoxer($hours_e);
	$timeMinutes = timeBoxer($minutes_e);
	return $timeDays.'<span class="counter-label"> Days </span>'.$timeHours.'<span class="counter-label"> H<span class="counter-abbreviation">ou</span>rs </span>'.$timeMinutes.'<span class="counter-label"> Min<span class="counter-abbreviation">utes</span> </span>';
}
