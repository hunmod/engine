<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
          <section class="col-md-9 col-sm-8">
           <div class="bgcolor1 text">
            <h1>Wifi settings QR-code generator</h1>
            <h2>WIFI beállítások  qr-kódból</h2>
            <form method="post">
            <strong>Wifi neve:</strong>
            <?php $Form_Class->textbox('ssid',$_REQUEST['ssid']);?><br />
            <strong>Titkosítás:</strong>
            <select name="encrypt">
              <option value="nopass" <?php if ($_REQUEST['encrypt']=="nopass"){echo $selected;}?> >Nincs</option>
              <option value="WEP" <?php if ($_REQUEST['encrypt']=="WEP"){echo $selected;}?> >WEP</option>
              <option value="WPA" <?php if ($_REQUEST['encrypt']=="WPA"){echo $selected;}?> >WPA</option>
            </select><br />
            
            <strong>Jelszó:</strong>
            <?php textbox('pass',$_REQUEST['pass']);?><br />
            
            <input name="" type="submit" value="mehet!" />
            </form>
            <?php
            /*
            WIFI:S:nadj;T:WPA;P:nikipeti;;
            WIFI:S:nadj;T:WEP;P:nikipeti;;
            WIFI:S:nadj;T:nopass;P:nikipeti;;
            
            */
            if (isset($_REQUEST["ssid"])){
            $code = "WIFI:S:".$_REQUEST['ssid'].";T:".$_REQUEST['encrypt'].";P:".$_REQUEST['pass'].";;";
            ?>
            <image alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S"><br>
            <?php
            }
            ?>
</div>
</section>
</div>