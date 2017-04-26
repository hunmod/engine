<script>
    $('document').ready(function () {

    });
</script>
<style>
    /* .cropit-preview {
         background-color: #f8f8f8;
         background-size: cover;
         border: 1px solid #ccc;
         border-radius: 3px;
         margin-top: 7px;
         width:
    <?=$imgx?>
    px;
            height:
    <?=$imgy?>
    px;
        }

        .cropit-preview-image-container {
            cursor: move;
        }

        .image-size-label {
            margin-top: 10px;
        }

        input, .export {
            display: block;
        }*/

</style>
<script>
    /* $(document).ready(function () {

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
     });*/
</script>
<div class="container">
    <div class="col-sm-12">
        <h1><?= lan('eventsedit'); ?></h1>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
            <?php if (!isset($menustart)) $menustart = '0';
            $filtersm["jog"] = "5";
            ?>
            <?php /*foreach ($avaibleLang as $alan) { ?>
                <div class="col-xs-12">

                    <?php $steplang = $alan; ?>
                    <?php $form->textbox($steplang . "[title]", $Text_Class->htmlfromchars($adat[$steplang]["title"]), lan('cím') . ' ' . lan($alan)) ?>
                </div>

            <?php } */?>
            <div class="clearfix"></div>

            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php $Form_Class->hiddenbox('nimg', ''); ?>
            <div class="form-group">

                <div class="col-sm-12"><strong><?= lan('kep');?></strong></div>
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
            <div class="clear"></div>

            <?php $form->textbox('cimnev', $Text_Class->htmlfromchars($adat["cimnev"]), lan('cimnev')); ?>
            <label><?= lan('cim'); ?></label>
            <div>
                <div class="col-xs-2">
                    <?php $form->textbox('zip', $Text_Class->htmlfromchars($adat["zip"]), lan('zip'), 'hidden'); ?>
                </div>
                <div class="col-xs-4">
                    <?php $Form_Class->selectbox2("city", $citys, array('value' => 'city_id', 'name' => 'city_name'), $adat["city"], lan('city')); ?>
                </div>
                <div class="col-xs-6">
                    <?php $form->textbox('cim', $Text_Class->htmlfromchars($adat["cim"]), lan('cim'), 'hidden'); ?>
                </div>
            </div>
            <div class="clear"></div>
            <?php $form->hiddenbox('longi', $Text_Class->htmlfromchars($adat["longi"])); ?>
            <?php $form->hiddenbox('lati', $Text_Class->htmlfromchars($adat["lati"])); ?>
            <b><?= lan('esemenyideje') ?></b>
            <div class="clear"></div>

            <div class="col-xs-6">
                <?php $form->datebox('fromdate', $Text_Class->htmlfromchars($adat["fromdate"]), lan('fromdate')); ?>
            </div>
            <div class="col-xs-6">
                <?php $form->datebox('todate', $Text_Class->htmlfromchars($adat["todate"]), lan('todate')); ?>
            </div>
            <b><?= lan('rendezo') ?></b>


            <?php $form->textbox('otherdatas', $Text_Class->htmlfromchars($adat["otherdatas"])); ?>

            <?php echo lan('sorrend'); ?>:
            <?php $form->selectboxeasy2("sorrend", $sitessorrend, $adat["sorrend"], "sorrend"); ?>
            <?php echo lan('status'); ?>:
            <?php $form->selectboxeasy2("status", $sitestatus, $adat["status"], lan('status')); ?>

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
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "locations/event/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    <?= lan('preview') ?>
                </div>
            </a>

        <?php }
        ?>

    </div>
</div>
<script>
    function loadelements_citys_loc(data) {
        // console.log(data);
        // console.log(data);

        data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
        menudatas = jQuery.parseJSON(data2);
        ideglenes = $("#city").val();

        console.log(menudatas);
        // $("#itemcontainer").html('<select id="city" name="city" value="'+ideglenes+'" class="form-control"></select>');


        var midsel = document.getElementById('city');
        $.each(menudatas, function (key, value) {
            var opt = document.createElement('option');
            opt.innerHTML = value["city_name"];
            opt.value = value["city_id"];
            midsel.appendChild(opt);
        });

        $("#city").val(ideglenes);
    }
    function getjsonfromcityloc(myid='', myzip='', text='', country='', regio='') {
        var selectBox = document.getElementById("city");
        selectBox.innerHTML = "";
        $.ajax({
            type: "GET",
            url: server_url + 'service.php?q=locations/citys_data&zip=' + myzip + '&country=' + country + '&id=' + myid,
            success: function (data) {
                //  console.log(data);

                loadelements_citys_loc(data);
            }
        });
        // console.log(server_url + 'service.php?q=locations/citys_data&zip='+myzip+'&country='+country+'&id='+myid);

    }

    $('documentd').ready(function () {
        $('#zip').on('keyup',
            function () {
                if (this.value.length > 3)getjsonfromcityloc('', this.value);

            }
        );
        $('#city').on('change',
            function () {
                // console.log(this.value);
                // console.log(getjsonfromcityloc(this.value));
                //   getjsonfromcityloc(this.value);
            }
        );
        $('#zip').mask("9999", {placeholder: ''});

    });
</script>