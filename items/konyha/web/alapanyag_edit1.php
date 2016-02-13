<!-- Row start -->
<div class="container">  
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span><?php echo $lan["alapanyag"];?> <?php echo $lan["edit"];?><br />
                </div>
              </div>
                <div id="dt_example" class="example_alt_pagination">

<form id="edit_form" method="post">
<?php 	$Form_Class->hiddenbox('id',$dbadat['id']); ?>
<?php
?>
<?php $Form_Class->selectbox("mid",$acsopq,array('value'=>'id','name'=>'name'),$dbadat['mid'],"Alapanyagcsoport");?> 
<?php $Form_Class->textbox('nev',$dbadat['nev'],$lan["nev"],null,null);?>  
<?php $Form_Class->textbox('nev_de',$dbadat['nev_de'],$lan["nev"]." (DE)",null,null);?>  
<?php $Form_Class->textbox('nev_en',$dbadat['nev_en'],$lan["nev"]." (EN)",null,null);?>  
<?php $Form_Class->numbox('menny',$dbadat["menny"],$lan["menny"]); ?>
<div class="clear"></div>
<?php $Form_Class->textbox('mertekegyseg',$dbadat["mertekegyseg"],$lan["mertekegyseg"]); ?>
<?php $Form_Class->textbox('energia',$dbadat['energia'],$lan["energia"],null,null);?> 
<?php $Form_Class->textbox('kaloria',$dbadat['kaloria'],$lan["kaloria"],null,null);?> 
<?php $Form_Class->textbox('szenhidrat',$dbadat['szenhidrat'],$lan["szenhidrat"],null,null);?> 
<?php $Form_Class->textbox('feherje',$dbadat['feherje'],$lan["feherje"],null,null);?> 
<?php $Form_Class->textbox('zsir',$dbadat['zsir'],$lan["zsir"],null,null);?>  
<?php $Form_Class->textbox('rost',$dbadat['rost'],$lan["rost"],null,null);?>  
<?php $Form_Class->textbox('koleszterin',$dbadat['koleszterin'],$lan["koleszterin"],null,null);?>  
<div class="clear"></div>
<?php if ($auser["jog"]>3){?>
<?php $Form_Class->numbox('oid',$dbadat['oid'],"originalid");?>  
<?php $Form_Class->textbox('source',$dbadat['source'],"source",null,null);?>  
<?php } ?>
<div class="clear"></div>
	<?php $Form_Class->kcebox('hir_id',$dbadat['hir_id'],$lan["text"],"minimal");?> 
	<?php $Form_Class->hiddenbox('uid',$dbadat['uid'],"uid");?> 
<div class="col-md-12">     
<?php $Form_Class->checkbox("diab",$dbadat["diab"],$lan["diab"],'diab');?>
<?php $Form_Class->checkbox("gluten",$dbadat["gluten"],$lan["gluten"],'gluten');?>
<?php $Form_Class->checkbox("lactose",$dbadat["lactose"],$lan["lactose"],'lactose');?>
<div class="clear"></div>
<?php if ($auser["jog"]>3){
$Form_Class->selectbox("status",$status,array('value'=>'id','name'=>'nev'),$dbadat['status'],$lan["status"]);
}
else{
$Form_Class->hiddenbox('status',$dbadat['status']);	
}
?>

</div>
  <input name="smbt" type="submit" value="<?php echo $lan["save"] ?>" />
</form>
</div>
</div>
</div>
</div>
</div>
