
<div class="container"> 
<section>
<newsbig>
<?php 
//arraylist($hirekelemek);
if (count($hirekelemek1)>0)
$mc=0;/*
foreach($hirekelemek1 as $elem){
$mc++;
if ($mc<=2)include('items/hirek/web/hir_display_block1.php');
if ($mc>2 && $mc<=5)include('items/hirek/web/hir_display_block2.php');
		//include('items/hirek/web/hir_display_short.php');	
		//include('items/hirek/web/hir_display_block1.php');
		//include('items/hirek/web/hir_display_block2.php');	
		//include('items/hirek/web/hir_display_short_first.php');
}*/
?>
</newsbig>  

<?php 
foreach($hirekelemek1 as $elem){
		include('items/hirek/web/hir_display_block_paralax.php');
}
?>
<div class="clear"></div>
<?php
foreach ($rssdatas as $egyrssdata){
	$egyrssdata["url"]= $homeurl.$separator.'rss/item/'.$Text_Class->htmlfromchars($Text_Class->to_link($egyrssdata["title"])).'/'.$egyrssdata["id"];
include('items/rss/web/rssarticle1.php');
}
?>

<?php if ($auser["jog"]>3){
include("items/user/web/widget_user_menu.php");	
}
?>
</section>
<div class="clear"></div> 

</div> 

 