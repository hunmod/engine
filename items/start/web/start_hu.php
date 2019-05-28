
<div class="container"> 
<section>
<newsbig>
<?php
echo  $Text_Class->htmlfromchars( page_settings('footerblock2_hu'));
//arraylist($hirekelemek);
//if (count($hirekelemek1)>0)
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
//arraylist($catlist);
foreach($catlist['datas'] as $elem){
    $elem['img']=$category_class->getimg($elem['id'],$x=300,$y=300);
    $filtert['id']=$elem['id'];
    $elem['textd']=$category_class->get_text($_SESSION['lang'],$filtert,'','all') ;

    ?>
    <div class="col-xs-12 col-sm-4 kategoria">
        <div class="img-100 col-xs-12">
            <a href="<?= $homeurl ?>/autok?kat=<?= $elem['id']?>" ><img class="img-100" src="<?=$elem['img']?>"></a>
        </div>
        <div item-prop="desctription" class="col-xs-12">
            <?= $Text_Class->youtoubecserel($elem['textd']['datas'][0]['leiras'])?>
        </div>
        <div class="redony">
            <div item-prop="name" class="kat">
                <?= $elem['textd']['datas'][0]['nev']?>
        </div>
        </div>
    <?php //arraylist($elem);?>
    </div>
    <?php
}
?>
<div class="clear"></div>
    <?php
    echo  $Text_Class->youtoubecserel($Text_Class->htmlfromchars( page_settings('footerblock3_hu')));?>


<?php 
if (isset($hirekelemek2))foreach($hirekelemek2 as $elem){
		//include('items/hirek/web/hir_display_block_paralax_one.php');
}
?>
<div class="clear"></div>

<?php
if (isset($rssdatas))foreach ($rssdatas as $egyrssdata){
	$egyrssdata["url"]= $homeurl.$separator.'rss/item/'.$Text_Class->htmlfromchars($Text_Class->to_link($egyrssdata["title"])).'/'.$egyrssdata["id"];
//include('items/rss/web/rssarticle1.php');
}
?>
<div class="clear"></div>

<div class="col-xs-12">
	<div class="col-xs-6">
		<?php //include('./items/admin/web/contact_widget.php');?>
	</div>
	<div class="col-xs-6">
		<?php //include('./items/user/web/widget_user_contact.php');?>

	</div>
</div>

<div class="clear"></div>

<?php if ($auser["jog"]>3){
//include("items/user/web/widget_user_menu.php");
}
?>
</section>
<div class="clear"></div> 

</div> 

 