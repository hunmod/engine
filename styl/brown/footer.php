<div class="col-lg-3 col-md-4 col-sm-6">
        <a href="https://www.facebook.com/<?php echo $fb_page_name; ?>" id="facebook" target="_blank"></a>
<?php
$code=$homeurl.$_SERVER['REQUEST_URI'];
?>   
<div>     
<image alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S">
</div>        
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
    <?php include('./items/konyha/web/widget_submenu.php');?>    
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
</div>
<div class="col-lg-3 col-md-4 col-sm-6">
    <?php include('./items/user/web/widget_user_contact.php');?>    
</div>
<div class="col-lg-12 col-md-12 col-sm-12" align="center">
        Hunmod web engine
</div>
<link rel="stylesheet" media="print" type="text/css" href="<?php echo $homeurl;?><?php echo $makemin->css($stylefolder.'print.css',$stylefolder.'print.min.css')?>" />
<!--script src="<?php echo $homeurl;?>/scripts/jquery.snow.min.1.0.js"></script-->
<script>
$(document).ready( function(){
   // $.fn.snow();
	$.fn.snow({ minSize: 10, maxSize: 30, newOn: 1500, flakeColor: '#d0d4f5' });
});
</script>
