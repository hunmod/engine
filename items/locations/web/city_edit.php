<?php

?>

<script>



    $('documentd').ready(function () {
 /*       $('#zip').on('keyup',
            function (){
                if(this.value.length>3)getjsonfromcity(this.value);

            }
        );*/
        $('#country_id').on('change',
            function (){
                console.log(getjsonfromcregions(this.value));
            }
        );
        $('#zip').mask("9999", {placeholder: ''});

    });
</script>
<style>
</style>
<div class="container">
    <h1><?= lan('cityedit') ?></h1>
    <div class="col-sm-12">

        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php
            //arraylist($auser);
            if (!isset($menustart)) $menustart = '0';
            /*$filtersm["modul"]="hirek";*/
            $filtersm["jog"] = "5";
            ?>
            <?php $Form_Class->selectbox2("country_id", $countrydatas['datas'], array('value' => 'country_id', 'name' => 'country_name'), $adat["country_id"], lan('country')); ?>
            <?php $Form_Class->selectbox2("regio_id", $regiodatas['datas'], array('value' => 'regio_id', 'name' => 'regio_name'), $adat["regio_id"], lan('regio')); ?>

            <br/>
            <input name="city_id" id="city_id" type="hidden" value="<?php echo $adat["city_id"]; ?>"/>
            <div id="citycontainer"></div>
            <?= lan('nev'); ?>:
            <?php $FormClass->textbox("city_name", $Text_Class->htmlfromchars($adat["city_name"])) ?>
            <br/>
            <?php echo lan('center'); ?>:<?php
            $FormClass->radiobox("center", '0',lan('igen'), "checkbox-inline",$adat['center']);
            $FormClass->radiobox("center", '1',lan('nem'),  "checkbox-inline",$adat['center']);
            ?>
            <br/>
  <?php $FormClass->textbox("zip", $adat["zip"],lan('zip'),'',1); ?>
            <div id="itemcontainer"></div>
            <?php $FormClass->textbox("lati", $adat["lati"],lan('lat')); ?>
<?php $FormClass->textbox("longi", $adat["longi"],lan('long')); ?>

<br/>
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
</div>
