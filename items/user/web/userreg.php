<?php
// start session
$loginclass=new user();
$errors=$loginclass->errormessages();
if ($_POST["regform"]=='2'){
    $_SESSION["regeerror"]=array();
	$_SESSION["postid"]=$_POST;

	$mezoka=$_POST;
		$mezoka['nev']=$_POST['nev'];
		$mezoka['unev']=$_POST["unev"];
		$mezoka['email']=$_POST['email'];
		$mezoka['pass']=$_POST['pass'];
		$mezoka['status']='1';	
		$mezoka['hirlevel']=$_POST['hirlevel'];	
		$mezoka['last_activity']=$date;
		$mezoka['jogid']=1;

               // arraylist($_POST);

                
		$unamexists=$loginclass->get_users(array("unev"=>$mezoka['unev']),$order='',$page='all');
                //arraylist($unamexists);
		if ($unamexists['datas'][0]['id']>0){
                    
		//$_SESSION["messageerror"]=$errors["foglaltuname"];	
                //$_SESSION["regerror"]='unev';
			$_SESSION["regeerror"]["unev"]=$lan["regeerror_unev"];				

		}
		$unamexists=$loginclass->get_users(array("email"=>$mezoka['email']),$order='',$page='all');
                //arraylist($unamexists);
		if ($unamexists['datas'][0]['id']>0){
			//$_SESSION["messageerror"]=$errors["foglaltemail"];				
//$_SESSION["regerror"]='email';
			$_SESSION["regeerror"]["email"]=$lan["regeerror_unev"];				
			
		}
                arraylist($_SESSION);
		if($_SESSION["messageerror"]==""&&!count($_SESSION["regeerror"])){
			$loginclass->reg_users($mezoka);
			$auser=$users["datas"][0];
			$_SESSION["messageok"]=$errors['regok_email'];	
			$regparam="";
		//email
		$VALIDATE_URL=$server_url.$separator."user/validate/".encode($_POST["email"]);
		$mire=array($mezoka["unev"],$mezoka["nev"],$mezoka["email"],$mezoka["pass"],$VALIDATE_URL);
		$mit=array('USERNAME','REALNAME','USEREMAIL','USERPASS','VALIDATE_URL');
		$subject=str_replace($mit, $mire, page_settings("email_reg_subject"));
		$message=str_replace($mit, $mire, page_settings("email_reg_text"));
		//echo $message;
		emailkuldes($mezoka['email'],$mezoka['unev'],$subject,$message);
		}

}

$lasturl=$_SESSION["utolso_lap"];

if ($lasturl!=""){
  	header("Location:".$lasturl);	
}
else{
        header("Location:".$homeurl);
}
$noerrorep=1;

?>


