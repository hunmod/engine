<h3><?= $lan['kategoriak'];?></h3>
<nav class="veritcalmenu">
<?php 
	$almenuq=$MenuClass->get_menus_down(69,'','') ;
	$wenu=$almenuq;
	$MenuClass->printmenu2($wenu,2);
?>
</nav>
<div class="clear"></div> 
