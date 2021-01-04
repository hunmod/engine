<?php
if ($adat["status"]<1)$adat["status"]=2;
?>
<div class="container">
    <div class="col-sm-12">

        <h1><?= $menudatcim.lan('kategoriaedit');?></h1>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('catpost', '1'); ?>
            <?php //$Form_Class->hiddenbox('nimg', ''); ?>

            <div class="form-group">
                <div class="col-sm-12"><strong><?php echo lan("headerpic"); ?></strong></div>
                <div class="col-sm-12">
                    <div class="image-editor">
                        <img src="<?php echo ($homeurl.'/'.$nimg);?>">
                        <br />
                        <input id="photo" name="photo" type="file" >
                        <!--input type="file" class="cropit-image-input">

                        <div class="cropit-preview"></div>
                        <div class="image-size-label"><?= lan("imageresize"); ?></div>
                        <input type="range" class="cropit-image-zoom-input">
                         button class="rotate-ccw">Rotate counterclockwise</button>
                        <button class="rotate-cw">Rotate clockwise</button -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <?php $Form_Class->textbox("id", $Text_Class->htmlfromchars($adat["id"]),'ID'); ?>
            <?php $Form_Class->textbox("ar", $Text_Class->htmlfromchars($adat["ar"]),lan('priece')); ?>
            <?php $Form_Class->selectbox2("kat",$katmenu,array('value'=>'id','name'=>'nev'),$adat["kat"],lan("rootkat"));?>
            <?php $Form_Class->selectboxeasy2("status", $category_class->status(), $adat["status"], lan("status")); ?>
            <?php echo lan('sorrend'); ?>:
            <?php  $form->selectboxeasy2("sorrend", $sitessorrend, $adat["sorrend"], "sorrend"); ?>


            <div class="bootstrap-tabs" data-tab-set-title="mmt">
                <ul class="nav nav-tabs" role="tablist"><!-- add tabs here -->
                    <?php foreach ($avaibleLang as $alan){?>
                    <li <?php if($_SESSION['lang']==$alan){echo 'class="active" ';}?>role="presentation"><a aria-controls="mmt-tab-<?= $alan?>" class="tab-link" data-toggle="tab" href="#mmt-tab-<?= $alan?>" role="tab"><?= lan('text')." ".$alan?></a></li>
                    <?php
                    }
                    ?>
                </ul>

                <div class="tab-content"><!-- add tab panels here -->

                    <?php
                    foreach ($avaibleLang as $alan){?>
                    <div class="tab-pane <?php if($_SESSION['lang']==$alan){echo 'active';}?>" id="mmt-tab-<?= $alan?>" role="tabpanel">
                        <div class="tab-pane-content">
                            <div class="clearfix"></div>
                            <?php $Form_Class->textbox($alan.'[nev]', $Text_Class->htmlfromchars($adat[$alan]["nev"]),lan('nev').' '.$alan); ?>
                            <?php $Form_Class->kcebox($alan.'[leiras]', $Text_Class->htmlfromchars($adat[$alan]["leiras"]),lan('leiras').' '.$alan,array('minimal'=>'minimal')); ?>
                            <?php $Form_Class->kcebox($alan.'[leirash]', $Text_Class->htmlfromchars($adat[$alan]["leirash"]),lan('hosszuleiras').' '.$alan); ?>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>


            <br/>

            <p>
                <button type="submit" class="button enterButton"><?php echo lan('save'); ?> <i
                        class="fa fa-arrow-right"></i></button>
            </p>
        </form>


        <?php
        if ($hirid != '') {
            $getparams[2] = $hirid;
            include('items/files/web/list2.php');
            ?>


            <a href="<?php echo str_replace('admin.', "", $homeurl) . "cat/hir/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    Page preview
                </div>
            </a>

        <?php } ?>

    </div>

</div>