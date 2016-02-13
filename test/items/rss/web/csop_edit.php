<?php

$rcsstatus=$rss_class->status();
/* kapott adat feldolgozása*/
if (count($_POST))
{
	$kapott=$_POST;
	$kapott['id']=$rss_class->chanel_save($kapott);

}
/* kapott adat feldolgozása*/

if ($getparams[2]>0){
	$kapott['id']=$getparams[2];
}

/* lekérdezés*/
if  ($kapott['id']>0)
{
	$filterdata['id']=$kapott['id'];
	$kapottq=$rss_class->chanel_get($filterdata,'','0');
	$dbadat=$kapottq["datas"][0];
}
//$formelements=rsschanel_struckt($dbadat);
//arraylist($formelements);

//menü csopot lekérdezése
if (!isset($menustart))$menustart='0';
$menursscsop2=$MenuClass->menu_selectbox($menustart,array(),array("status2"=>1,'',"modul"=>"rss"));
		foreach($menursscsop2 as $mret){
			if (
			(1==$mret['status']) &&
			('rss'==$mret['modul'])&&
			('list'==$mret['file']) 
			)
			{
			$menursscsop[]=$mret;	
			}
		}
		
//		
		
		
		
		
		
?>

<div class="container">

<left class="col-md-3 col-sm-4">
<?php include("items/user/web/widget_user_menu.php")?>
</left>

<content class="col-md-9 col-sm-8">

<div style="clear"></div>
<h1>Hírcsatorna kezelése</h1>
<form id="edit_form" method="post">
<?php $Form_Class->hiddenbox('id',$dbadat['id']);?>
<?php $Form_Class->selectbox("mid",$menursscsop,array('value'=>'id','name'=>'nev'),$dbadat['mid'],'menu');?> 
<?php $Form_Class->textbox('url',$dbadat['url'],'url');?>
<?php $Form_Class->datetimebox('ido',$dbadat['ido'],'yy-mm-dd');?>
<?php $Form_Class->numbox('period',$dbadat['period'],'Órában');?>
<?php $Form_Class->selectboxeasy2("status",$rcsstatus,$dbadat["status"],"status");?>
<input name="smbt" type="submit" value="Ment" />
</form>
<div style="clear"></div>
</content>
</div>