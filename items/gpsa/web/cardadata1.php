<style>
.triplistcontainer{
        max-height:600px;
		overflow-y:scroll;
		padding:0;

}
triplist{
        display:table;
        width:100%;
		float:left;
}
triplist row:nth-child(2n+2){
background:#CCC;
}
triplist row_head,
triplist row{
	display: table-row;
	width:auto;	
	border:1px solid  #666666;
	cursor:pointer;
	position:relative;
}
triplist row:hover{
background:#D2D2D2SSS;
}
triplist row_head{
font-weight:bold;	
}
triplist .cell
{
	width:auto;
  	display: table-cell;   
	border: 1px solid #999999;  
}
triplist ido,
triplist status{
max-width:100px;
}
triplist lng,
triplist lat{
max-width:80px!important;
}
triplist address{
}
#map{
width:100%;
height:400px;
float:left;	
}

</style>
<script type="text/javascript">
	var poliline=[];
	$(document).on('click', 'row' , function() {

	var zoomlevel=map.getZoom();
	var latx =$(this).children("lng").html();
	var lngx =$(this).children("lat").html();
	var addressx =$(this).children("address").html();  
	map.setCenter(new google.maps.LatLng(latx,lngx));
	map.setZoom(zoomlevel);

	clearmarkers();
	makemarker(latx,lngx);
//	console.log(markers); 
});
</script>

<div class="container">
<form method="get">
<?php
$carlist=$gpsacars_class->get_cars($filters);
?>
<form action="" method="get">
<?php $Form_Class->selectbox('rsz',$carlist['datas'],$typ=array('value'=>'rendszam','name'=>'vrendszam'),$get["rsz"],"Rendszám")
?>
Tól:<?php 
$Form_Class->datetimebox('tol',$get["tol"],$format='yy-mm-dd',$caption='Tól');
?>
Ig:<?php 
$Form_Class->datetimebox('ig',$get["ig"],$format='yy-mm-dd',$caption='Ig');
?>
<input name="" type="submit" />
</form>
<h2>Auto adatai</h2>
<div class="col-sm-6 triplistcontainer">
<triplist>
<row_head>
<lng class="cell"><?=$lan["lng"];?></lng>
<lat class="cell"><?=$lan["lat"];?></lat>
<ido class="cell"><?=$lan["datum"];?></ido>
<status class="cell"><?=$lan["status"];?></status>
<address class="cell"><?=$lan["adress"];?></address>

</row_head>
<?php
foreach ($backdatas as $row){
?>
<row alt="<?=$row["addres"];?>">
<lng class="cell"><?=$row["lng"];?></lng>
<lat class="cell"><?=$row["lat"];?></lat>
<ido class="cell"><?=$row["datum"];?> <?=$row["ido"];?></ido>
<!--fuel class="cell"><?=hexdec ($row["benzszint"]);?></fuel-->
<status class="cell"><?=$allstatus[$row["statusz"]];?></status>
<address class="cell"><?=$row["addres"];?></address>
	<?php if ($row["statusz"]=="E"){?>
<script>
	 poliline[poliline.length]= {lat:<?=$row["lng"];?>,lng:<?=$row["lat"];?>};
</script>
	<?php }?>
</row>
<?php	
}
?>
	<script>
		//console.log(poliline);
	</script>
</triplist>
</div>
<div class="col-sm-6">
	<div id="map"></div>
</div>
</div>   

<script src="https://maps.googleapis.com/maps/api/js?key=<?= $gps_class->getapikey();?>&callback=initMap" async defer>
</script>


<?php
//arraylist($datas);
?>
