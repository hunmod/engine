<?php
include ('./Facebook/autoload.php');
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}
$fb = new Facebook\Facebook([
    'app_id' => $fb_ap_id,
    'app_secret' => $fb_ap_secret,
    'default_graph_version' => 'v2.5',
]);

$helper = $fb->getJavaScriptHelper();
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (isset($accessToken)) {
// OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();

// Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);


//get id
    $fb->setDefaultAccessToken($accessToken);
    try {
        $response = $fb->get('/me');
        $userNode = $response->getGraphUser();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

//    echo 'Logged in as ' . $userNode->getId();


//get email
    $response = $fb->get('/me?fields=name,email');
    $userNode = $response->getGraphUser();
   $saveuser['email']= $useremail= $userNode->getField('email');
    $saveuser['nev']= $username= $userNode->getField('name');
    $saveuser['unev']= $username= $userNode->getField('name');
    $saveuser['fbid']= $userfbid= $userNode->getField('id');
    $saveuser['status']='2';
    $saveuser['jogid']='2';
    $saveuser['pass']=randomPassword();


    $getusers=$User_Class->get_users(array('email'=>$useremail) );
   // arraylist($getusers);
    $getusersdata=$getusers['datas'][0];
    if ($getusersdata['id']){
        $_SESSION["uid"] =$getusersdata['id'];
    }
    else{
        $_SESSION["uid"] = $User_Class->save($saveuser);

    }
}

?>
<script>
    location.reload();
</script>
