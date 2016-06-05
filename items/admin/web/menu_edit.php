<style>
.adminmenulist ul li{
	list-style:none!important;
	text-indent: 0px;

	}
.adminmenulist ul li:before 
{
display:none;
}



 .menuselect
{
	display:block;
	cursor:pointer;	
	margin-bottom:2px;
	margin-top:2px;
	list-style:none;
}
.menuselect.selected,
.menuselect.default
{
 border:1px solid #F90;
}
.menuselect.selected
{
background:#9F0;
}
form label{
	width:80px;
	}
</style>
<script>
function menu_admin_select(modul,filename){
	document.getElementById('modul').value=modul;
	document.getElementById('file').value=filename;
$('span').removeClass(' selected').addClass('');
	
$('#'+filename+modul).addClass(" selected");
}
</script>
<div class="container">
    <section class="col-sm-12">
<a href="<?php echo $separator;?>admin/menu">Vissza</a>

<h1>Menüpont szerkesztése</h1>
<?php
/*
$msbx["id"]=1;
$msbx["nev"]="Gyökér";
$menupontselectbox[]=$msbx;
*/
$status=$MenuClass->status();		
$jog=$MenuClass->jog();
//$menupontselectbox=menupontselectbox(0,$onearray,'','','');
$qmenu=$MenuClass->menu_selectbox(0,array(),$filtersm,$order='',$page='all');
//arraylist($qmenu);
/* kapott adat feldolgozása*/
if (count($_POST))
{
	//$kapott=$_POST;
	if ($_POST["formname"]=="menuedit")
	{
		/*$kapott=menu_editform_form($_POST);	
		gen_form_save($kapott,"menu",$_POST);*/
		$_POST["nev"]=$Text_Class->htmltochars($_POST["nev"]);
		$_POST["leiras"]=$Text_Class->htmltochars($_POST["leiras"]);

		$kapott=$MenuClass->save($_POST);
		//arraylist($kapott);
	}else{$kapott=$getparams[2];}
	
	$targetfldr='.'."/uploads/menu_img/".$kapott.'/';
echo $targetfldr;
	if (isset($_POST["menuimg"]))
	{
		$Upload_Class->createdir($targetfldr);
		$Upload_Class->uploadimg("img",$targetfldr,$kapott,800,600,$resize=true,$crop=true,$forcejpg=true);
		//move_uploaded_file($source, $target);
		//var_dump( $_FILES);
	}
	if (isset($_POST["menuimgh"]))
	{
		$Upload_Class->createdir($targetfldr);
		$Upload_Class->uploadimg("img",$targetfldr,$kapott.'h',800,600,$resize=true,$crop=true,$forcejpg=true);
		//move_uploaded_file($source, $target);
		//var_dump( $_FILES);
	}
}
/* kapott adat feldolgozása*/


/* lekérdezés*/

	$filters2['id']=$getparams[2];
	$filters2['status']='all';
	
if ($filters2['id']>0){	
	$egyelem=$MenuClass->get_menu($filters2,'','all');
	$dbadat=$egyelem['datas'][0];
	$menuimages=$MenuClass->menu_img($dbadat["id"]);
}
	arraylist($menuimages);
//$formelements=menu_editform_form($dbadat);
//arraylist($formelements);
?>


<article class='col-sm-4'>
<form id="edit_formd" method="post" >
<?php $Form_Class->hiddenbox("formname","menuedit") ;?>
<?php $Form_Class->hiddenbox("id",$dbadat['id']) ;?>
<?php $Form_Class->hiddenbox("modul",$dbadat['modul']) ;?>
<?php $Form_Class->hiddenbox("file",$dbadat['file']) ;?>
<?php $Form_Class->selectbox("mid",$qmenu,array('value'=>'id','name'=>'nev'),$dbadat['mid'],$lan['menu'],$class="form-control");?>
<?php $Form_Class->textbox("nev",$dbadat['nev'],$lan['name']) ;?>
<?php $Form_Class->textaera("leiras",$dbadat['leiras'],$lan['description']) ;?>
<?php $Form_Class->textbox("item",$dbadat['item'],$lan['item']) ;?>
<?php $Form_Class->selectboxeasy("jogid",$jog,$dbadat['jogid'],$lan['jogid'],"form-control");?>
<?php $Form_Class->selectboxeasy("status",$status,$dbadat['status'],$lan['status'],"form-control");?>
<?php $Form_Class->selectbox("sorrend",$sorrendarray,array('value'=>'id','name'=>'nev'),$dbadat['sorrend'],$lan['sorrend'],$class="form-control");?>
<input name="smbt" type="submit" value="<?php echo $lan['save']; ?>" />
</form>
</article>
<article class='adminmenulist col-sm-4'>
<h1>Modul:</h1>
<ul>
<?php
//arraylist ($dbadat);
foreach ($modules as $modul){
$style="menuselect";
if (($modul["modules"]==$dbadat["modul"])&&($modul["file"]==$dbadat["file"])){
$style="menuselect default";
}
?>
<li><span onclick="menu_admin_select('<?php echo $modul["modules"];  ?>','<?php echo $modul["file"];  ?>');" class="<?php echo $style;?>" id="<?php echo $modul["file"].$modul["modules"];  ?>"><?php echo $modul["name"];  ?></span></li>
<?php
}
?>	
</ul>
<?php
//arraylist($modules);
?>

</article>
<div class="clear"></div>
<article class='col-sm-4'>
	<?php 
?>
	<h1>Menu <?php echo $lan['picture']; ?>:</h1>
	<?php echo $homeurl.$menuimages['menu_img_url'];?>

	<?php if ($menuimages['menu_img']!=''){?>
        <img src="<?php echo $homeurl.$menuimages['menu_img_url'];?>" /><br />
        <a href="<?php echo $separator.$_GET['q'].$separator2."delfile=".encode($menuimages['menu_img']);?>">DEL</a>

		<h1>Menu <?php echo $lan['picture']; ?> hover:</h1>

    <?php 
	if ($menuimages['menu_hover']!=""){?>
        <img src="<?php echo $menuimages['menu_hover_url'];?>" /><br />
        <a href="<?php echo $separator.$_GET['q'].$separator2."delfile=".encode($menuimages['menu_hover']);?>">DEL</a>
    <?php } else {?>
        <form method="post" enctype="multipart/form-data">
        <?php $Form_Class->hiddenbox("menuimgh",$dbadat['id']."_hover");?>
        <input name="img" type="file" /><input name="" type="submit" />
        </form>    
    <?php } ?>    

    <?php } else {?>
    <form method="post" enctype="multipart/form-data">
    <?php $Form_Class->hiddenbox("menuimg",$dbadat['id']);?>
    <input name="img" type="file" /><input name="" type="submit" />
    </form>
    <?php } ?>    

<article>

        </section>   

</div>
