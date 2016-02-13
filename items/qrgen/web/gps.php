<div class="clear" ></div>
        <section class="pagefull" >
           <div class="bgcolor1 text">
<h1>SMS QR-code generator</h1>
<h2>GPS pozició  qr-kódból</h2>
<form method="post">
<strong>Lat:</strong>
<?php $Form_Class->textbox('lat',$_REQUEST['lat']);?><br />
<strong>Long:</strong>
<?php $Form_Class->textbox('long',$_REQUEST['long']);?><br />


<input name="" type="submit" value="mehet!" />
</form>
<?php
/*
GEO:47.8555, 14.3555
*/

if (isset($_REQUEST["long"])){
$code = "GEO:".$_REQUEST['lat'].",".$_REQUEST['long']."";
?>
<image alt="QR code from this page" src="./scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S"><br>
<?php
}
?>
</div>
</section>
<div class="clear" ></div>