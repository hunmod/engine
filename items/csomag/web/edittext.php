<style>
    .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: <?=$imgx?>px;
        height: <?=$imgy?>px;
    }

    .cropit-preview-image-container {
        cursor: move;
    }

    .image-size-label {
        margin-top: 10px;
    }
</style>
<script>
 /*   $(document).ready(function () {

        $('form').submit(function () {
            var imageData = $('.image-editor').cropit('export', {
                type: 'image/jpeg',
                quality: .9,
                originalSize: true
            });

            document.getElementById("nimg").value = imageData;

            // Print HTTP request params
            var formValue = $(this).serialize();
            $('#result-data').text(formValue);

            // Prevent the form from actually submitting
            return true;
        });


		
		

        $('.image-editor').cropit({
            imageState: {
                src: '<?php echo $nimg;?>',
            },
        });

        $('.rotate-cw').click(function () {
            $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function () {
            $('.image-editor').cropit('rotateCCW');
        });
    });
*/
</script>
<div class="container">
    <div class="col-sm-12">
        <h1><?= lan('csomagedit'); ?></h1>

        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php $Form_Class->hiddenbox('nimg', ''); ?>
            <div class="form-group">
                <div class="col-sm-12"><strong><?php echo $lan["profimg"]; ?></strong></div>
                <div class="col-sm-12">
                    <img src="<?php echo($nimg); ?>">
                    <br/>
                    <input id="photo" name="photo" type="file">
                    <div class="clearfix"></div>
                    <!--div class="image-editor">
                        <input type="file" class="cropit-image-input">

                        <div class="cropit-preview"></div>
                        <div class="image-size-label"><?= lan("imageresize"); ?></div>
                        <input type="range" class="cropit-image-zoom-input">
                        < button class="rotate-ccw">Rotate counterclockwise</button>
                        <button class="rotate-cw">Rotate clockwise</button >
                    </div-->
                </div>
                <div class="clearfix"></div>
            </div>

            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>

            <?php //arraylist($roomslist);?>


            <div class="clearfix"></div>
            <div class="bootstrap-tabs" data-tab-set-title="mmt">
                <ul class="nav nav-tabs" role="tablist"><!-- add tabs here -->
                    <?php foreach ($avaibleLang as $alan) { ?>
                        <li <?php if ($_SESSION['lang'] == $alan) {
                            echo 'class="active" ';
                        } ?>role="presentation"><a aria-controls="mmt-tab-<?= $alan ?>" class="tab-link"
                                                   data-toggle="tab" href="#mmt-tab-<?= $alan ?>"
                                                   role="tab"><?= lan('text') . " " . $alan ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="tab-content"><!-- add tab panels here -->
                    <?php foreach ($avaibleLang as $alan) { ?>
                        <div class="tab-pane <?php if ($_SESSION['lang'] == $alan) {
                            echo 'active';
                        } ?>" id="mmt-tab-<?= $alan ?>" role="tabpanel">

                            <?php $steplang = $alan; ?>
                            <?php $form->textbox($steplang . "[title]", $Text_Class->htmlfromchars($adat[$steplang]["title"]), lan('cím') . ' ' . lan($alan)) ?>
                            <?php $form->textaera($steplang . "[leadtext]", $Text_Class->htmlfromchars($adat[$steplang]["leadtext"]), lan('bevezeto') . ' ' . lan($alan)) ?>
                            <?php $form->kcebox($steplang . "[longtext]", $Text_Class->htmlfromchars($adat[$steplang]["longtext"])) ?>
                            <?php //$form->kcebox($steplang . "[included]", $Text_Class->htmlfromchars($adat[$steplang]["included"])) ?>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>

            <div>
                <b><?= lan('valaszthatoszobak'); ?></b>
                <div class="col-sm-12">
                    <div class="col-xs-3">
                        <?=  lan("nev") ?>
                    </div>
                    <div class="col-xs-2">
                        <?=  lan("db") ?>
                    </div>
                    <div class="col-xs-2">
                        <?=  lan("priece1person") ?>
                    </div>
                    <div class="col-xs-2">
                        <?=  lan("priece2person") ?>
                    </div>
                    <div class="col-xs-3">
                        <?=  lan("artipus") ?>
                    </div>
                </div>

                <?php if ($roomslist) foreach ($roomslist as $room) { ?>
                    <div class="col-sm-12">
                        <div class="col-xs-3">
                            <?php $form->checkbox('services[rooms][' . $room['id'] . '][exist]',$adat['services']['rooms'][$room['id']]['exist'], $room['title'], $class = "checkbox"); ?>
                        </div>
                        <div class="col-xs-2">
                            <?php $form->textbox('services[rooms][' . $room['id'] . '][db]', $adat['services']['rooms'][$room['id']]['db'], lan("db"),'hidden'); ?>
                        </div>
                        <div class="col-xs-2">
                            <?php $form->textbox('services[rooms][' . $room['id'] . '][priece1]', $adat['services']['rooms'][$room['id']]['priece1'], lan("priece1person"),'hidden'); ?>
                        </div>
                        <div class="col-xs-2">
                            <?php $form->textbox('services[rooms][' . $room['id'] . '][priece2]', $adat['services']['rooms'][$room['id']]['priece2'], lan("priece2person"),'hidden'); ?>
                        </div>
                        <div class="col-xs-3">
                            <?php $form->selectboxeasy2('services[rooms][' . $room['id'] . '][tip]', $artipus, $adat["tip"], lan('artipus')); ?>
                        </div>
                        <?php $form->hiddenbox('services[rooms][' . $room['id'] . '][id]', $room['id']); ?>
                    </div>

                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <?php $form->numbox("ejszakak", $adat["ejszakak"], lan("ejszakak")); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-6">
                <?php $form->textbox("priece", $adat["priece"], lan("ar")); ?>
            </div>
            <div class="col-sm-6"><br>
                <?php $form->selectboxeasy2("tip", $artipus, $adat["tip"], lan('artipus')); ?><br/>
            </div>
            <div class="col-sm-12">
                <?php echo lan('sorrend');

                if (!$adat["sorrend"])$adat["sorrend"]=5;
                ?>:
                <?php $form->selectboxeasy2("sorrend", $csomagsorrend, $adat["sorrend"], "sorrend"); ?>
            </div>
            <div class="col-sm-12">
                <?php echo lan('status'); ?>:
                <?php $form->selectboxeasy2("status", $roomstatus, $adat["status"], lan('status')); ?>
            </div>
            <div class="col-sm-12">
               <b><?php echo lan('ervenyes'); ?>:</b>
            </div>
            <div class="col-sm-6">
                <?php $form->datebox('fromdate', $adat['fromdate'], lan("tol"),null,1); ?>
            </div>
            <div class="col-sm-6">
                <?php $form->datebox('todate', $adat['todate'], lan("ig"),null,1); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12">
               <b><?php echo lan('megjelenik'); ?>:</b>
            </div>
            <div class="col-sm-6">
                <?php $form->datebox('fromshow',$adat['fromshow'], lan("tol"),'datepicker',1); ?>
            </div>
            <div class="col-sm-6">
                <?php $form->datebox('toshow',$adat['toshow'], lan("ig"),null,1); ?>
            </div>
            <div class="clearfix"></div>
            <?php
            $filtersextcat="csomagkategoria";
            include('./items/cat/web/catform_1.php') ?>
            <div class="clearfix"></div>
            <?php
            $filtersextcat="csomagkategoria";
            include('./items/cat/web/catform_r.php') ?>

            <div class="clearfix"></div>






                <button type="submit" class="btn btn-success"><?php echo $lan['save']; ?> <i class="fa fa-arrow-right"></i></button>

        </form>


        <?php
        //arraylist($adat);
        if ($hirid > 0) {
            $getparams[2] = $hirid;
            include('items/files/web/list2.php');

            ?>
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "rooms/room/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    Page preview
                </div>
            </a>

        <?php }
        ?>

    </div>
    <!--div class="col-md-3 col-sm-4">
</div-->
</div>
<script>
       $("#fromdate,#todate,#fromshow,#toshow").datepicker({
            altFormat: "yyyy-mm-dd",
            defaultDate: "+1w",
            changeMonth: true,
            showOn: "button",
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
            firstDay: 1
		
        });
</script>