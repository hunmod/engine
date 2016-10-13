<script>

</script>
<style>

</style>
<div class="container">
<div class="col-sm-12">
<?php 
$form=new formobjects();
$status=$class_termekek->status();
$sorrend=$class_termekek->sorrend();
$class_termekek->create_tbl();
$form=new formobjects();

$UploadClass=new file_upload();

if ($_POST['hirsave']=='1'){
$hirid=$class_termekek->save($_POST); 
$_POST["id"]=$hirid;
//$class_termekek->save_ad_tags_field($_POST);
//echo $hirid;
$target=$UploadClass->uploadimg('photo',$hirimg_loc.'/'.$hirid,''.$hirid,800,600,true,true,true);

//header("Location:".$homeurl."/hirek/edittext/".encode($hirid));

}


if (decode($getparams[2])>0){$hirid=decode($getparams[2]);}
if ($hirid>0){
	$filters['id']=$hirid;
	$filters['status']="all";
	$termek=$class_termekek->get($filters,$order='',$page='');
	$adat=$termek[0];
	}
?>


	<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
     <?php $Form_Class->hiddenbox('hirsave','1')?>
	 
 <?php echo $lan['menu'];
 
//arraylist($auser);
if (!isset($menustart))$menustart='0';
/*$filtersm["modul"]="hirek";*/
$filtersm["jog"]="5";

$menuk=$MenuClass->menu_selectboxfilter($menustart,array("modul"=>"term"),$filtersm,$order='',$page='all');
 
 ?>:
 
<?php $Form_Class->selectbox2("mid",$menuk,array('value'=>'id','name'=>'nev'),$adat["mid"],"Menu");?>                  


<?php 
for ($i = 1; $i <= 20; $i++) {
	$sorrendarray[$i]["id"]=$i;
	$sorrendarray[$i]["nev"]=$i;	
}
?>
  
<br />
    <input name="id" id="id" type="hidden" value="<?php echo base64_decode($getparams[2]); ?>" />
	
	
	
<div id="desc_hu">

    <?php  $form->textbox("nev",$adat["nev"],lan('nev')) ?>
    <?php  $form->textbox("kod",$adat["kod"],lan('kod')) ?>
    <?php  $form->textbox("kvn_kod",$adat["kvn_kod"],lan('kvn_kod')) ?>
    <?php  $form->textbox("kvn_teszor",$adat["kvn_teszor"],lan('kvn_teszor')) ?>
    <?php  $form->textbox("raktaron",$adat["raktaron"],lan('raktaron')) ?>
	<?php  $form->textaera("leiras",$adat["leiras"],lan('leiras')) ?>
    <?php  $form->textbox("suly",$adat["suly"],lan('suly')) ?>
    <?php  $form->textbox("ar",$adat["ar"],lan('ar')) ?>
    <?php  $form->textbox("ar_vat",$adat["ar_vat"],lan('ar_vat')) ?>
    <?php  $form->textbox("ar_beszerzes",$adat["ar_beszerzes"],lan('ar_beszerzes')) ?>
    <?php  $form->textbox("vat",$adat["vat"],lan('vat')) ?>

	
				<?php echo '<label for="status">'.lan('status').'</label>';?>
				<?php 
				 $form->selectboxeasy2("status",$status,$adat["status"],"status");									
?>
				<?php echo '<label for="sorrend">'.lan('sorrend').'</label>';?>
				 <?php $form->selectboxeasy2("sorrend",$sorrend,$adat["sorrend"],"sorrend");									
?>


	<img src="<?php echo ($homeurl.'/'.$nimg);?>">
	<input id="photo" name="photo" type="file" >

<p>
                        <button type="submit" class="btn btn-succes"><?php echo $lan['save'];?> <i class="fa fa-arrow-right"></i></button>
</p>
</form>
 
 
     <?php
 if ($hirid>0){
	 $getparams[2]=$hirid;
include('items/files/web/list.php');

?>                          
                <a href="<?php echo str_replace('admin.', "", $homeurl)."page/hir/".$hirid."?forcelook=1"; ?>" target="_blank">            <div class="col-sm-4">
                Page preview </div></a>

<?php } ?> 
 
</div>
</div>