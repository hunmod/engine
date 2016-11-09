<script>
(function($) {
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top + 'px'
        }, 'slow');
        return this; // for chaining...
    }
})(jQuery);
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
function focusOnElement(element_id) {
     $('#section_' + element_id).goTo(); // need to 'go to' this element
}
</script> 
<style>
.navbar{display:none;}
.float_container{
	position:fixed;
	top:0;
	left:0;
	z-index:20;
	background:rgba(18,163,32,0.7);
	width:100%;
}
.float_container span{
	color:#FFF;
	cursor:pointer;
	padding:5px 15px;
}
.fb-page{
//width:100%;
}
</style>
<div class="float_container"> 

<div class="container"> 
<section>
<span onclick="focusOnElement('1');">Kezdőoldal</span>
<span onclick="focusOnElement('2');">Rólunk</span>
<span onclick="focusOnElement('3');">Bemutatkozás</span>
<span onclick="focusOnElement('4');">Kapcsolat</span>
</section>
</div>
</div>

<div class="container" id="section_1"> 
<section>
	<?php
	include("items/slide/web/widget_slider.php");
	?>


	<?php

	$filtersm['mid']=11;
	$filtersm["maxegyoldalon"]=5;
	$qhir=$hir_class->get($filtersm,'',$_GET["page"]) ;
	$hirekelemek1=($qhir['datas']);

	$filtersm['id']=4;
	$filtersm["maxegyoldalon"]=5;
	$qhir=$hir_class->get($filtersm,'',$_GET["page"]) ;
	$hir1=($qhir['datas'][0]);

	?>


<newsbig id="section_2">
<div class="clear"></div>

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
<newsone id="section_3">
	<?php
	$elem=$hir1;
	include('items/hirek/web/hir_display_one2.php');
	?>
</newsone>
<div class="clear"></div>


<div class="clear"></div>
<?php
	$getparamsid=$getparams;
	$getparams[0]='files';
	$getparams[1]='list';
	$getparams[2]='12';

	include("items/files/web/list.php");
?>

<div class="clear"></div>

<div class="col-xs-12 col-sm-6" id="section_4">
<?php include("items/admin/web/contact_widget.php") ?>
</div>
<div class="col-xs-12  col-sm-6">
<?php include("items/user/web/widget_user_contact.php") ?>
</div>

<div class="clear"></div>


<?php if ($auser["jog"]>3){
include("items/user/web/widget_user_menu.php");	
}
?>
</section>
<div class="clear"></div> 


</div> 

 