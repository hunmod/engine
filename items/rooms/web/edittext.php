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
    .lerningfield {
        position: relative;
    }
    .lerningfield div {
        position: absolute;
        background-color: #FFF;
        border: solid 1px #000000;
        padding-top: 10px;
    }
    .lerningfield div span {
        display: block;
        cursor: pointer;
    }
    .lerningfield div span:hover {
        background-color: #CCC;
    }
    .jobform .col1 .inner, .jobform .col2 .inner, .jobform .col2 {
        overflow: visible;
    }
    #blogtag {
        margin-left: 10px;
        width: 65%;
    }
    #blogtagsl {
        margin-top: 10px;
        max-height: 200px;
        overflow: auto;
        display: none;
        padding: 10px;
        min-width: 250px;
        padding: 3px 10px 5px 10px;
        height: auto;
        line-height: 30px;
        font-size: 18px;
        color: #7c7c7c;
        font-family: 'robotolight';
    }
    .aclist {
        display: block;
        position: absolute;
        background: #FFF;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.7);
        width: 150px;
    }
    .aclist span {
        display: block;
    }
    .aclist span:hover {
        cursor: pointer;
        background: #CCC;
    }
</style>
<div class="container">
    <div class="col-sm-12">
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>

            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
            <?php echo $lan['maxroom']; ?>:
            <input name="maxroom" id="maxroom" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["maxroom"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['priece']; ?>:
            <input name="priece" id="priece" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["priece"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['tip']; ?>:
            <input name="tip" id="tip" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["tip"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['guestbad']; ?>:
            <input name="guestbad" id="guestbad" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["guestbad"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['roomnum']; ?>:
            <input name="roomnum" id="roomnum" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["roomnum"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['bathroom']; ?>:
            <input name="bathroom" id="bathroom" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["bathroom"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['kitchen']; ?>:
            <input name="kitchen" id="kitchen" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["kitchen"]); ?>"
                   maxlength="200"/><br/>
            <?php echo $lan['connectedservices']; ?>:
            <input name="connectedservices" id="connectedservices" type="text" value="<?php echo $Text_Class->htmlfromchars($adat["connectedservices"]); ?>">

<div class="clear">
</div>
<div class="step1">
    <?php $steplang="hu" ;?>
    <?php $form->textbox($steplang."[title]", $Text_Class->htmlfromchars($adat[$steplang]["title"]),'cím') ?>
    <?php $form->textaera($steplang."[leadtext]", $Text_Class->htmlfromchars($adat[$steplang]["leadtext"]),'bevezető') ?>
    <?php $form->kcebox($steplang."[longtext]", $Text_Class->htmlfromchars($adat[$steplang]["longtext"])) ?>
    <?php $form->kcebox($steplang."[included]", $Text_Class->htmlfromchars($adat[$steplang]["included"])) ?>

</div>

            <img src="<?php echo($nimg); ?>">
            <br/>
            <input id="photo" name="photo" type="file">


            <br/>
            <?php echo $lan['publicdate']; ?>:
            <input size="16" type="text" value="<?php echo($adat["ido"]); ?>" readonly class="form_datetime" name="ido"
                   id="ido">

            <p>
                <button type="submit" class="button enterButton"><?php echo $lan['save']; ?> <i
                        class="fa fa-arrow-right"></i></button>
            </p>
        </form>


        <?php
        if ($hirid > 0) {
            $getparams[2] = $hirid;
            include('items/files/web/list.php');

            ?>
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "room/room/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    Page preview
                </div>
            </a>

        <?php }
        arraylist($_POST);
        ?>

    </div>
    <!--div class="col-md-3 col-sm-4">
</div-->
</div>