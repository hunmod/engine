<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
          <section class="col-md-9 col-sm-8">
           <div class="bgcolor1 text">
<h1>Email QR-code generator</h1>
<h2>Emailküldés qr-kódból</h2>
<form method="post">
<strong>email:</strong>
<?php $Form_Class->textbox('email',$_REQUEST['email']);?><br />
<strong>tárgy:</strong>
<?php $Form_Class->textbox('subject',$_REQUEST['subject']);?><br />
<strong>Szöveg:</strong>
<?php $Form_Class->textbox('text',$_REQUEST['text']);?><br />

<input name="" type="submit" value="mehet!" />
</form>
<?php
/*
MATMSG:TO:aa@aa.hu;SUB:targy;BODY:rizsa
*/

if (isset($_REQUEST["email"])){
$code = "MATMSG:TO:".$_REQUEST['email'].";SUB:".$_REQUEST['subject'].";BODY:".$_REQUEST['text']."";
?>
<image alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S"><br>
<?php
}
?>
</div>
</section>
</div>