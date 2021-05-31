<script>
    function selecttag(id, tag) {
        $("#blogtagsl").hide();
        $("#blogtag").val("");
        if (id > 0) {
            $("#blog_tagsshow").append('<div id="s' + id + '" class="ms-sel-item ">' + tag + '<span class="ms-close-btn" onclick="deltag(' + "'" + id + "'" + ')"></span></div>');
            $("#blog_tags").val($("#blog_tags").val() + ',' + id);
        }

    }


    function print_taglist(val) {
        $("#blogtagsl").show();
        $("#blogtagsl").append('<span onclick="selecttag(' + val.id + ',' + "'" + val.name + "'" + ')">' + val.name + '</span>');
    }

    function saveblogajax() {
        $.getJSON('' + serverurl + 'service.php?q=hirek/ajax_taglist&tag=' + $("#blogtag").val() + '&save=1', function (data) {
            if (data.length > 5) {
                //$('#tagsave').attr("disabled", "disabled");

            }
            else {
                //$('#tagsave').removeAttr("disabled");
            }
            if ($("#blogtag").val() != '') {
                $("#blogtagsl").empty();
                $.each(data, function (key, val) {
                    selecttag(val.id, val.name)
                    //print_taglist(val);
                });
            }
        });

    }

    function loadblogajax() {
        $.getJSON('' + serverurl + 'service.php?q=hirek/ajax_taglist&tag=' + $("#blogtag").val() + '', function (data) {
            $("#blogtagsl").empty();
            if (data.length > 0) {
                //$('#tagsave').attr("disabled", "disabled");
            }
            else {
                //	$('#tagsave').removeAttr("disabled");
            }
            $.each(data, function (key, val) {
                print_taglist(val);
            });
        });

    }
    function posbtag() {
        var pos1 = jQuery("#blogtag").position();
        $("#blogtagsl").css('left', pos1.left + "px");
        $("#blogtagsl").css('top', $("#blogtag").height() + "px");
        $("#blogtagsl").css('display', "block");

    }

    $(document).ready(function () {
        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });
</script>

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

            <?php 
			$Form_Class->selectbox2("mid", $menuk, array('value' => 'id', 'name' => 'nev'), $adat["mid"], "Menu"); ?>


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
            <?php echo lan('innertext'); ?>:
            <?php $form-textbox("hir", $Text_Class->htmlfromchars($adat["hir"])) ?>
            <br/>
            <?php echo lan('outertext'); ?>: <?php $form->kcebox("hir2", $Text_Class->htmlfromchars($adat["hir2"])) ?>
            <br/>
            <?php echo lan('status'); ?>:<?php
			
            $form->selectboxeasy("status", $hirstatus,  $adat["status"], "status");
            ?>
            <br/>
            <?php echo lan('sorrend'); ?>:<?php
            $form->selectboxeasy2("sorrend", $sorrend, $adat["sorrend"], "sorrend");
            ?>
            <br/>


            <img src="<?php echo($nimg); ?>">
            <br/>
            <input id="photo" name="photo" type="file">


            <br/>
            <?php echo lan('publicdate'); ?>:
            <input size="16" type="text" value="<?php echo($adat["ido"]); ?>" readonly class="form_datetime" name="ido"
                   id="ido">


            <p>
                <button type="submit" class="btn btn-success"><?php echo $lan['save']; ?> <i
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