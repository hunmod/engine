<h2>Megrendelések</h2>
<table class="order" width="100%">
<?php
$counter=1;
if (count($orderlistlemek)>0){
	foreach($orderlistlemek as $egyelem)
	{
		$order_articles=array();
		$order_articles=json_decode(htmlfromchars($egyelem["articles"]), true);
		$tblclass="row1";
		if ($counter % 2 == 0) {$tblclass="row2";}
		
?>
    <tr class="<?php echo $tblclass;?>">
        <td><?php 
	$mappa=$folders["uploads"]."shop/".$egyelem["id"];
	$img=randomimgtofldr("uploads/".$mappa);
	if ($img!="none"){
	$img="uploads/picture.php?picture=".encode($mappa."/".$img)."&y=100&ext=.jpg";
	}
	else{
	$img=$homefolder."/uploads/".$defaultimg;
	}
?>
			<img src="<?php echo imgtobase64("http://".$domain."/".$img);?>" alt="<?php echo $elem["cim"];?>" title="<?php echo $elem["cim"];?>" height="100" itemprop="image"  />
        </td>    
        <td>
              <a href="<?php echo $separator.$getparams[0]."/order_edit/".encode($egyelem["id"]);?>"><?php echo $egyelem["name"];?></a>
        </td> 
        <td>
              <?php echo $egyelem["order_date"];?>
        </td>
        <td>
              <?php echo $egyelem["zip"];?>
        </td>  
        <td width="100px;">
              <?php echo $egyelem["city"];?>
        </td>    
        <td >
                       <?php echo($order_articles["summa"]["end_priece"]);?>
        </td>           
        <td >
                       <?php echo($egyelem["address"]);?>
        </td>           
        <td >
<?php echo $order_satus[$egyelem['pstatus']]["nev"];?>        </td>
        
        <td width="100px;">
        </td>
    </tr>             
<?php $counter++;}?>
<?php }?>
</table>