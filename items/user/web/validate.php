<?php //echo decode($getparams[2]);
$filters["email"]=decode($getparams[2]);
$activateuserd=$User_Class->get_users($filters,$order='',$page='all') ;
//arraylist($activateuserd);
$activateuser=$activateuserd["datas"][0];

if ($activateuser["id"]>0){
if ($activateuser["status"]!=4){
	$saved["id"]=$activateuser["id"];
	$saved["status"]=2;	
	$User_Class->save($saved);
	$_SESSION["messageok"]="fiokját aktiváltuk!";

}

	
}

?>