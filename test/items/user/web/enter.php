<?php
/*if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl(array(scope => 'user_managed_groups,manage_pages,publish_actions,user_friends,read_page_mailboxes,rsvp_event,email,ads_management,ads_read,read_insights,manage_pages,publish_pages,user_birthday,user_religion_politics,user_relationships,user_relationship_details,user_hometown,user_location,user_likes,user_education_history,user_work_history,user_website,user_managed_groups,user_events,user_photos,user_videos,user_friends,user_about_me,user_status,user_games_activity,user_tagged_places,user_posts'
	));
			//header("Location:".$fbloginUrl);

	echo "<a href = '$loginUrl'>Login with facebook</a>";
}
else{
	
*/

//$params["access_token"]="CAAGmHRZCA6osBAPg7PyiFpxokJqZAeYNvtV8bQb2Rb56Yv16Wsqdj7ImbVvr9ksZBbdMmiwtSYiSr7l5oBD0ZB28fYK4s4SjVC5azt9ZAYRehv570YkWMHBKzQ8ARisFMzw8QNhV30yAuqTZCqjTzEV3T2LAC3ANINRaCO0VZAOnPGR2KoMRanCgTJBlgApCM5kDl5eZBQTvmfyLlxeRKVaTSeZAhBoS2oXIZD";
//$params["message"]="messs";
$params["link"]="http://abrakahasba.hu";
//$params["picture"]="http://i.imgur.com/lHkOsiH.png";
//$params["name"]="my name";
//$params["caption"]="caption";
//$params["description"]="description";
try {
//$retm= $facebook->api('832038756865744/feed', 'POST', $params);
} catch(Exception $e) 
{
//echo $e->getMessage();
}

	$api = $facebook->api('me/feed', 'POST', array(
		link => 'abrakahasba.hu',
		message => 'Check This Out !',
		//access_token=>'CAAGmHRZCA6osBAPg7PyiFpxokJqZAeYNvtV8bQb2Rb56Yv16Wsqdj7ImbVvr9ksZBbdMmiwtSYiSr7l5oBD0ZB28fYK4s4SjVC5azt9ZAYRehv570YkWMHBKzQ8ARisFMzw8QNhV30yAuqTZCqjTzEV3T2LAC3ANINRaCO0VZAOnPGR2KoMRanCgTJBlgApCM5kDl5eZBQTvmfyLlxeRKVaTSeZAhBoS2oXIZD'
	));

/*	$api = $facebook->api('832038756865744/feed', 'POST', array(
		link => 'abrakahasba.hu',
		message => 'Check This Out !',
		access_token=>'CAAGmHRZCA6osBAFPLlKmlINbrFYRBQrYqezOOMmluwuCe7EbcVCHsFmZBPIGaJdzsPjBJj4IXZCNFYW8j0Pvt7QO4ZA47waW7ljAaCAnrG7AUmJicjSBpHooMdweq06bmmfH1cIlMSzZADb3vaWm8DYOASwzKbQrzivgQVBBZCweY2lxOOWZBlyZBwNN128PJH4CPHzz8RKNNfhETNr6baL0OlHpO4XK4t8ZD'
	));*/
	
//}


?>