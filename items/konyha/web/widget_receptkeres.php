<?php
$recstatus['all']=$lan["all"];
$recstatus+=$rec_class->status();
?>
<searchrecipe class="pagefull" > 
<form id="receptkeres" method="get">
<h3><?= $lan['recipe'];?> <?= $lan['search'];?>:</h3><br />
<?php $Form_Class->textbox("s",$_GET["s"],$lan['search'],'');?>

<?php $Form_Class->textbox("not",$_GET["not"],$lan['nelegyen'],'');?>

<div>

<div class="freeselect">
<?php $Form_Class->hiddenbox("q",$_GET["q"]);?>
<?php $Form_Class->checkbox("diab",$_GET["diab"],$lan['diab'],'diab');?>
<?php $Form_Class->checkbox("gluten",$_GET["gluten"],$lan['gluten'],'gluten');?>
<?php $Form_Class->checkbox("lactose",$_GET["lactose"],$lan['lactose'],'lactose');?>
</div>
</div>

<?php if($auser['jog']>3){?>
<div>
<?php $Form_Class->selectboxeasy("status",$recstatus,$_GET["status"],$lan["status"],$class="form-control");?>
</div>

<?php }?>
<input name="" type="submit"  value="<?php echo $lan["search"];?>" class="btn"/>
</form>
</searchrecipe>
<div class="clear"></div> 
