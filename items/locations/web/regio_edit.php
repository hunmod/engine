<div class="container">
    <h1><?= lan('regioedit') ?></h1>
    <div class="col-sm-12">

        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>

            <?php
            //arraylist($auser);
            if (!isset($menustart)) $menustart = '0';
            /*$filtersm["modul"]="hirek";*/
            $filtersm["jog"] = "5";
            ?>
            <br/>
            <input name="regio_id" id="regio_id" type="hidden" value="<?php echo $adat["regio_id"]; ?>"/>
            <div id="citycontainer"></div>
           <?php $Form_Class->selectbox2("country_id", $countrydatas['datas'], array('value' => 'country_id', 'name' => 'country_name'), $adat["country_id"], lan('country')); ?>

            <?= lan('nev'); ?>:
            <?php $FormClass->textbox("regio_name", $Text_Class->htmlfromchars($adat["regio_name"])) ?>
            <br/>

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
