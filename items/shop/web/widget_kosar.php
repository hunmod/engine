<shop>
<h1>Kosár</h1>
<?php
$kosar=array();
$kosar=$_SESSION["kosaram"]["elem"];
if (count($kosar)>0){
	foreach($kosar as $id=>$value)
	{

        $filterskob["id"]=$id;
        $segyelem=$ShopClass->get($filterskob,$order='',$page='all');
        $segyelem1=$ShopClass->get_text('hu',$filterskob) ;
        //arraylist($segyelem1);
	$egyelem=$segyelem['datas'][0];
	$egyelem["cim"]=$segyelem1['datas'][0]['title'];
?>
<?php echo $egyelem["cim"]; ?><br />
<?php echo " (".$value."db) "; ?>
 <?php echo (($egyelem["priece"]+$egyelem["priece"]/100*$egyelem["vat"])*$value);?> Ft

        <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=add">+</a>
        <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=neg">-</a><br />
        
<?php
	//arraylist($egyelem);
	$egyelem=array();
	}
}
?>
     <a href="<?php echo $separator."shop/order/";?>">Megrendelés</a>
</shop>