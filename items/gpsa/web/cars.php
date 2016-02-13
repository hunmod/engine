<?php

$filters["rendszamok"]="'862548026691464','356895036977984'";


$carlist=$gpsacars_class->get_cars($filters);
arraylist($carlist);
echo($carlist['query']);

if (!$get["rsz"]){
//$get["rsz"]='356895036977984';
}


$Form_Class->selectbox('rsz',$carlist['datas'],$typ=array('value'=>'rendszam','name'=>'vrendszam'),$get["rsz"],$caption="")
?>