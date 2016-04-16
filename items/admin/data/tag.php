<?php
$admintemplate=1;
$Sys_Class=new sys();
$form=new formobjects();

if ($_POST){
    $Sys_Class->save_list('tags',$_POST);
    $filters["id"]=$_POST["id"];
}

$status=array('2'=>'Active','4'=>'Deleted');
$filters=array();
if ($getparams[2]>0)
{
    $filters["status"]='all';
    $filters["id"]=$getparams[2];
    $filters2["sub"]=$getparams[2];
}

if ($filters["id"]>0){
    $datas=$Sys_Class->get_list('tags',$filters);

}
$data=$datas[0];
//arraylist($datas);
?>