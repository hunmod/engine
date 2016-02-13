<?php
//arraylist($bannersizes);
/*$cuisine=$Sys_Class->get_list('cuisine',array());
$cous[]=array("name"=>'All',"code"=>"");
$cous[]=array("name"=>'none',"code"=>"xx");
$cuisines=$cous+$cuisine;
$status=$class_ads->status();

if (!$_GET["status"]){
	$_GET["status"]=1;
	}
*/
$ADS_list=$class_ads->get($_GET);

?>
<div class="container"> 
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  
<section class="col-md-9 col-sm-8" ads >

    <a href="<?php echo $homeurl.$separator.$getparams[0]."/edit";?>" class="btn btn-success">New ADS</a>
<form method="get">
<?php 
$Form_Class->hiddenbox('q',$_GET["q"]);
$Form_Class->selectbox('adid',$bannersizes,array("value"=>"id","name"=>"nev"),$_GET["adid"]);
//selectbox('status',$status,array("value"=>"id","name"=>"nev"),$_GET["status"]);
$Form_Class->selectbox('status',$status,array("value"=>"id","name"=>"nev"),$_GET["status"],'status');
//$Form_Class->selectbox('country',$cuisines,array("value"=>"code","name"=>"name"),$_GET["country"]);
?>
<input name="keres" type="submit" />
</form>
<?php
//arraylist($ADS_list);
if (count($ADS_list)>=1){
	foreach ($ADS_list as $elem){
		?>
        <ads>
        <?php
		$class_ads->print_ads($elem);
		?><div>
		<a href="<?php echo $homeurl.$separator.$getparams[0]."/edit/".$elem["id"];?>">Edit</a>
        </div>
        </ads>
<?php
		
	}
}
?>
</section>
</div> 
