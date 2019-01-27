<?php

if ($_SESSION["uid"]<1)
{
if ($_GET["fblog"]==1){	

}
 //   echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
  //  arraylist($_POST);

    if (isset($_POST))
if ($_POST["loginform_id"])
{
	//$ideglenes=login($_POST["uname"],$_POST["pass"]);
	$ideglenes=$User_Class->userlogin($_POST["email"],$_POST["pass"]);

   // arraylist($ideglenes);
   // echo($ideglenes);
	if ($ideglenes["id"]>0)
	{
		$_SESSION["uid"]=$ideglenes["id"];
		$redi=1;
	}
	else
	{
		$_SESSION["messageerror"]="Hibás felhasználóinév vagy jelszó!".arraylist($ideglenes);;
	}
}
//arraylist($_SESSION);

}

if ($_SESSION["uid"] > 0) {
	$auser=$UserClass->get_userid($_SESSION["uid"]);
	if (isset($_SESSION["adminid"]))
		if ($_SESSION["adminid"] > 0) {
			$auser = $UserClass->get_userid($_SESSION["uid"]);
		}
}

if ($auser["status"]==4){
	unset($_SESSION["uid"]);
	$_SESSION["messageerror"]="Törölt felhasználó!";	
}
else{
if ($redi==1)header("Location:".$homeurl.$separator.$_GET['q']);
}


?>