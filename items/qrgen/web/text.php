<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
          <section class="col-md-9 col-sm-8">
           <div class="bgcolor1 text">
            <h1>Text QR-code generator</h1>
            <h2>Szöveg qr-kódból</h2>
            <form method="post">
                <strong>Szöveg:</strong><br />
                <textarea name="text" cols="" rows="">
                <?php echo $_REQUEST['text'];?>
                </textarea>
                <br />
                <input name="" type="submit" value="mehet!" />
            </form>
			<?php
            /*SMSTO:+36703250465:text*/
            
            if (isset($_REQUEST["text"])){
            $code = "".$_REQUEST['text']."";
            ?>
            <img alt="QR code from this page" src="<?php echo $homeurl;?>/scripts/phpqrcode/index2.php?data=<?php echo base64_encode($code);?>&size=3&level=S"><br>
            <?php
            }
            ?>
</div>
</section>
</div>
