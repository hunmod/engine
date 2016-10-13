<shop>
<h1>Kosár</h1>
<?php
$kosar=array();
$kosar=$_SESSION["kosaram"]["elem"];
if (count($kosar)>0){
	foreach($kosar as $id=>$value)
	{
	$segyelem=egy_shop($id);
	$egyelem=$segyelem;
?>
<?php echo $egyelem["cim"]; ?><br />
<?php echo " (".$value."db) "; ?>
 <?php echo (($egyelem["ar"]+$egyelem["ar"]/100*$egyelem["vat"])*$value);?> Ft

        <a href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=add">+</a>
        <a href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=neg">-</a><br />
        
<?php
	//arraylist($egyelem);
	$egyelem=array();
	}
}
?>
     <a href="<?php echo $separator."shop/order/";?>">Megrendelés</a>
</shop>