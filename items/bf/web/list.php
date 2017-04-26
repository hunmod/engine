<style>
.mhbl2{
height: 420px;	
}
.mhbl2 h2{
font-size:23px;
}

</style>
<?php
foreach ($_GET as $nam=>$req ) {
    if ($nam != 'PHPSESSID' && $nam != 'q' && $nam != 'CKFinder_Path' && $nam != 'googtrans' && $nam != 'oldal' && $nam != 'cpsession' && $nam != 'langedit' && $nam != 'lang' && $nam != 'cprelogin' && $nam != 'cats'&& $nam != 'page' && $nam != 'mr')
    {
        if ($myparams){
            $myparams.='&';
        }else{
            $myparams.='?';

        }

        $myparams.=$nam.'='.$req;
    }
}
if(is_array($_GET["cats"])){
    foreach ($_GET["cats"] as $gcname=>$gcval){
        if ($myparams){
            $myparams.='&';
        }else{
            $myparams.='?';

        }

        $myparams.="cats[".$gcname.']='.$gcval;

    }

}

if ($myparams){
    $myparams.='&';
}else{
    $myparams.='?';

}
$myparams='/bf/list'.$myparams;

?>
<div class="container">
            <!--div id="breadCrumb">
                <a href="<?php echo $homeurl;?>">Home</a> / 
 				<?php //echo $menu["nev"];
                ?>
                <span><strong><?php echo $breadtext;?></strong></span>
                <?php
               if ($auser["jog"]>2){
				?>
                <a href="<?php echo $homeurl.$separator;?>hirek/edittext">Új hír</a>
                <?php }?>
            </div-->


    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span> <?= lan('search');?>
                    </div>
                </div>
                <div class="widget-body">
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <?php //$form->hiddenbox('q',$_GET["q"]);?>
                            <?php $FormClass->textbox('s',$_REQUEST["s"],lan('name'),"sr-only");?>
                        </div>
                        <div class="form-group">
                            <?php
                            /*$Form_Class->selectbox2("varos",$citys['datas'],array('value'=>'city_id','name'=>'city_name'),$adat["varos"],"Város");*/
                            $FormClass->textbox('citytxt',$_REQUEST["citytxt"],lan('city'),'hidden');

                            ?>
                        </div>
                        <div class="inline">
                            <?php
                          //  arraylist($bfallcat);
                            foreach($bfallcat['datas'] as $onecat){?>
                                <?php

                                $cats=$_REQUEST["cats"];
                                $cval=0;
                                foreach($cats as $onecatx=>$catyy){
                        if($onecatx==$onecat['id']){
                        $cval=1;
                        }
                        }
                        $FormClass->checkbox('cats['.$onecat['id'].']', $cval, $onecat['nev'], $class = "checkbox-inline");?>

                        <?php } ?>

                     <?php  $FormClass->checkbox('pos', $_REQUEST["pos"], lan('pos'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('wifi', $_REQUEST["wifi"], lan('wifi'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('bringa', $_REQUEST["bringa"], lan('bringa'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('dohanyzo', $_REQUEST["dohanyzo"], lan('dohanyzo'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('sport', $_REQUEST["sport"], lan('sport'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('allat', $_REQUEST["allat"], lan('allat'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('roki', $_REQUEST["roki"], lan('roki'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('konyha', $_REQUEST["konyha"], lan('konyha'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('medence', $_REQUEST["medence"], lan('medence'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('gyerek', $_REQUEST["gyerek"], lan('gyerek'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('specdieta', $_REQUEST["specdieta"], lan('specdieta'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('szepkartya', $_REQUEST["szepkartya"], lan('szepkartya'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('erzsebetkartya', $_REQUEST["erzsebetkartya"], lan('erzsebetkartya'), $class = "checkbox-inline");?>
                     <?php  $FormClass->checkbox('telen', $_REQUEST["telen"], lan('telen'), $class = "checkbox-inline");?>



                </div>
                <button type="submit" class="btn btn-success" data-original-title=""><?= lan('search');?></button>
                </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">



<locatipns itemscope="" itemtype="http://schema.org/WebPage">
<?php //echo $qhir["query"];?>
<div>
                <h1>
				<?php echo $menu["nev"];
				$c=1;
                if(count($menufelette))foreach(array_reverse($menufelette) as $mef){
					
					if ($c!=1){$xclass='class="zold"';}
					else {$xclass='';}
					if ($c<count($menufelette)){$xper=' / ';}
					else {$xper='';}
					$c++;
				if ($c>2){	
                ?>
                <span <?php echo $xclass;?>><?php echo $mef["nev"];?></span><?php echo $xper;?>
                <?php
                	}
                }
				?>
                </h1>
				 <?php
               if ($auser["jog"]>2){
				?>
                <a href="<?php echo $homeurl.$separator;?>bf/edittext"><?= lan('ujhir');?></a>
                <?php }?>

</div>
		  <?php 
//arraylist($hirekelemek);
if ($hirekelemek){
foreach($hirekelemek as $elem){
  /*  $citydata=$Location_Class->get_city(array('id'=>$elem["varos"]));
    $elem["varos_nev"]=$citydata['datas'][0]["city_name"];*/
    $elem["url"]=$bf_class->createurl($elem);
		include('items/bf/web/display_2.php');
	
}}
?>
    <div class="clearfix"></div>
<?php if ($oldalakszama>1){
//oldalazó	?>
                        <nav class="text-center">
                          <ul class="pagination">
                            <li>
                                <a href="<?php echo $homeurl.$myparams."page=0"; ?>" aria-label="First">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $homeurl.$myparams."page=".($oldal-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                </a>
                            </li>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><li><a href="<?php echo $homeurl.$myparams."page=".$c; ?>"><?php echo $c+1;?></a></li>
	<?php	}
	?>
                            <!--li class="active"><a href="#">2</a></li-->

                            <li>
                              <a href="<?php echo $homeurl.$myparams."page=".($oldal+1); ?>" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                              </a>
                            </li>
                            <li>
                                <a href="<?php echo $homeurl.$myparams."&page=".($oldalakszama-1); ?>" aria-label="Last">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                          </ul>
                    </nav>
<?php	
//oldalazó
}?>
</locatipns>



                    


                <div class="text-center horizBanner">
                <?php 
                $adsfilter["pos"]=$pos3;
                $adsfilter["adid"]=$adspos[$adsfilter["pos"]]['sizes'];
                //include('items/ads/web/widget_side1.php');?>                  
                </div>





                    </div>

</div>
<script>
    $(function() {
        $('location').matchHeight();
    });
</script>
<!--div>
<?php
if ($getparams[2]>0 && $auser["jogid"]>3){
	//arraylist($getparams);
//include_once("./items/files/web/list.php");	
}
?>
</div>
<div class="clear"></div>


<div class="col-md-3 col-sm-6">
                        <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/hir/".($elem["id"]);?>" class="box matchHeight zold" style="height: 328px;">
                            <h2>How To's</h2>
                            <div class="imgWrap">
                                <img src="<?php echo $Text_Class->htmlfromchars($elem["image"]);?>">
                            </div>
                            <div class="upArrowDecor"></div>
                            <h3><?php echo $Text_Class->htmlfromchars($elem["cim"]);?></h3>
                            
                            <p><?php echo $Text_Class->htmlfromchars($elem["hir"]);?></p>
                        </a>
                        

                    </div>




</div-->
