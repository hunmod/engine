<div class="container">
    <div class="col-sm-12">
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php echo $lan['menu'];

            //arraylist($auser);
            if (!isset($menustart)) $menustart = '0';
            /*$filtersm["modul"]="hirek";*/
            $filtersm["jog"] = "5";

            $menuk = $MenuClass->menu_selectboxfilter($menustart, array("modul" => "hirek"), $filtersm, $order = '', $page = 'all');

            ?>:

            <?php //$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>
            <?php
            //arraylist($carskatmenu);
            $Form_Class->selectbox2("mid",$carskatmenu['datas'],array('value'=>'id','name'=>'nev'),$adat["kat"],lan("rootkat"));?>


            <?php


            for ($i = 1; $i <= 20; $i++) {
                $sorrendarray[$i]["id"] = $i;
                $sorrendarray[$i]["nev"] = $i;
            }

            ?>

            <br/>

            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
            <?php echo $lan['cim']; ?>:
            <input name="cim" id="cim" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["cim"]); ?>"
                   maxlength="200" style="  width: 217px;"/><br/>
            <?php echo $lan['innertext']; ?>:
            <?php $form->kcebox("hir", $Text_Class->htmlfromchars($adat["hir"])) ?>
            <br/>
            <?php echo $lan['outertext']; ?>: <?php $form->kcebox("hir2", $Text_Class->htmlfromchars($adat["hir2"])) ?>
            <br/>
            <?php echo $lan['status']; ?>:<?php
            $form->selectbox2("status", $status, array('value' => 'id', 'name' => 'nev'),  $adat["status"], "status");
            ?>
            <br/>
            <?php echo $lan['sorrend']; ?>:<?php
            $form->selectboxeasy2("sorrend", $sorrend, $adat["sorrend"], "sorrend");
            ?>
            <br/>
            <?php echo lan('első ora'); ?>: <?php $form->numbox("elso", $adat["elso"]) ?>
            <br/>
            <?php echo lan('ora'); ?>: <?php $form->numbox("ora", $adat["ora"]) ?>
            <br/>
            <?php echo lan('videk'); ?>: <?php $form->numbox("videk", $adat["videk"]) ?>
            <br/>
            <?php echo lan('kiallas'); ?>: <?php $form->numbox("kiallas", $adat["kiallas"]) ?>


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

</div>