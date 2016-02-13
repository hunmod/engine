<form id="form1" name="form1" method="post" action="">
  <label for="lat">Lat</label>
  <input type="text" name="lat" id="lat" />
  <label for="lat">Long</label>  
  <input type="text" name="lng" id="lng" />
<input name="" type="submit" />
</form>
<?php
if ($_REQUEST["lat"]!="" && $_REQUEST["lng"]!="")
{
/*$lat="45.8421134";
$long="13.1394500";

$lat="45.8421134";
$long="13.1394500";

$lat="47.5347976";
$long="21.4962501";
*/
$garray=$gps_class->get_coords($_REQUEST["lat"],$_REQUEST["lng"]);
arraylist($garray);


//var_dump($gps_class->save_geocode($garray));




}
?>