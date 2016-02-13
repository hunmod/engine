<?php
// start session


$loginclass=new user();
session_start();
if (page_settings("fb_ap_id")!="")$fb_ap_id=page_settings("fb_ap_id");
if (page_settings("fb_ap_secret")!="")$fb_ap_secret=page_settings("fb_ap_secret");
$required_scope     = 'public_profile,  email, user_posts,user_friends,user_likes,user_location,read_custom_friendlists'; //Permissions required
$redirect_url       = $homeurl.'/user/fbreg'; //FB redirects to this page with a code
//echo ($redirect_url);
if ($_POST["regform"]=='1'){
$_SESSION["postid"]=$_POST;
}
if ($_POST["loginbox"]=='1'){
unset($_SESSION["postid"]);
}
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

// init app with app id and secret
FacebookSession::setDefaultApplication($fb_ap_id,$fb_ap_secret);

$helper = new FacebookRedirectLoginHelper($redirect_url);
// login helper with redirect_uri

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
 $user_profile = $response->getGraphObject();

   // $user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
   //do stuff below, save user info to database etc.
  
  
	//echo '<hr>';
	$fbuser=array();
	$fbuser['id']= $user_profile->getProperty('id');
	$fbuser['first_name']= $user_profile->getProperty('first_name');
	$fbuser['last_name']=$user_profile->getProperty('last_name');
	$fbuser['gender']=$user_profile->getProperty('gender');
	$fbuser['link']=$user_profile->getProperty('link');
	$fbuser['locale']=$user_profile->getProperty('locale');
	$fbuser['name']=$user_profile->getProperty('name');
	$fbuser['verified']=$user_profile->getProperty('verified');
	$fbuser['email']=$user_profile->getProperty('email');
	//arraylist($fbuser);
	//felhasználó lekérdezése
	$users=$loginclass->get_users(array('email'=>$fbuser['email'],"active"=>"all"));
	//arraylist($users);
	$auser=$users["datas"][0];
	if ($auser['id']>0)
	{
            if ($auser['status']!=4)
            {            
		$_SESSION['uid']=$auser['id'];
		setcookie("ckuser", encode($_SESSION["uid"]),time()+3600,'/', '.'.$domain);

		//echo "login";
		//ha van ilyen akkor beléptetem
		if ($auser['fbid']==''){
		//echo "adddata";
		//ha még nincs fb azonosítója hozzárendelem.
			$loginclass->save(array('id'=>$auser['id'],'fbid'=>$fbuser['id']));
		}
		if ($auser['status']<2)
		{
			$loginclass->save(array('id'=>$auser['id'],'status'=>'2'));
			$_SESSION["messageok"]="Your account has been activated";	
			$regparam='';
		}
            }
            else{
                $_SESSION["messageerror"]=$usererrors["deleted_user"];	
                
            }
	}
	else if ($_SESSION["postid"]["regform"]=='1')
	{
		echo "reg";
		//ha nincs regisztrálom	
		$mezoka['nev']=$fbuser['first_name'].' '.$fbuser['last_name'];
		$mezoka['unev']=$_SESSION["postid"]["unev"];
		$mezoka['email']=$fbuser['email'];
		$mezoka['fbid']=$fbuser['id'];
		$mezoka['status']='2';	
		$mezoka['hirlevel']=$_SESSION["postid"]['newletter'];	
		$mezoka['last_activity']=$date;
		$mezoka['jogid']=1;
		$mezoka['cuisine']=$_SESSION["postid"]["cuisine"];
		
		$unamexists=$loginclass->get_users(array("unev"=>$mezoka['unev']),$order='',$page='all');
		//arraylist($unamexists);
		if ($unamexists['datas'][0]['id']>0){
			$_SESSION["messageerror"]=$usererrors["foglaltuname"];				
		}
		else{
			$User_Class->save_user($mezoka);
			$users=$User_Class->get_users(array('email'=>$fbuser['email']));
			$auser=$users["datas"][0];
			$_SESSION['uid']=$auser['id'];
			setcookie("ckuser", encode($_SESSION["uid"]),time()+3600,'/', '.'.$domain);
			$_SESSION["messageok"]=$status['regok'];	
			$regparam="";
		//email
		$VALIDATE_URL=$server_url.$separator."user/validate/".encode($auser["email"]);
		$mire=array($mezoka["unev"],$mezoka["nev"],$mezoka["email"],$mezoka["pass"],$VALIDATE_URL);
		$mit=array('USERNAME','REALNAME','USEREMAIL','USERPASS','VALIDATE_URL');
		$subject=str_replace($mit, $mire, page_settings("email_reg_subject"));
		$message=str_replace($mit, $mire, page_settings("email_reg_text_fb"));
		//echo $message;
		emailkuldes($fbuser['email'],$fbuser['first_name'].' '.$fbuser['last_name'],$subject,$message);
		}
		
	}else{
//echo "no user, no valid post";
	$_SESSION["messageerror"]="Not valid User";	

	$regparam="";

	}
//arraylist($_SESSION);


if ($_SESSION["utolso_lap"]!=""){
  	header("Location:".$_SESSION["utolso_lap"]);	
}
else{
  	header("Location:".$homeurl);
}
header("Location:".$homeurl.$regparam);



  // print data
 // echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
} else {
  // show login url
  	 $login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );

  if (!$_GET["code"]){
  	header("Location:".$login_url);
  	}	
  echo '<a href="' . $login_url  . '">Login</a>';
}
$noerrorep=1;