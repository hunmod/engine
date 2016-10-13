<style>
input:invalid { 
background:#FFE8E9;
}


::-webkit-validation-bubble{
}

::-webkit-validation-bubble-arrow-clipper {
}

::-webkit-validation-bubble-arrow {
}

::-webkit-validation-bubble-message{
}

input::error { appearance: balloon; }

/*
input:invalid ~ span:after { content: attr(title); color: red; margin-left: 0.6rem; }*/

</style>
<shop>
<h1>Megrendelés</h1>
<table class="order">
    <tr>
        <td>
        </td>   
        <td>
        Név
        </td>        
        <td>
        Darab
        </td>
        <td>
        Egységár
        </td>                
        <td>
        Netto
        </td>        
        <td>
        Áfa
        </td>
        <td>
        Brutto
        </td>        
     </td>
<?php
if (count($kosar)>0){
	foreach($kosar_db as $egyelem)
	{
?>
    <tr>
        <td width="30%">
<?php 
	$mappa=$folders["uploads"]."shop/".$egyelem["id"];
	$img=randomimgtofldr("uploads/".$mappa);
	if ($img!="none"){
	$img=$homefolder."uploads/picture.php?picture=".encode($mappa."/".$img)."&y=100&ext=.jpg";
	}
	else{
	$img=$homefolder."/uploads/".$defaultimg;
	}
?><img src="<?php echo imgtobase64("http://".$domain."/".$img);?>" alt="<?php echo $egyelem["cim"];?>" title="<?php echo $egyelem["cim"];?>" height="100" itemprop="image" width="100px" />        </td>    
        <td width="30%">
	        <?php echo $egyelem["cim"]; ?>
        </td>
        <td>
	        <?php echo " (".$egyelem["db"]."db) "; ?>
        </td>
        <td>
	        <?php echo $egyelem["ar"]." Ft"; ?>
        </td>
        <td>
	        <?php echo $egyelem["sum"]." Ft"; ?>
        </td>
        <td>
	        <?php echo $egyelem["vat"]."%"; ?>
        </td> 
        <td>
	        <?php echo $egyelem["endpriece"]." Ft"; ?>
        </td>        
        <td>
            <?php if ($egyelem["id"]!="post"){?>
             <a href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=add">+</a>
            <?php } ?> 
        </td>
        <td>
            <?php if ($egyelem["id"]!="post"){?>
              <a href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$egyelem["id"];?>&p=neg">-</a>
            <?php } ?> 
        </td>
    </tr>
<?php
	//arraylist($egyelem);
	}
}
?>
    <tr>
        <td>Összesen:</td>
		<td><?php echo $shoppingcart['summa']["articles_num"] ?> tétel</td>
    </tr>
    <tr>
        <td></td>
		<td>Netto</td>
        <td><?php echo $shoppingcart['summa']["end_priece"] ?> Ft</td>
    </tr>
    <tr>
        <td></td>
		<td>Brutto</td>        
                <td><?php echo $shoppingcart['summa']["end_priece_vat"] ?> Ft</td>
	</tr>
    <tr>
        <td></td>
		<td>Áfa érték</td>
                                <td><?php echo $shoppingcart['summa']["vat_sum"] ?> Ft</td>
    </tr> 
    <tr>
        <td></td>
		<td>Kerekítés</td>
                                <td><?php echo $shoppingcart['summa']["round"] ?> Ft</td>
    </tr>        
    
</table>

<form method="post" action="?q=shop/order/">
Megrendelő adatai:<br />
<?php hiddenbox('order',"ok");?>
<?php textboxhtml5('name',$orderdata["name"],"",$req="y",'Név')?><br />
<?php textboxhtml5('phone',$orderdata["phone"],"tel",$req="y",'Tel.')?><br />
<?php textboxhtml5('email',$orderdata["email"],"email",$req="y",'email')?><span title="Must be at least two letters, no numbers"></span>
<br />
Megrendelő elérhetősége:<br />
<?php textboxhtml5('country',$orderdata["country"],"",$req="y",'country')?><br />

<?php textboxhtml5('zip',$orderdata["zip"],"number",$req="y",'zip')?><br />

<?php textboxhtml5('city',$orderdata["city"],"",$req="y",'city')?><br />
<?php textboxhtml5('address',$orderdata["address"],"",$req="y",'address')?><br />

Számlázási adatok:<br />
(nem kötelező megadni)
<?php textboxhtml5('pname',$orderdata["pname"],"",$req="n",'Számla név')?><br />
<?php textbox('pcountry',$orderdata["pcountry"],'country')?><br />
<?php numbox('pzip',$orderdata["pzip"],'zip')?><br />
<?php textbox('pcity',$orderdata["pcity"],'city')?><br />
<?php textboxhtml5('paddress',$orderdata["paddress"],"",$req="n",'address')?>
<?php textboxhtml5('pvatno',$orderdata["pvatno"],"",$req="n",'Adószám')?>
<br />
Fizetési mód:<br />
<?php selectbox_roll("pmod",$paymod,$paymod_typ,$orderdata["pmod"])?>
Átvétel:<br />
<?php selectbox_roll("post_mod",$post_mod,$paymod_typ,$orderdata["post_mod"])?>

Megjegyzés:<br />
<?php textaera('subject',$orderdata["subject"],'subject')?><br />

<input name="update" type="submit" value="frissít" />
<input name="ordok" type="submit" value="megrendelem" />
</form>
</shop>