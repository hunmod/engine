<?php
if ($fb_ap_id!=''&&$fb_ap_secret!='')
{
$facebook = new Facebook(array(
	'appId' => $fb_ap_id,
	'secret' => $fb_ap_secret
));

if($facebook->getUser() == 0){
	$fbloginUrl = $facebook->getLoginUrl(array(
		scope => 'user_managed_groups,manage_pages,publish_actions,user_friends,read_page_mailboxes,rsvp_event,email,ads_management,ads_read,read_insights,manage_pages,publish_pages,user_birthday,user_religion_politics,user_relationships,user_relationship_details,user_hometown,user_location,user_likes,user_education_history,user_work_history,user_website,user_managed_groups,user_events,user_photos,user_videos,user_friends,user_about_me,user_status,user_games_activity,user_tagged_places,user_posts'
	));
	
}
}



if ($_SESSION["uid"]<1)
{
if ($_GET["fblog"]==1){	
	if ($fbloginUrl!=''){
		//echo "<a href = '$fbloginUrl'>Login with facebook</a>";
header("Location:".$fbloginUrl);

	}
	else{
	$users=$User_Class->fblogin_save();	
	$_SESSION["uid"]=$users['id'];
	}
	$redi=1;
}




if (isset($_POST["loginform_id"]))
if ($_POST["loginform_id"])
{
    $_POST["pass"]=mysql_real_escape_string($_POST["pass"]);

    //$ideglenes=login($_POST["uname"],$_POST["pass"]);
	$ideglenes=$User_Class->userlogin($_POST["email"],$_POST["pass"]);
	//arraylist($ideglenes);
	if ($ideglenes["id"]>0) 
	{
		$_SESSION["uid"]=$ideglenes["id"];
		$redi=1;
	}
	else
	{
		$_SESSION["messageerror"]="Hibás felhasználóinév vagy jelszó!";	
	}
}
//arraylist($_SESSION);

}



$auser=$UserClass->get_userid($_SESSION["uid"]);
if ($auser["status"]==4){
	unset($_SESSION["uid"]);
	$_SESSION["messageerror"]="Törölt felhasználó!";	
}
else{
if ($redi==1)header("Location:".$homeurl.$seprator.$_GET['q']);
	
}


?>