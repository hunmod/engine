<?php
$id=decode($getparams[2]);
if ($id>0) {
    $cfilters['id']=$id;
    $citysarray = $location_class->get_city($cfilters, '', 'all');
    $adat = $citysarray["datas"][0];
}
$adat+=$_POST;

if($adat["city_name"]&&($adat["lati"]==0 ||!$adat["longi"]==0 )) {
    ($gpsdatas=$Google_Class->get_google_geocoding($adat["city_name"]));
   // arraylist($gpsdatas[0]);
    $adat["lati"]=$gpsdatas[0]["geometry"]["location"]['lat'];
    $adat["longi"]=$gpsdatas[0]["geometry"]["location"]['lng'];

    if(!$adat["zip"]) {
        $locdatas = $Google_Class->get_google_geocdata($adat["longi"], $adat["lati"]);
        $citylocdatas = array();
        foreach ($locdatas[0]["address_components"] as $adddat) {
            if ($adddat['types'][0] == 'postal_code') {
                $adat["zip"] = $adddat['long_name'];

            };
        }
    }
// arraylist($locdatas);

}
if ($_POST['hirsave']){

    $location_class->save_city($adat);

}
?>





<script>
    $('documentd').ready(function () {



    });
</script>
</style>
<div class="container">
    <div class="col-sm-12">
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?= lan('varos');
            //arraylist($auser);
            if (!isset($menustart)) $menustart = '0';
            /*$filtersm["modul"]="hirek";*/
            $filtersm["jog"] = "5";
            ?>:

            <?php 
			//$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>

            <br/>

            <input name="city_id" id="city_id" type="hidden" value="<?php echo $adat["city_id"]; ?>"/>
            <?= lan('nev'); ?>:
            <?php $FormClass->textbox("city_name", $Text_Class->htmlfromchars($adat["city_name"])) ?>
            <br/>
            <?php echo $lan['status']; ?>:<?php
			            $FormClass->selectbox2("status", $status, array('value' => 'id', 'name' => 'nev'),  $adat["status"], "status");
            ?>
            <br/>
            <?php echo $lan['center']; ?>:<?php


            $FormClass->radiobox("center", '0',lan('igen'), "checkbox-inline",$adat['center']);
            $FormClass->radiobox("center", '1',lan('nem'),  "checkbox-inline",$adat['center']);

			//selectboxeasy2("sorrend", $sorrend, $adat["center"], "sorrend");
            ?>
            <br/>
<?php echo $lan['zip']; ?>: <?php $FormClass->textbox("zip", $adat["zip"],lan('zip')); ?>
<?php echo $lan['lat']; ?>: <?php $FormClass->textbox("lati", $adat["lati"],lan('lat')); ?>
<?php echo $lan['long']; ?>: <?php $FormClass->textbox("longi", $adat["longi"],lan('long')); ?>

<br/>

            <img src="<?php echo($nimg); ?>">
            <br/>
            <input id="photo" name="photo" type="file">


            <br/>
            <?php echo $lan['publicdate']; ?>:
            <input size="16" type="text" value="<?php echo($adat["ido"]); ?>" readonly class="form_datetime" name="ido"
                   id="ido">


            <fieldset>

                <label for="AdContactinfo">Tags</label>

                <div class="lerningfield input">
                    <input name="blogtag" id="blogtag" type="text" onkeyup="loadblogajax()" autocomplete="off"
                           placeholder="Tags"/>

                    <div id="blogtagsl" name="blogtagsl" onclick="selecttag(0,0)"></div>
                </div>
                <?php if (($tags)) foreach ($tags as $tag) {
                    $tagst .= ',' . $tag["tag_id"];
                } ?>

                <input name="blog_tags" id="blog_tags" type="hidden" value="<?php echo $tagst; ?>"/>

                <div id="blog_tagsshow" class="ms-sel-ctn">
                    <?php if (($tags)) foreach ($tags as $tag) { ?>
                        <div id="s<?php echo $tag["tag_id"]; ?>" class="ms-sel-item"><?php echo $tag["name"]; ?><span
                                class="ms-close-btn" onclick="deltag(<?php echo $tag["tag_id"]; ?>)"></span></div>
                    <?php } ?>
                </div>


            </fieldset>

            <p>
                <button type="submit" class="button enterButton"><?php echo $lan['save']; ?> <i
                        class="fa fa-arrow-right"></i></button>
            </p>
        </form>


        <?php
        if ($hirid > 0) {
            $getparams[2] = $hirid;
            include('items/files/web/list2.php');
            ?>
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "hirek/hir/" . $hirid . "?forcelook=1"; ?>" target="_blank">
                <div class="col-sm-4"><?= lan("preview");?></div>
            </a>

        <?php } ?>

    </div>
    <!--div class="col-md-3 col-sm-4">
<?php include("items/user/web/widget_user_menu.php") ?>
</div-->
</div>