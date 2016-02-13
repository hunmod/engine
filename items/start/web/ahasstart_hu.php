<script>
function chkbox_recept(modul){
	if (document.getElementById(modul).value<=0)
	{
		document.getElementById(modul).value='1';
		$("#icon"+modul).addClass(" selected");
	}
	else{
		$("#icon"+modul).removeClass(' selected').addClass('');
		document.getElementById(modul).value='0';
	}
}

</script> 
<div class="container"> 
<section>
<div id="owl-example" class="owl-carousel">
<?php 
if (count($kiemeltreceptek))foreach ($kiemeltreceptek as $kiemeltrecept){
	$mappa="uploads/_".$oldalid."/".$getparams[0]."/".$kiemeltrecept["id"];
	$kiemeltimg=randomimgtofldr($mappa);
	if ($kiemeltimg!="none"){
		$kiemeltimg="uploads/picture.php?picture=".encode("_".$oldalid."/".$getparams[0]."/".$kiemeltrecept["id"]."/".$kiemeltimg)."&x=500";
	}else{
		$kiemeltimg="uploads/".$defaultimg;
	}
?>
<div> 
<?php 
$recip=$kiemeltrecept;
include("items/konyha/web/recipe_box2.php");
?>
</div>

<?php
}
?>
</div>
<script>
  $("#owl-example").owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		autoPlay : 3000,
		stopOnHover : true,
     // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
</script>
<div class="clear"><br /></div>
<?= $lan['receptek'];?>
<recipes> 
<?php 
if (count($receptekreceptek))foreach ($receptekreceptek as $recip){
include("items/konyha/web/recipe_box1.php");
}
?>
</recipes>
<div class="clear"></div>
<newsbig>
<?php 
//arraylist($hirekelemek);
if (count($hirekelemek1)>0)
$mc=0;
foreach($hirekelemek1 as $elem){
$mc++;
if ($mc<=2)include('items/hirek/web/hir_display_block1.php');
if ($mc>2 && $mc<=5)include('items/hirek/web/hir_display_block2.php');
		//include('items/hirek/web/hir_display_short.php');	
		//include('items/hirek/web/hir_display_block1.php');
		//include('items/hirek/web/hir_display_block2.php');	
		//include('items/hirek/web/hir_display_short_first.php');
}
?>
</newsbig>  
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

 