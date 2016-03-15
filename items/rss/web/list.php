<style>
rssarticle{
	height:250px;
	overflow:hidden;
}
h2{
    font-size: 18px;
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
foreach ($rssdatas as $egyrssdata){
	$egyrssdata["url"]= $homeurl.$separator.$getparams[0].'/item/'.$Text_Class->htmlfromchars($Text_Class->to_link($egyrssdata["title"])).'/'.$egyrssdata["id"];
include('items/rss/web/rssarticle1.php');
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