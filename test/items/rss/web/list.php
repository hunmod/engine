<style>
article{
	height:250px;
	overflow:hidden;
}

</style>
<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php";

foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
<rsslist class="col-md-9 col-sm-8" itemscope="" itemtype="http://schema.org/WebPage">
<?php

$eszkozokmezokx=$eszkozok[0];


	//arraylist($eszkozokmezok);
	//echo $qeszkoztipus;

//megjelenites
?>

<h3><?php echo $thmenu["nev"];?></h3>	
<?php if ($auser["jogid"]>=3){ ?>
<a href="<?php echo $separator.$getparams[0]."/"."csop_list/".$getparams[2];?>" class="btn btn-success">RSSchanel<?php echo $lan["list"];?></a>
<?php
}
?>


<div class="clear" ></div>


<?php
foreach ($rssdatas as $egyeszkoz){
	$egyeszkoz["url"]= $homeurl.$separator.$getparams[0].'/item/'.$Text_Class->htmlfromchars($Text_Class->to_link($egyeszkoz["title"])).'/'.$egyeszkoz["id"];
?>
<article class="col-md-4 col-sm-6">

<a href="<?php echo ($egyeszkoz["url"]);?>" itemprop="url"><h2 itemprop="name">
<?php 
//arraylist($egyeszkoz);
echo ($egyeszkoz["title"]);?>
</h2></a>
<description itemprop="description"><?php echo $Text_Class->levag($Text_Class->tageketlevesz($Text_Class->htmlfromchars($egyeszkoz["description"])), 500);?></description>

<?php
/*foreach ($eszkozokmezok as $ertek){
	$ertek=formelement_tipe_show($ertek);		
		if ($ertek!=""){
		?>
		<?php echo formelement_tipe_convert($ertek,$ertek["name"]);?><br />
        <?php echo formelement_tipe_convert($ertek,$egyeszkoz[$ertek["name"]]);?><br />
<br />
		<?php
		}
	}*/
?>
<?php if ($auser["jogid"]>=3){ ?>
	<a href="<?php echo $separator.$getparams[0]."/"."edit/".$egyeszkoz["id"];?>">edit</a><br />
<?php } ?>
<br />
</article>
<?php
}
?>
</rsslist>
                        <nav class="text-center">
                          <ul class="pagination">
                            <li>
                                <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=0".$addoldalazoparam; ?>" aria-label="First">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".($oldal-1).$addoldalazoparam; ?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>
<?php
for ($c=$start;$c<=$end;$c++){
		$selc='';
		if ($oldal==$c)$selc='class="active"';?>
        <li><a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".$c.$addoldalazoparam; ?>" <?php echo $selc;?>><?php echo $c+1;?></a></li>
<?php }?>
                            <li>
                              <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".($oldal+1).$addoldalazoparam; ?>" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                              </a>
                            </li>
                            <li>
                                <a href="<?php echo $homeurl.$separator.$_GET["q"].$separator2."page=".($oldalakszama-1).$addoldalazoparam; ?>" aria-label="Last">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                          </ul>
                    </nav>   
</div>