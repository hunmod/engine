ghfhgf<br />
jhgj<br />
fgd<br />
<br />
<br />
<br />
<br />
<?php

function getfriendsfb($user)
{
	global 	$facebook,$usertoken;
	try {
	$retm= $facebook->api('/me/friends?limit=100&offset=0', 'GET');
	return $retm;
	} catch(Exception $e) 
	{
	echo $e->getMessage();
	}
}

function getfriendslistfb($user)
{
	global 	$facebook,$usertoken;
	try {
	$retm= $facebook->api('/me/friendlists?limit=100&offset=0', 'GET');
	return $retm;
	} catch(Exception $e) 
	{
	echo $e->getMessage();
	}
}

function getfamilyfb($user)
{
	global 	$facebook,$usertoken;
	try {
		$retm= $facebook->api('/me/family', 'GET');
		return $retm;
	} catch(Exception $e) 
	{
		echo $e->getMessage();
	}
}

function getfeedsfb($user)
{
	global 	$facebook,$usertoken;
	try {
		$retm= $facebook->api('/me/feed', 'GET');
		return $retm;
	} catch(Exception $e) 
	{
		echo $e->getMessage();
	}
}

function getlikesfb($user)
{
	global 	$facebook,$usertoken;
	try {
		$retm= $facebook->api('/me/likes', 'GET');
		return $retm;
	} catch(Exception $e) 
	{
		echo $e->getMessage();
	}
}

function getuserdatafb($userid)
{
	global 	$facebook,$usertoken;
	try {
		$retm= $facebook->api('/'.$userid, 'GET');
		return $retm;
	} catch(Exception $e) 
	{
		echo $e->getMessage();
	}
}

function postmefb($user,$message)
{
global 	$facebook,$usertoken;
//var_dump($facebook);
$message["access_token"]= $user['fbtoken'];

//$message["message"]="messs";
$message["link"]="http://abrakahasba.hu";
//$message["picture"]="http://i.imgur.com/lHkOsiH.png";
//$message["name"]="my name";
//$message["caption"]="caption";
//$message["description"]="description";
try {
$retm= $facebook->api('me/feed', 'POST', $message);
} catch(Exception $e) 
{
echo $e->getMessage();
}
}



$friends=getfriendsfb($auser);
arraylist($friends);
/*foreach ($friends["data"] as $fri){
echo '<img src="'.'https://graph.facebook.com/'.$fri['id'].'/picture?width=150&height=150'.'" />';
}
*/
//$friendslist=getccfb($auser);
//arraylist($friendslist);

//var_dump($facebook);
?>
