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
//var_dump($user);
//$message["access_token"]= $user["fbtoken"];

//$message["message"]="messs";
//$message["link"]="http://abrakahasba.hu";
//$message["picture"]="http://i.imgur.com/lHkOsiH.png";
//$message["name"]="my name";
//$message["caption"]="caption";
//$message["description"]="description";
//$retm= $facebook->api('/friendlist-'.$user["fbid"], 'GET');

try {
$retm= $facebook->api('/me/friends', 'GET');

return $retm;
} catch(Exception $e) 
{
echo $e->getMessage();
}
}

function getfriendslistfb($user)
{
global 	$facebook,$usertoken;
//arraylist($user);
//$message["access_token"]= $user["fbtoken"];

//$message["message"]="messs";
//$message["link"]="http://abrakahasba.hu";
//$message["picture"]="http://i.imgur.com/lHkOsiH.png";
//$message["name"]="my name";
//$message["caption"]="caption";
//$message["description"]="description";
//$retm= $facebook->api('/friendlist-'.$user["fbid"], 'GET');

try {
//$retm= $facebook->api('/'.$user["fbid"].'/friendlists', 'GET');
$retm= $facebook->api('/me/friendlists', 'GET');

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

function getccfb($user)
{
	global 	$facebook,$usertoken;
	try {
		$retm= $facebook->api('/me/friendlists', 'GET');
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


postmefb($user,$message);

$friends=getfriendsfb($auser);
//arraylist($friends);
$friendslist=getccfb($auser);
arraylist($friendslist);

//var_dump($facebook);
?>