<?php if (isset($googleplus_id) && $googleplus_id != "") { ?>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js">
        {
            lang: '<?php  echo $_SESSION["lang"]; ?>'
        }
    </script>
<?php } ?>


    <!-- adblocker lock
<script src="<?php echo $server_url; ?>/scripts/abp/abp.js"></script>
<script>
function adBlockDetected() {
			blocked();		
		}
		function adBlockNotDetected() {
		}	
		
		function blocked() {
			alert("Kérlek kapcsold ki az Adblockert!");		
		}

		
		if(typeof fuckAdBlock === 'undefined') {
		} else {
			fuckAdBlock.onDetected(adBlockDetected).onNotDetected(adBlockNotDetected);
}
</script>
-->

    <script src="<?php echo $server_url; ?>scripts/jquery.modalbox-1.5.0/js/jquery.modalbox-1.5.0-min.js"
            type="text/javascript"></script>

    <link rel="stylesheet" type="text/css"
          href="<?php echo $homeurl; ?><?php echo $makemin->css('/scripts/jquery.modalbox-1.5.0/css/jquery.modalbox.css', '/scripts/jquery.modalbox-1.5.0/css/jquery.modalbox.min.css') ?>"/>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $homeurl; ?>/scripts/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- script src="<?php echo $server_url; ?>scripts/html5lightbox/html5lightbox.js"></script-->

<?php
if (page_settings('blockmouse') == 2 && $auser['jog'] < 4) {
    ?>
    <script
        src="<?php echo $homeurl; ?><?php echo $makemin->js($stylefolder33 . '/scripts/blockmouse.js', $stylefolder33 . '/scripts/blockmouse.min.js', false) ?>"></script>
<?php } ?>