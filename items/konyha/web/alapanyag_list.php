<script language="javascript" type="text/javascript">

function hozzavaloinfo(hvid){
		phpopenf3('service','q=konyha/alapanyag/'+hvid);
}
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
<style>
#searchform label{
display:none;	
}
</style>
<div class="container"> 
<div id="raceptalapanyag">
 
<section class="col-md-9 col-sm-8" >
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <h3><span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span> <?php echo $lan["search"];?></h3>
                </div>
              </div>
              <div class="widget-body">
<form id="searchform" method="get" enctype="application/x-www-form-urlencoded">
<?php 
	$typ["value"]="id";
	$typ["name"]="nev";
	$elem["typ"];
?>
<?php $Form_Class->hiddenbox("q",$_GET["q"]);?>

                  <div class="form-group col-sm-3">
					<?php $Form_Class->textbox('nev',$_GET["nev"],'nev',"sr-only");?>
                  </div>
                  <div class="form-group col-sm-5">
<?php $Form_Class->selectbox("mid",$acsopq,array('value'=>'id','name'=>'name'),$_GET['mid'],"Alapanyagcsoport");?> 
                  </div>
                  <button type="submit" class="btn btn-success" data-original-title=""><?= $lan["search"];?></button>
</form>
              </div>
            </div>
          </div>
</div> 
<?php if ($auser["id"]>0){?>
<a href="<?php echo $homeurl.$separator.$getparams[0]."/"."alapanyag_edit1";?>" class="btn btn-success"><?php echo $lan["ujalapanyag"];?></a>
<?php } ?>
<?php if ($auser["jog"]>2){?>
<a href="<?php echo $homeurl.$separator.$getparams[0]."/"."alapanyag_csop_list";?>" class="btn btn-success">Alapanyag csoportok</a>
<?php } ?>
<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <h1><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span><?php echo $lan["kaloriatablazat"];?></h1>
                </div>
              </div>
			</div>
            
              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination" itemprop="nutrition"
    itemscope itemtype="http://schema.org/NutritionInformation">
<table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
<thead>
<td class="tdhead"><strong><?php echo $lan["name"];?></strong></td>
<td class="tdhead"><strong><?php echo $lan["menny"];?></strong></td>
<td class="tdhead kaloria"><strong><?php echo $lan["kaloria_short"];?></strong></td>
<td class="tdhead szenhidrat" ><strong><?php echo $lan["szenhidrat_short"];?></strong></td>
<td class="tdhead feherje" ><strong><?php echo $lan["feherje_short"];?></strong></td>
<td class="tdhead zsir" ><strong><?php echo $lan["zsir_short"];?></strong></td>
<td class="tdhead rost" ><strong><?php echo $lan["rost_short"];?></strong></td>
<td class="tdhead" ><strong><?php echo $lan["allergen"];?></strong></td>
<?php if($auser["jog"]>3){?>
<td class="tdhead" ><strong><?php echo $lan["action"];?></strong></td>
<?php } ?>
<?php
/*foreach ($eszkozokmezok["mezok"] as $ertek){	
//$ertek=formelement_tipe_show($ertek);
if ($ertek!="" && $ertek["displaylist"]!="0"){?>
<td class="tdhead"><strong><?php echo $ertek["name"];?></strong></td>
<?php 
}
}*/
?>
</thead>
<?php
if ($lang!='hu')
$langadd='_'.$lang;


foreach ($alapanyaglist as $egyeszkoz){
?>
<tr class="gradeX">
<?php
/*	
foreach ($eszkozokmezok["mezok"] as $ertek){
//$ertek=formelement_tipe_show($ertek);		
if ($ertek!="" && $ertek["displaylist"]!="0"){?>
<td class="<?php echo $ertek["name"];?>"><?php echo $egyeszkoz[$ertek["id"]];?></td>
<?php
}
}*/
?>
<td><span itemprop="name"><?php echo $egyeszkoz["nev".$langadd];?></span>
        <?php if (($egyeszkoz["hir_id"]!='')&&($egyeszkoz["hir_id"]!='0')){?>
    	<a onclick="hozzavaloinfo('<?php echo encode($egyeszkoz["id"]);?>');" class="button miniinfo" > <?php echo $lan["adatlap"]; ?></a>
    <?php } ?>    
</td>
<td  itemprop="servingSize"><?php echo $egyeszkoz["menny"];?><?php echo $egyeszkoz["mertekegyseg"];?></td>
<td class="kaloria" itemprop="calories"><?php echo $egyeszkoz["kaloria"];?></td>
<td class="szenhidrat" itemprop="carbohydrateContent"><?php echo $egyeszkoz["szenhidrat"];?></td>
<td class="feherje" itemprop="proteinContent"><?php echo $egyeszkoz["feherje"];?></td>
<td class="zsir" itemprop="fatContent"><?php echo $egyeszkoz["zsir"];?></td>
<td class="rost" itemprop="fiberContent"><?php echo $egyeszkoz["rost"];?></td>
<td ><?php if ($egyeszkoz["gluten"]==1) echo "GF " ;
if ($egyeszkoz["lactose"]==1) echo "LF " ;
if ($egyeszkoz["diab"]==1) echo "D " ;
?></td>
<?php if($auser["jog"]>3){?>
<td><a href="<?php echo $homeurl.$separator.$getparams[0]."/"."alapanyag_edit1/".encode($egyeszkoz["id"]);?>">edit</a></td>
<?php } ?>
</tr>
<?php
}
?>
</table>
                  <div class="clearfix"></div>
				</div>
			</div>
		</div>
<?php if ($auser["id"]>0){?>
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
                                <a href="<?php echo $homeurl.$separator.$_GET["q"]."&page=".($oldalakszama-1).$addoldalazoparam; ?>" aria-label="Last">
                                    <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                          </ul>
                    </nav>
<?php } ?>
    <div class="attencion"><?= $lan["foot_info"];?></div>
</section>   
  <section class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </section> 
  </div>
    </div>