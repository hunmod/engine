<div class="clear" ></div>
<shop>

<?php if ($auser["jog"]>=4){?>

	<a href="<?php echo $homeurl.'/'.$getparams[0]."/edittext";?>" class="button">Uj Termék</a><br />
<div style="clear">&nbsp;</div>

<?php }?>

<?php if ($oldalakszama>1){
//oldalazó	?>
  <div class="hszoldalazo">
   <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=0"; ?>"> |&lt; </a>
   <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal-1); ?>"> &lt; </a>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".$c; ?>"><?php echo $c+1;?></a><?php	}
	?><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal+1); ?>"> &gt;</a><a href="<?php echo $separator.$_GET["q"]."&oldal=".($oldalakszama-1); ?>">&gt;| </a>
	</div>
    
<div class="clear"></div>    
    <?php	
//oldalazó
}?>

<?php 
//arraylist($elemek);
if (count($elemek)>0){
foreach($elemek as $elem){
?>
<article class="col-sm-4">
     <topimage class="imgframe col-sm-12"><img class="img-responsive" src="<?php echo imgtobase64($elem["image"]);?>" alt="<?php echo $elem["title"];?>" title="<?php echo $elem["title"];?>" height="100" itemprop="image"  /></topimage>
    <a href="<?php echo $homeurl.$separator.$getparams[0]."/shop/".($elem["id"]);?>">

    <endpriece><?php echo priece_format(($elem["priece"]+$elem["priece"]/100*$elem["vat"]),0);?> Ft</endpriece>
<?php if ($eurhuf>0){?>
   (<priece><?php echo priece_format($elem["priece"]/$eurhuf,2);?> &#8364;</priece> )<br />
<?php }?>

    <?php if ($elem["priece_old"]>$elem["priece"]){?>
    <action><?php echo percentage($elem["priece"], $elem["priece_old"], 0);?> %</action>
    <oldpriece><?php echo priece_format($elem["priece_old"],0);?> Ft</oldpriece><br />
    <?php } ?>
    <priece><?php echo priece_format($elem["priece"],0);?> Ft</priece>
    <vat>+<?php echo $Text_Class->htmlfromchars($elem["vat"]);?>% ÁFA</vat><br />
    
    <?php echo $storage_satus[$elem["storage_status"]]["nev"];?>
<?php if ($elem["storage_status"]==3){?> <br /><?php echo $elem["ordertime"];?> nap<?php }?>
    <div class="actions">
		<ul>
        <?php if ($elem["storage_status"]!=5){?>
        <li>
       	 <a class="buy" href="<?php echo $separator.$_GET["q"].$separator2."kosarba=".$elem["id"];?>&p=add">&nbsp;</a>
        </li>
        <?php } ?>        
        <li>
       	 <a class="facebookicon35" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $homeurl.$separator.$getparams[0]."/shop/".($elem["id"]);?>" target="_blank"></a>
        </li>  
		<?php 
        if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){?>
        <li>
       	 <a href="<?php echo $homeurl.$separator.$getparams[0]."/edittext/".base64_encode ($elem["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()" ><?php echo $buttons["edit"];?></a>
        </li>      
        <?php }?>
        </ul>
	</div>
<div class="clear"></div>
	<name><?php echo $Text_Class->htmlfromchars($elem["title"]);?></name>
	<description><?php echo ($Text_Class->htmlfromchars($elem["leadtext"]));?></description></a>
<div class="clear"></div>
</article>
<?php
}
}
?>
<?php if ($oldalakszama>1){
//oldalazó	?>
<div class="clear"></div>
  <div class="hszoldalazo">
   <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=0"; ?>"> |&lt; </a>
   <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal-1); ?>"> &lt; </a>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".$c; ?>"><?php echo $c+1;?></a><?php	}
	?><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal+1); ?>"> &gt;</a><a href="<?php echo $separator.$_GET["q"]."&oldal=".($oldalakszama-1); ?>">&gt;| </a>
	</div>
    <?php	
//oldalazó
}?>
</shop>
<div class="clear"></div>
