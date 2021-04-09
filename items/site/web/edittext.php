<script>
    $('document').ready(function () {

    });
</script>

<div class="container">
    <div class="col-sm-12">
        <h1><?= lan('siteedit');?></h1>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php $Form_Class->hiddenbox('nimg', ''); ?>
            <div class="form-group">

                <div class="col-sm-12"><strong><?php echo $lan["profimg"]; ?></strong></div>
                <div class="col-sm-12">
                    <img src="<?php echo($nimg); ?>">
                    <br/>
                    <input id="photo" name="photo" type="file">

                    <!-- div class="image-editor">
                        <input type="file" class="cropit-image-input">

                        <div class="cropit-preview"></div>
                        <div class="image-size-label"><?= lan("imageresize"); ?></div>
                        <input type="range" class="cropit-image-zoom-input">
                        <button class="rotate-ccw">Rotate counterclockwise</button>
                        <button class="rotate-cw">Rotate clockwise</button -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
            <?php echo lan('menu');
            if (!isset($menustart)) $menustart = '0';
            /*$filtersm["modul"]="hirek";*/
           // $filtersmx["jog"] = "5";
            $MenuClass2 = new menu();
           // var_dump($menustart);

            $menudata=$MenuClass2->menu_selectboxfilter($menustart, array(), $filtersmx);
//var_dump($menudata);
            ?>:

            <?php 
			$Form_Class->selectbox2("mid", $menudata, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>
            <?php echo lan('sorrend'); ?>:
            <?php  $form->selectboxeasy2("sorrend", $sitessorrend, $adat["sorrend"], "sorrend"); ?>
            <?php echo lan('status'); ?>:
            <?php  $form->selectboxeasy2("status", $sitestatus, $adat["status"], lan('status')); ?>
            <?php $form->hiddenbox('jsondatas' , $Text_Class->htmlfromchars($adat["jsondatas"])); ?>

            <div class="clear">
            </div>

            <div class="bootstrap-tabs" data-tab-set-title="mmt">
                <ul class="nav nav-tabs" role="tablist"><!-- add tabs here -->
                    <?php foreach ($avaibleLang as $alan){?>
                        <li <?php if($_SESSION['lang']==$alan){echo 'class="active" ';}?>role="presentation"><a aria-controls="mmt-tab-<?= $alan?>" class="tab-link" data-toggle="tab" href="#mmt-tab-<?= $alan?>" role="tab"><?= lan('text')." ".$alan?></a></li>
                        <?php
                    }
                    ?>
                </ul>

            <div class="tab-content"><!-- add tab panels here -->
                    <?php foreach ($avaibleLang as $alan){ ?>
                <div class="tab-pane <?php if($_SESSION['lang']==$alan){echo 'active';}?>" id="mmt-tab-<?= $alan?>" role="tabpanel">

                <?php $steplang = $alan; ?>
                        <?php $form->textbox($steplang . "[title]", $Text_Class->htmlfromchars($adat[$steplang]["title"]), lan('cím').' '.lan($alan)) ?>
                        <?php $form->textaera($steplang . "[leadtext]", $Text_Class->htmlfromchars($adat[$steplang]["leadtext"]), lan('bevezeto').' '.lan($alan)) ?>
                        <?php $form->kcebox($steplang . "[longtext]", $Text_Class->htmlfromchars($adat[$steplang]["longtext"])) ?>
                        <?php //$form->kcebox($steplang . "[included]", $Text_Class->htmlfromchars($adat[$steplang]["included"])) ?>
                </div>

                    <?php } ?>
            </div>
            </div>

    <br/>
    <p>
        <button type="submit" class="button enterButton"><?php echo $lan['save']; ?> <i
                class="fa fa-arrow-right"></i></button>
    </p>


        </form>


        <?php
        //arraylist($adat);
        if ($hirid > 0) {
            $getparams[2] = $hirid;
            include('items/files/web/list2.php');
            ?>
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "site/site/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    <?= lan('preview')?>
                </div>
            </a>

        <?php }
        ?>

    </div>
</div>