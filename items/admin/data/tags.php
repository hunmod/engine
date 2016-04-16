<?php
$admintemplate=1;
$Sys_Class=new sys();
$form=new formobjects();
$status=array('2'=>'Active','4'=>'Deleted');
//$users=$jobclass->get_users(array());

if ($_GET['dtag']>0){
    $Sys_Class->save_list('tags',array("id"=>$_GET['dtag'],'status'=>'4'));
}

$datas=$Sys_Class->get_list('tags',$_GET,"all");
$createtbl=1;
if($mytables)foreach($mytables as $mytab){
  $tname= $mytab["Tables_in_" . $adatbazis["db1_db"]]."<br>";
    if ($tname=='tags') $createtbl=0;
}else{
    $createtbl=0;
}
//arraylist($mytables);

if ($createtbl==1) {
    $Sys_Class->create_list('tags');
}
?>