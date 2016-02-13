<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
          <section class="col-md-9 col-sm-8">
           <div class="bgcolor1 text">
<h1>SMS QR-code generator</h1>
<h2>SMS küldés  qr-kódból</h2>
<form method="post">
<strong>Tel:</strong>
<?php $Form_Class->textbox('phone',$_REQUEST['phone']);?><br />
<strong>Szöveg:</strong>
<?php $Form_Class->textbox('text',$_REQUEST['text']);?><br />

<input name="" type="submit" value="mehet!" />
</form>
<?php
/*
SMSTO:+36703250465:text*/

if (isset($_REQUEST["phone"])){
$code = "SMSTO:".$_REQUEST['phone'].":".$_REQUEST['text']."";
?>
<image alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S"><br>
<?php
}
?>
</div>
</section>
</div>