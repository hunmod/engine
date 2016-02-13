<style>
lat,
lng{
display:none;	
}
.rowdata:nth-child(2n+2){
background:#CCC;
}
date{
background:#666;
color:#FFF;
}
</style>
<div class="container">
<form method="get">
<?php
$carlist=$gpsacars_class->get_cars($filters);
//arraylist($carlist);
//echo($carlist['query']);
?>
<?php $Form_Class->selectbox('rsz',$carlist['datas'],$typ=array('value'=>'rendszam','name'=>'vrendszam'),$get["rsz"],$caption="")
?>
<input name="" type="submit" />
</form>
<?php //arraylist($backdatas);?>
<trip>
<?php foreach ($backdatas as $row){?>
<?php if ($aktdd!=$row["E"]["datum"]){
	$aktdd=$row["E"]["datum"];?>
<date class="col-xs-12 date"><?=$aktdd;?></date>
<?php }?>
<row class="col-xs-12 rowdata">
<?php $irany="E";?>
<start class="col-sm-5 col-xs-6">
<ido class="col-sm-4 col-xs-12"><?=$row[$irany]["ido"];?></ido>
<adress class="col-sm-8 col-xs-12"><?=$row[$irany]["addres"];?></adress>
<lat class="col-sm-6"><?=$row[$irany]['lat'];?></lat>
<lng class="col-sm-6"><?=$row[$irany]['lng'];?></lng>
</start>
<?php $irany="F";?>
<stop class="col-sm-5 col-xs-6">
<ido class="col-sm-4 col-xs-12"><?=$row[$irany]["ido"];?></ido>
<adress class="col-sm-8 col-xs-12"><?=$row[$irany]["addres"];?></adress>
<lat class="col-sm-6"><?=$row[$irany]['lat'];?></lat>
<lng class="col-sm-6"><?=$row[$irany]['lng'];?></lng>
</stop>
<disance class="col-sm-2 col-xs-12">
<?= $Sys_Class->mround($row["disance"],2);?> Km
</disance>
</row>
<?php } ?>
</trip>

</div>