<?php if(page_settings('adblockerblocker')=='2'){ ?>
    <!-- adblocker lock-->
<script src="<?= homeurl ?>/scripts/abp/abp.js"></script>
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
<?php } ?>

    <!--script src="https://www.googleoptimize.com/optimize.js?id=OPT-5KTX8LD"></script>
    <script src="<?= homeurl; ?>scripts/jquery.modalbox-1.5.0/js/jquery.modalbox-1.5.0-min.js" type="text/javascript"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= homeurl; ?>/scripts/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <!-- script src="<?= homeurl; ?>scripts/html5lightbox/html5lightbox.js"></script-->
    <?php
    if (page_settings('letitsnow') == 2 ) {
    ?>
        <script src="<?= homeurl; ?>/scripts/jquery.snow.min.1.0.js"></script>
        <script>
        $(document).ready( function(){
            // $.fn.snow();
            $.fn.snow({ minSize: 10, maxSize: 30, newOn: 1500, flakeColor: '#d0d4f5' });
        });
    </script>
    <?php } ?>
<?php
if (page_settings('blockmouse') == 2 && $auser['jog'] < 4) {
    ?>
    <script src="<?= homeurl ?><?= $makemin->js(  '/scripts/blockmouse.js',  '/scripts/blockmouse.min.js', false) ?>"></script>
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

<!-- Begin Cookie Consent plugin by Silktide - https://silktide.com/cookieconsent >
<script type="text/javascript">
    window.cookieconsent_options = {"message":"Weboldalainkon cookie-kat (sütiket) használunk, hogy személyre szóló szolgáltatást nyújthassunk látogatóink részére.","dismiss":"Elfogadom","learnMore":"több infó","link":"http://net.jogtar.hu/jr/gen/hjegy_doc.cgi?docid=A1100112.TV","theme":"dark-bottom"};
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.1/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

<!-- Cookie Consent by https://www.CookieConsent.com -->
<script type="text/javascript" src="//www.cookieconsent.com/releases/4.0.0/cookie-consent.js" charset="UTF-8"></script>
<script type="text/javascript" charset="UTF-8">
document.addEventListener('DOMContentLoaded', function () {
cookieconsent.run({"notice_banner_type":"headline","consent_type":"express","palette":"dark","language":"hu","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"open_preferences_center_selector":"https://okosfuzo.hu/site/site/13"});
});
</script>

<noscript>ePrivacy and GPDR Cookie Consent by <a href="https://www.CookieConsent.com/" rel="nofollow noopener">Cookie Consent</a></noscript>
<!-- End Cookie Consent by https://www.CookieConsent.com -->

