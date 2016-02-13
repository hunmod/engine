<style>
#bevezeto{
width:250px;
height:100px;	
}
.icon{
width:30px;
height:30px;	
display:block;
float:left;
background:#9F0;
}
.icon.selected{
background:#F00;
}

.pagefull{
text-align:left;	
}
.pagefull label{
width:auto;	
}
.tblrow input{
width:75px;	
}
.cim{
font-size:14px;
}
.pagefull{
	min-height:300px;

}
</style>

<div class="container newrecipe">
	<left class="col-md-3 col-sm-4">
<?php 
if ($_GET["cload"]){
$loadcalc=$_GET["cload"];	
}
else{
$loadcalc="mycalc"; 	
}
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);
?>
	</left>
<div class="col-sm-8 col-md-9">
<?php 
//arraylist($dbadat);

//kalkulátor
if ($getparams[2]>0) { include_once("recept_alapanyag.php"); }
else { 

//arraylist($_SESSION['receptek']);
include_once("recept_alapanyag_user.php"); }
?>
<?php if ($getparams[2]<1){ ?>
<?php if(count($_SESSION['receptek'][$loadcalc])){?>
<a href="<?php echo $homeurl.$separator.$getparams[0]."/".$getparams[1]."/".$getparams[2].$separator2.'loadcalc='.$loadcalc; ?>" class="btn button  btn-success"><?php echo $lan["kalkulatorload"]; ?></a>
<?php }?>
<span onclick="phpopenf('raceptalapanyag','includeajax','q=konyha/recept_alapanyag_user/<?php echo $getparams[2]; ?>&reset=<?php echo $hozzavaloadatai["id"]; ?>');" class="btn button  btn-success">
<?php echo $lan["reset"]; ?>
</span>
<?php }?>
<div class="clear" ></div>
<?php
if ($redirect!=1){
?>
        <section class="pageleftside">
		<right style="overflow:hidden;" >
<section class="pagefull" >
<?php  
if (($auser["jogid"]>=3)||($auser["id"]==$dbadat["uid"])||((''==$dbadat["id"])&&($auser["id"]>0))){
?>        

<form id="edit_form" method="post">
<?php
//arraylist($dbadat);
	$Form_Class-> hiddenbox('receptpost','1');
	$Form_Class->hiddenbox('id',$dbadat['id']);
	//hiddenbox('mid',$dbadat['mid']);
	$Form_Class->hiddenbox('sorrend',$dbadat['sorrend']);
	$Form_Class->hiddenbox('uid',$dbadat['uid']);

?> 	
	<?php $Form_Class->selectbox("mid",$menusb,array('value'=>'id','name'=>'nev'),$dbadat['mid'],$lan["menu"]);?> 
	<?php $Form_Class->textbox('nev',$dbadat['nev'],$lan["name"],null,1);?> 
	<?php $Form_Class->textaera('bevezeto',$dbadat['bevezeto'],$lan["bevezeto"]);?> 
	<?php $Form_Class->kcebox('leiras',$dbadat['leiras'],$lan["description"],"minimal");?> 
	<?php $Form_Class->numbox('adag',$dbadat['adag'],$lan["adag"],'form-control',1);?> 
	<?php $Form_Class->selectbox_roll("nehezseg",$nehezseg,array('value'=>'id','name'=>'nev'),$dbadat['nehezseg'],$lan["nehezseg"]);?> 

	<?php $Form_Class->selectbox_roll("elkeszites_ido",$elkeszees_ido,array('value'=>'id','name'=>'nev'),$dbadat['elkeszites_ido'],$lan["elkeszites_ido"]);?>    
	<?php
	if ($auser["jog"]>=3){ 
	$Form_Class->selectboxeasy2("status",$rec_class->status(),$dbadat['status'],$lan["status"]);
	}
	else{
    hiddenbox('status','2');
	}
	?>
<div class="form_row">	
    <?php $Form_Class->checkbox("diab",$dbadat["diab"],$lan["diab"],'diab');?>
    <?php $Form_Class->checkbox("gluten",$dbadat["gluten"],$lan["gluten"],'gluten');?>
    <?php $Form_Class->checkbox("lactose",$dbadat["lactose"],$lan["lactose"],'lactose');?>
</div>
<div class="form_addres">
    &nbsp;
</div>
<?php 
//formgenerátor   
//arraylist($egyelem[0]);

/*
foreach ($formelements as $felem){
	formelement_of_tipe($felem);
	echo "<br>";
}*/
?>

<div class="clear" ></div>
<input name="smbt" type="submit" value="<?php echo $lan["save"]; ?>" />
<div class="clear" ></div>
</form>


		<h1><?php echo $lan["kepek"]; ?></h1>
<?php
if ($getparams[2]>0) {
	$userpuffer=$auser["jogid"];
	$auser["jogid"]=3;
	include_once("./items/files/web/list.php");
	$auser["jogid"]=$userpuffer ;
	$getparams[2]=decode($getparams[2]);	
//}
 }else{
?>
Képeket a recept mentése után lehet feltölteni.
<?php }?>
<?php }
else echo "Nincs jogosultságod!" ;
?>
</section>        

		</right>
</section>
<?php
}
?>
</div>
</div>
<div class="clear" ></div>