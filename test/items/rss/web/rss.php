<?php if ($auser["jogid"]>=4){?>
<div class="tblbg1">
<a href="<?php echo $separator.$getparams[0]."/edittext";?>">Rss csatorna küldése</a><br />
</div>

<div class="tblbg2">
Rss csatornák:<br />
<?php foreach ($links as $elem){
?><?php echo $elem["nev"]?> <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/edittext/".base64_encode ($elem["id"]);?>" onmouseover="ddrivetip('szerkeszt')" onmouseout="hideddrivetip()"><?php echo $buttons["edit"];?></a><br />
<?php }?>
</div>
<?php }?>
<?php
$alink=$getparams[2];
if ($alink!=''){
$alink=base64_decode($alink);
//include_once("iframe.php");	
}
//arsort ($rssarray,5);
$maxrss=30;
if (count($rssarray)-1<$maxrss){$maxrss=count($rssarray)-1;}
//foreach ($rssarray as $chItem) {
	$chItem=$rssarray;
for ($i = 0; $i <= $maxrss; $i++) {
	?>
    <div class="egyelem">
    <div class="tblbg3">
<?php // echo $chItem["pubDate2"];?>
	<h2>
    <a href="showlink.php?url=<?php echo base64_encode ($chItem[$i]["link"]); ?>" target="_blank"><?php echo $chItem[$i]["title"];//substr($chItem["title"], 0, -1);?></a></h2>
	</div>
    <?php echo $chItem[$i]["description"];//substr($chItem["description"], 0, -1);?>
    <?php //echo print $chItem["category"];?>
	<?php // echo $chItem["pubDate"];?>
    <div class="torespont"></div>
	</div>
<?php }

?>