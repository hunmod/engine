<script>
    var savecomplete = 0;
    function deltag(id) {
        var res = $("#blog_tags").val().split(",");
        $("#blog_tags").val("");
        res.forEach(function (entry) {
            if (entry != id && entry != '') {
                $("#blog_tags").val($("#blog_tags").val() + ',' + entry);
            }
            $("#s" + id).remove();
        });

    }


    $('documentd').ready(function () {

        $('#blogtag').on('mouseover', function () {
            savecomplete = 0;
        });
        /*$('#blogtag').on('mousemove', function() {
         savecomplete=0;
         });	*/
        $('#blogtag').on('focusin', function () {
            savecomplete = 0;
        });

        $('#blogtag').on('keyup', function () {
            savecomplete = 0;
            posbtag();
            loadblogajax()
        });
        $('#blogtag').on('click', function () {
            savecomplete = 0;
            posbtag();
            loadblogajax();

        });
        $("#blogtag").keypress(function (e) {
            if (e.which == 13) {
                $("#blogtagsl").hide();
                saveblogajax();
                return false;

            }
        });


        /*	$('#blogtag').on('focusout', function() {
         $("#blogtagsl").hide();
         window.setTimeout(tagsave,5000);
         if (savecomplete==1){
         saveblogajax();
         }
         });	*/

        $("#blogtag").mouseleave(function () {
            $(this).hide();
            //onclick="selecttag(27,'alkalmazkodóképesség')"


        });


    });

    //AdAddForm
    //savebtn
    /*	$('#savebtn').on('click', function() {
     var myForm = $('#AdAddForm');
     if (!$myForm.checkValidity())
     {
     $(myForm).submit();
     }
     //$('#AdAddForm').submit();
     });
     */
    function tagsave() {

    }
</script>
<style>
    #blog_tagsshow span {
        padding: 0 5px;
        margin-right: 5px;
        background: #CCC;
        cursor: pointer;

    }
    .aclist span {
        display: block;
    }

    .aclist span:hover {
        cursor: pointer;
        background: #CCC;
    }

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

    input, .export {
        display: block;
    }

    button {
        margin-top: 10px;
    }
	
.checkbox-addonservice {
	margin-left: 0px;
}	

</style>
<script>
    $(document).ready(function () {

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
</script>
<div class="container">
    <div class="col-sm-12">
        <h1><?= lan('roomaedit');?></h1>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <?php $Form_Class->hiddenbox('nimg', ''); ?>
            <div class="form-group">
                <div class="col-sm-12"><strong><?php echo $lan["profimg"]; ?></strong></div>
                <div class="col-sm-12">
                    <div class="image-editor">
                        <input type="file" class="cropit-image-input">

                        <div class="cropit-preview"></div>
                        <div class="image-size-label"><?= lan("imageresize"); ?></div>
                        <input type="range" class="cropit-image-zoom-input">
                        <!-- button class="rotate-ccw">Rotate counterclockwise</button>
                        <button class="rotate-cw">Rotate clockwise</button -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
            <?php echo lan('maxroom'); ?>:
            <input name="maxroom" id="maxroom" type="text"
                   value="<?php echo $Text_Class->htmlfromchars($adat["maxroom"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['priece']; ?>:
            <input name="priece" id="priece" type="text"
                   value="<?php echo $Text_Class->htmlfromchars($adat["priece"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['priece1']; ?>:
            <input name="priece1" id="priece1" type="text"
                   value="<?php echo $Text_Class->htmlfromchars($adat["priece1"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['priece2']; ?>:
            <input name="priece2" id="priece2" type="text"
                   value="<?php echo $Text_Class->htmlfromchars($adat["priece2"]); ?>"
                   maxlength="200"/><br/>
            <?php echo lan('artipus'); ?>:
            <?php  $form->selectboxeasy2("tip", $artipus, $adat["tip"], lan('artipus')); ?><br/>
            <?php echo lan('roomsize'); ?>:
            <input name="roomsize" id="roomsize" type="number"
                   value="<?php echo $Text_Class->htmlfromchars($adat["roomsize"]); ?>"
                   maxlength="200"/> m2<br/>
            <?php echo lan('roomtip'); ?>:
            <?php  $form->selectboxeasy2("roomtip", $roomtipus, $adat["roomtip"], lan('roomtip')); ?><br/>
            <?=  lan('guestbad'); ?>:
            <input name="guestbad" id="guestbad" type="number"
                   value="<?php echo $Text_Class->htmlfromchars($adat["guestbad"]); ?>"
                   maxlength="200"/><br/>
            <?=  lan('childbad'); ?>:
            <input name="childbad" id="childbad" type="number"
                   value="<?php echo $Text_Class->htmlfromchars($adat["childbad"]); ?>"
                   maxlength="200"/><br/>
            <?= lan('roomnum'); ?>:
            <input name="roomnum" id="roomnum" type="number"
                   value="<?php echo $Text_Class->htmlfromchars($adat["roomnum"]); ?>"
                   maxlength="200"/><br/>
            <?php echo lan('bathroom'); ?>:
            <input name="bathroom" id="bathroom" type="text"
                   value="<?php echo $Text_Class->htmlfromchars($adat["bathroom"]); ?>"
                   maxlength="200"/><br/>
            <?php echo lan('kitchen'); ?>:
            <input name="kitchen" id="kitchen" type="text"
                   value="<?php echo $Text_Class->htmlfromchars($adat["kitchen"]); ?>"
                   maxlength="200"/><br/>
            <?php echo lan('sorrend'); ?>:
            <?php  $form->selectboxeasy2("sorrend", $sorrend, $adat["sorrend"], "sorrend"); ?>
            <?php echo lan('status'); ?>:
            <?php  $form->selectboxeasy2("status", $roomstatus, $adat["status"], lan('status')); ?>

            <?php $form->hiddenbox('connectedservices' , $Text_Class->htmlfromchars($adat["connectedservices"])); ?>

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


            <img src="<?php echo($nimg); ?>">
            <br/>
            <input id="photo" name="photo" type="file">


            <br/>
            <?php include('./items/cat/web/catform_1.php') ?>
            <hr>
            <div>
                <?php /*echo lan('services'); ?>:

                <?php foreach ($szobahoztartozhat as $hat) {
                    $value=0;
                    if($adat['services'][$hat])$value=1;
					$caption=hotelicon_print($hat, 50, 'fekete');
					//$caption=lan($hat);
                    $form->checkbox('services['.$hat.']',$value,$caption,$class="checkbox-addonservice");
                } ?>
            </div>
            <div>
                <?php echo lan('wellnes'); ?>:
                <?php foreach ($szobahoztartozhatw as $hat) {
                    $value=0;
                    if($adat['wellnes'][$hat])$value=1;
					$caption=hotelicon_print($hat, 50, 'fekete');
					//$caption=lan($hat);
                    $form->checkbox('wellnes['.$hat.']',$value,$caption,$class="checkbox-addonservice");
                } ?>
            </div>
            <div>
                <?php echo lan('foglalasinfok'); ?>:
                <?php foreach ($szobahoztartozhatf as $hat) {
                    $value=0;
                    if($adat['foglalasinfok'][$hat])$value=1;
					$caption=hotelicon_print($hat, 50, 'fekete');
					//$caption=lan($hat);
                    $form->checkbox('foglalasinfok['.$hat.']',$value,$caption,$class="checkbox-addonservice");
                } */?>
            </div>
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