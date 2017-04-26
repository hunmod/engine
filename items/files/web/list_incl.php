<link href="<?php echo $server_url;?>scripts/lightGallery-master/dist/css/lightgallery.css" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function(){
        $('#lightgallery').lightGallery();
    });
</script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lightgallery.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-fullscreen.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-thumbnail.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-video.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-autoplay.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-zoom.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-hash.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/dist/js/lg-pager.js"></script>
<script src="<?php echo $server_url;?>scripts/lightGallery-master/lib/jquery.mousewheel.min.js"></script>
<style>
.list-unstyled li{
    margin-bottom: 30px;
}
    .lg-backdrop{background: rgba(0,0,0,0.7);}
</style>
<?php
if (($_GET["imgforgat"]!="") && ($_GET["i"]!="") ){kepforgat(decode($_GET["imgforgat"]),$_GET["i"]);}

//nem csak kép, bármilyen állomány feltöltésére alkalmas, a menürendszert használja és autómatikusan létrehozza a könyvtárstruktúrát.
$id=($getparams[2]);
$menu=$MenuClass->get_one_menu($id);
//a modulneve és a megnyitott elem id-ja a célkönyvtár
$data_folderpage2='/'.$folders["uploads"].'/'.$getparams[0]."/".$id.'/';
//echo $data_folderpage2;

	$mappa='uploads/'.$folders["uploads"]."/".$getparams[0]."/".$id.'/';
	//echo $mappa;
	$mylist=$Upload_Class->folderlist($mappa,400,400,900);

?>





<div class="demo-gallery">
    <ul id="lightgallery" class="list-unstyled row">
        <?php
        if(count($mylist))foreach ($mylist as $egyelem){
        ?>
        <li itemscope itemtype="http://schema.org/ImageObject" class="col-xs-6 col-sm-4 col-md-4" data-responsive="<?php echo $homeurl.$egyelem["url"];?>&x=375 375, <?php echo $homeurl.$egyelem["url"];?>&x=480 480, <?php echo $homeurl.$egyelem["url"];?>&x=800 800" data-src="<?php echo $homeurl.$egyelem["url"];?>" data-sub-html="<?php echo $egyelem["text"];?>">
            <a itemprop="contentUrl" href="<?php echo $homeurl.$egyelem["url"];?>">
                <img class="img-responsive" src="<?php echo $homeurl.$egyelem["screen"];?>">
            </a>
        </li>
            <?php
        }?>
    </ul>
</div>
