<div class="container">
    <div class="col-sm-12">
        <h2><?= lan('Autó adatai') ?></h2>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php

            //arraylist($auser);
            if (!isset($menustart)) $menustart = '0';
            /*$filtersm["modul"]="hirek";*/
            $filtersm["jog"] = "5";


            ?>

            <div class="col-sm-6">

            <?php echo $lan['nev']; ?>:
            <input name="cim" id="cim" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["cim"]); ?>"
                   maxlength="200" style="  width: 217px;"/><br/>
</div>
            <div class="col-sm-6">

            <?php //$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>
            <?php
            //arraylist($carskatmenu);
            echo lan('kat');
            $Form_Class->selectbox2("mid",$carskatmenu['datas'],array('value'=>'id','name'=>'nev'),$adat["mid"],lan("rootkat"));?>


            <?php


            for ($i = 1; $i <= 20; $i++) {
                $sorrendarray[$i]["id"] = $i;
                $sorrendarray[$i]["nev"] = $i;
            }

            ?>

            <br/>

            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
</div>
            <div class="col-sm-12">

            <?php echo lan('rovidleiras'); ?>:
            <?php $form->kcebox("hir", $Text_Class->htmlfromchars($adat["hir"])) ?>
            <br/>
            <?php echo lan('leiras'); ?>: <?php $form->kcebox("hir2", $Text_Class->htmlfromchars($adat["hir2"])) ?>

            </div>
<div class="col-sm-6">
<?= lan('ar')?>
            <?php echo lan('első ora'); ?>: <?php $form->numbox("elso", $adat["elso"]) ?>
            <br/>
            <?php echo lan('ora'); ?>: <?php $form->numbox("ora", $adat["ora"]) ?>
            <br/>
            <?php echo lan('videk'); ?>: <?php $form->numbox("videk", $adat["videk"]) ?>
            <br/>
            <?php echo lan('kiallas'); ?>: <?php $form->numbox("kiallas", $adat["kiallas"]) ?>
</div>
<div class="col-sm-6">
    <?= lan('parameterek')?>
    <?php echo lan('ev'); ?>: <?php $form->numbox("ev", $adat["ev"]) ?>
    <br/>
    <?php echo lan('szin'); ?>: <?php $form->textbox("szin", $adat["szin"]) ?>
    <br/>
    <?php echo lan('szem'); ?>: <?php $form->numbox("szem", $adat["szem"]) ?>
    <br/>
</div>
<div class="col-sm-12">


            <img src="<?php echo($nimg); ?>">
            <br/>
            <input id="photo" name="photo" type="file">


    <br/>
    <?php echo $lan['status']; ?>:<?php
    $form->selectboxeasy2("status", $carstatus,   $adat["status"], "status");
    ?>

</div>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success"><?php echo $lan['save']; ?> <i class="fa fa-arrow-right"></i></button>

            </div>
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