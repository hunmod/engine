<style>
menulist egymenu{
display:block;
float:left;
width:100%;
height:200px;
overflow:hidden;
text-align:center;
}

menulist egymenu picture{
display:block;
/*float:left;*/
margin-right:10px;
}
menulist egymenu destripction{
display:block;
height:100%;
/*float:left;*/
text-align:center;
}

 

</style>
<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
<menulist class="col-md-9 col-sm-8" itemscope itemtype="http://schema.org/BreadcrumbList">

<?php if ($auser["jogid"]>=10){?>

	<a href="<?php echo $separator.$getparams[0]."/edittext";?>" class="button">Hír küldése</a><br />
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
//arraylist($hirekelemek);
if (count($hirekelemek)>0){
foreach($hirekelemek as $elem){
?>
<egymenu class="col-sm-4" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<a href="<?php echo $kezdooldal.$separator.$elem["modul"]."/".$elem["file"]."/".($elem["this"]);?>" itemprop="item">
	<h2 itemprop="name"><?php echo $Text_Class->htmlfromchars($elem["nev"]);?></h2>
<picture class="imgWrap">
<img src="<?php echo $Text_Class->htmlfromchars($elem["image"]);?>" itemprop="image"/> 
</picture>    
<destripction class="border1 bgcolor1">
	<?php echo $Text_Class->youtoubecserel($Text_Class->htmlfromchars($elem["leiras"]));?>
<div class="clear"></div>
</destripction></a>
	<?php 
	if (($auser["jogid"]>=3) || ($auser["id"]==$elem["uid"])){?>
    <br />
	<a href="<?php echo $kezdooldal.$separator.$getparams[0]."/menu_edit/".base64_encode ($elem["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a>
    <?php }?>
</egymenu>
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
</menulist>
<div class="clear"></div>
</div>