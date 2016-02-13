<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '943743955706230',
	'secret' => '6ee0ad7178c9be59f1bcc41cee16a0e2'
));


$params["access_token"]="CAANaVIM9IXYBAPt6oJhZBLiyT5V8BrYxiCW99681iNSiANgmzTZBGzp2tXWZAhTy5PuM72MVbUk4vgakP6Yn5UJDeIlX0xCRR81igsNiDUxf8GhzBMG1RL4n1aSlrMRWuZBlOcIJnb1E81DpoyJDbrkxI3dxCHH2pr3Xxr5gvW8vaBiSLVE3G8Q1m6DionnVH86k1J7pXKMG2MZBsDi9m";
//$params["message"]="messs";
/*
$params["link"]="http://abrakahasba.hu";
//$params["picture"]="http://i.imgur.com/lHkOsiH.png";
//$params["name"]="my name";
//$params["caption"]="caption";
//$params["description"]="description";
try {
$retm= $facebook->api('145181848905382/feed', 'POST', $params);
} catch(Exception $e) 
{
echo $e->getMessage();
}
/* 

  // 466400200079875 is Facebook id of Fan page https://www.facebook.com/pontikis.net
  echo 'Successfully posted to Facebook Fan Page';

*/

if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl(array(
		scope => 'user_managed_groups,manage_pages,publish_actions,user_friends,read_page_mailboxes,rsvp_event,email,ads_management,ads_read,read_insights,manage_pages,publish_pages,user_birthday,user_religion_politics,user_relationships,user_relationship_details,user_hometown,user_location,user_likes,user_education_history,user_work_history,user_website,user_managed_groups,user_events,user_photos,user_videos,user_friends,user_about_me,user_status,user_games_activity,user_tagged_places,user_posts'
	));
	
	echo "<a href = '$loginUrl'>Login with facebook</a>";
}
else{
	
	//1019642288075101
		var_dump($facebook);
//echo $facebook['accessToken'];
	echo '<hr>';
	$token = $facebook->getAccessToken();
echo $token;		
	
	$userdatas= $facebook->api('/me/accounts');	
	$mytoken=($userdatas['data'][0]['access_token']);
	echo '<hr>';
	
	
	
$params["access_token"]=$mytoken;
//$params["message"]="messs";

$params["link"]="http://abrakahasba.hu";
//$params["picture"]="http://i.imgur.com/lHkOsiH.png";
//$params["name"]="my name";
//$params["caption"]="caption";
//$params["description"]="description";
try {
//$retm= $facebook->api('145181848905382/feed', 'POST', $params);
} catch(Exception $e) 
{
echo $e->getMessage();
}	
	
	
	$userdata= $facebook->api('me');
	//echo $userdata["id"];
	//barátok listája
	$userfriends= $facebook->api($userdata["id"].'/friends');
	//var_dump($userfriends);	
	//me/friends
	//me/taggable_friends
	
	//fotok
	$userphotos= $facebook->api('413107658728570/photos');
	//var_dump($userphotos);
	//me/photos
	//me/albums 	
	//$albumid/photos
	//me/photos/uploaded
	


	//tagok
	//$csooprtpageid/members



	$groups = $facebook->api('me/groups');
//	var_dump($facebook);
/*	$id = $groups[data][2][id];
	$id ='145181848905382';
	$api = $facebook->api($id. '/feed', 'POST', array(
		link => 'http://abrakahasba.hu',
		message => 'Check This Out !'
	));
	*/
	//posting to pages
/*	
	$pages = $facebook->api('me/accounts');
	$id = $pages[data][0][id];
	$token = $pages[data][0][access_token];
	$api = $facebook->api($id . '', 'POST', array(
		access_token => $token,
		link => 'cyberfreax.com',
		message => 'Check This Out !'
	));
	
	//posting to profile
	$api = $facebook->api('me/feed', 'POST', array(
		link => 'cyberfreax.com',
		message => 'Check This Out !'
	));
	*/
	//displaying logout link
//	echo "<br><a href = 'logout.php'>Logout</a>";
}

?>