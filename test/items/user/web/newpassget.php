<?php 
$loginclass=new user();

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

//Új jelszó kérése
if ($_POST["passreset"]=='1'&&$_POST["unev"])
{
	//ellenőrzöm, hogy létezik e már az emailcím
	$usrchk=$UserClass->get_users(array("login"=>$_POST['unev'],'active'=>'all'));
	$chku=$usrchk['datas'][0];
	//arraylist($chku);
	if ($chku['id']>1){
	//létezik a user	

		//generálom az új jelszót
		$newpas=generatePassword();
		//lemetem az új jelszót
		$UserClass->save(array('id'=>$chku['id'],'pass'=>$newpas));
		//összeállítom az emailt
		$mire=array($chku["email"],$newpas,$chku["unev"],$chku["nev"]);
		$mit=array('USEREMAIL','USERPASS','USERNAME','REALNAME');
		$subject=str_replace($mit, $mire, page_settings("email_pass_reset_subject"));
		$message=str_replace($mit, $mire, page_settings("email_pass_reset_text"));
		emailkuldes($chku["email"],$chku["nev"],$subject,$message);
		$_SESSION["messageok"]="We sent a temporary password by email.";		
	//	
	}
	else{
		$_SESSION["messageerror"]="No such user";	
	}
}
header("Location:".$homeurl.$regparam);

$noerrorep=1;
