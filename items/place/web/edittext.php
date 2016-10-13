<?php 
if ($auser["id"]<1){
	  	header("Location:".$homeurl);

}
?>

<div class="container">
<div class="col-sm-12">
<h1>Új hely hozzáadása</h1>
<?php 
$form=new formobjects();
$status=$place_class->status();
$tipus=$place_class->tipus();



if ($_POST['hirsave']=='1'){
	if ($_POST['nev']==''){
		$_SESSION["messageerror"]="Adj Nevet!";
	}
	/*else if ($_POST['varos']<1){
		$_SESSION["messageerror"]="Adj várost!";
	}*/
	/*if ($_POST['cim']==''){
		$_SESSION["messageerror"]="Adj címet!";
	}	*/
	else if ($_POST['tipus']<1){
		$_SESSION["messageerror"]="Adj Típust!";
	}
	else if ($_POST['diab']+$_POST['gluten']+$_POST['lactose']<1){
		$_SESSION["messageerror"]="Jelölj meg legalább egy allergént!";
	}
	else
	{
		$hirid=$place_class->save($_POST); 
		$_POST["id"]=$hirid;
		header("Location:".$homeurl.'/place/list');
	}
	$adat=$_POST;
//$place_class->save_ad_tags_field($_POST);
//echo $hirid;

//header("Location:".$homeurl."/hirek/edittext/".encode($hirid));

}


if (base64_decode($getparams[2])>0){$hirid=base64_decode($getparams[2]);}
if ($hirid>0){
	$filters['id']=$hirid;
	$filters['status']="all";
	$news=$place_class->get($filters,$order='',$page='all');
	$adat=$news['datas'][0];
	
	//var_dump($nimg);

/*
if ($getparams[2]!=''){
$qadatok="SELECT * FROM  ".$tbl['hir']." WHERE id='".base64_decode($getparams[2])."'";
$adatok=db_Query($qadatok, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$adat=$adatok[0];*/
}

//$menupontselectbox= menualatta(0,$modul);
//$menupontselectbox=menupontselectbox($menustart,$modul,'','','');
//arraylist($menupontselectbox);

?>


	<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
     <?php $Form_Class->hiddenbox('hirsave','1');?>
<br />

    <?php  $Form_Class->hiddenbox("id",base64_decode($getparams[2])) ?>
    <?php  $form->textbox("nev",$Text_Class->htmlfromchars($adat["nev"]),$lan['nev']); ?>
	<strong><?php echo $lan['varos']."Város";?></strong>
	<?php $Form_Class->selectbox2("varos",$citys['datas'],array('value'=>'city_id','name'=>'city_name'),$adat["varos"],"Város");?>   
    <?php  $form->textbox("zip",$Text_Class->htmlfromchars($adat["zip"]),'zip'); ?>
    <?php  $form->textbox("cim",$Text_Class->htmlfromchars($adat["cim"]),$lan['cim']); ?>
    <?php  $form->textbox("hsz",$Text_Class->htmlfromchars($adat["hsz"]),'hsz'); ?>
    <?php  $form->textbox("tel",$Text_Class->htmlfromchars($adat["tel"]),$lan['tel'].'tel2'); ?>
    <?php  $form->textbox("tel",$Text_Class->htmlfromchars($adat["tel2"]),'tel2'); ?>
    <?php  $form->textbox("email",$Text_Class->htmlfromchars($adat["email"]),'email'); ?>
    <?php  $form->textbox("web",$Text_Class->htmlfromchars($adat["web"]),'web'); ?>
    <?php  $form->textbox("web2",$Text_Class->htmlfromchars($adat["web2"]),'Facebook'); ?>
    <div>
	<?php $Form_Class->checkbox("diab",$adat["diab"],'cukormentes','diab');?>
    <?php $Form_Class->checkbox("gluten",$adat["gluten"],'Gluténmentes','gluten');?>
    <?php $Form_Class->checkbox("lactose",$adat["lactose"],'Laktozmentes','lactose');?>
	</div>
    <?php  $form->kcebox("leiras",$Text_Class->htmlfromchars($adat["leiras"]),$lan['description']) ?>
        <br />
				<?php if ($auser["jog"]>=3){echo $lan['status'];?><?php 
				 $form->selectboxeasy2("status",$status,$adat["status"],"status");									
				}
				else{
					$Form_Class->hiddenbox('status','2');					
				}
				?>
<br />
				<strong><?php echo $lan['tipus'].'tipus';?></strong><?php 
				 $form->selectboxeasy2("tipus",$tipus,$adat["tipus"],"tipus");									
?>
<br />
<br />
<p>
				<button type="submit" class="button enterButton"><?php echo $lan['save'];?> <i class="fa fa-arrow-right"></i></button>
</p>
</form>
 
 
 
</div>
</div>