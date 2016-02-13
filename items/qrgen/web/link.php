<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
          <section class="col-md-9 col-sm-8">
           <div class="bgcolor1 text">
<h1>URL QR-code generator</h1>
<h2>hivatkozás qr-kódból</h2>
<form method="post">
<strong>URL:</strong>
<?php $Form_Class->textbox('url',$_REQUEST['url']);?><br />

<input name="" type="submit" value="mehet!" />
</form>
<?php
/*
MEBKM:TITLE:;URL:http:aa.hu
*/

if (isset($_REQUEST["url"])){
$code = "".$_REQUEST['url']."";
?>
<image alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S"><br>
<?php
}
?>
</div>
</section>
</section>
</div>