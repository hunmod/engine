<div class="container">
    <h1><?= lan('countryedit') ?></h1>
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
            <input name="country_id" id="country_id" type="hidden" value="<?php echo $adat["country_id"]; ?>"/>
            <?= lan('nev'); ?>:
            <?php $FormClass->textbox("country_name", $Text_Class->htmlfromchars($adat["country_name"])) ?>
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
        <?php } ?>

    </div>
</div>
