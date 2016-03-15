<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<style>
/*.keresett{
background-color:#3FF;	
}


.cim span,.osszegzes span{
	font-weight:bold;
	border-bottom:#F90 2px solid !important;	
	border-top:#F90 2px solid !important;	
}

.hszoldalazo {
margin-top:5px;
}
.hszoldalazo a {
padding-left:3px;
padding-right:3px;
}

.hszoldalazo .active{
border:1px solid #F90;
}*/
</style>
<script>
function chkbox_recept(modul){
	if (document.getElementById(modul).value<=0)
	{
		document.getElementById(modul).value='1';
		$("#icon"+modul).addClass(" selected");
		
	}
	else{
		$("#icon"+modul).removeClass(' selected').addClass('');
	
		document.getElementById(modul).value='0';
	}
	
}
</script> 


<div class="container"> 
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/konyha/web/widget_receptkeres.php";
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/ads/web/widget_side1.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php";

foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  
<section class="col-md-9 col-sm-8" >
<h1><?= $lan['recipe'];?></h1>
.<?php 
	$mappa="uploads/_".$oldalid."/".$getparams[0]."/".$kiemeltrecept["id"];
	$kiemeltimg=randomimgtofldr($mappa);
	if ($kiemeltimg!="none"){
		$kiemeltimg="uploads/picture.php?picture=".encode("_".$oldalid."/".$getparams[0]."/".$kiemeltrecept["id"]."/".$kiemeltimg)."&x=500";
	}else{
		$kiemeltimg="uploads/".$defaultimg;
	}
?>

<?php 
$recip=$kiemeltrecept;

include("recipe_box2.php");

if ($_GET["q"]=='konyha/list/72'){
	$_GET["q"]='konyha';
	}
?>

<div class="clear"></div>
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
<?php	
//oldalazó
?>



<recipes>
<?php if ($auser["id"]>0){ ?>
<recipe class="col-lg-3 col-md-4 col-sm-6 addrecipe">
<a href="<?php echo $homeurl.$separator.$getparams[0]."/edit";?>">
    <div class="imgframe bgcolor0">
	    <img src="<?php echo ($homeurl."/uploads/".$defaultimg);?>" />
    </div>
    <h2><?php echo $lan['ujrecept'];?></h2>
    <div class="clear"></div>  
    <div class="text bgcolor1 border1">
        <?php echo $lan['ujreceptclick'];?>
    </div>
    <div class="tabla">
    </div>
     </a>
</recipe>
<?php }?>
<?php
//arraylist($dbadat);
if($dbadat)foreach ($dbadat as $recip){
include("recipe_box1.php");
}
?>
</recipes>
    <div class="clear" style="clear:both"></div> 

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
</section>   
 
</div>  
    <div class="clear"></div> 

 <section class="container">  
<?php
//$ADS_list=(random_ads_by_group('1,13',1));
if (count($ADS_list)>=1){
	foreach ($ADS_list as $elem){
		//print_ads($elem);		
	}
}
?>  
 
    <div class="attencion"><?= $lan["foot_info"];?></div>
</section>
</div> 

 