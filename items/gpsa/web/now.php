<style>
triplist{
        display:  table;
        width:49%;
		float:left;
}
triplist row:nth-child(2n+1){
background:#CCC;
}
triplist row_head,
triplist row{
	display: table-row;
	width:auto;	
	border:1px solid  #666666;
	cursor:pointer;
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
#map{
	display:inline-block;
height:400px;
        width:100%;
		float:left;	
}
span{
cursor:pointer;	
}
</style>
<?php
$carlist=$gpsacars_class->get_cars($filters);
?>

<div class="container">
<div class="col-xs-2">
<ul>
<?php foreach($carlist['datas'] as $car){?>
<li onclick="rszch('<?=$car['rendszam'];?>');"><?=$car['vrendszam'];?></li>
<?php } ?>
</ul>
</div>
<div class="col-xs-10">
<div id="map"></div>
</div>    
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= $gps_class->getapikey();?>&callback=initMap" async defer>
</script>
<script type="text/javascript">
function myTimer() {
    setTimeout(myTimer, 8000);
	getcardata();
}
var rsz="867948017577984";
myTimer();
</script>