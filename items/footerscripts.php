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
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-5KTX8LD"></script>

    <script src="<?php echo $server_url; ?>scripts/jquery.modalbox-1.5.0/js/jquery.modalbox-1.5.0-min.js"
            type="text/javascript"></script>

    <link rel="stylesheet" type="text/css"
          href="<?php echo $homeurl; ?><?php echo $makemin->css('/scripts/jquery.modalbox-1.5.0/css/jquery.modalbox.css', '/scripts/jquery.modalbox-1.5.0/css/jquery.modalbox.min.css') ?>"/>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $homeurl; ?>/scripts/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <!-- script src="<?php echo $server_url; ?>scripts/html5lightbox/html5lightbox.js"></script-->
    <script src="<?php echo $homeurl;?>/scripts/jquery.snow.min.1.0.js"></script>
    <script>
        $(document).ready( function(){
            // $.fn.snow();
            $.fn.snow({ minSize: 10, maxSize: 30, newOn: 1500, flakeColor: '#d0d4f5' });
        });
    </script>

<?php
if (page_settings('blockmouse') == 2 && $auser['jog'] < 4) {
    ?>
    <script src="<?php echo $homeurl; ?><?php echo $makemin->js($stylefolder33 . '/scripts/blockmouse.js', $stylefolder33 . '/scripts/blockmouse.min.js', false) ?>"></script>
    <script>
        document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        //eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
    </script>
<?php } ?>