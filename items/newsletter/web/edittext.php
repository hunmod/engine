<script>

</script>
<style>


</style>

<div class="container">
    <div class="col-sm-12">
        <h1><?= lan('newsletter'); ?></h1>
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ?>
            <div class="form-group">


                <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
                <?php $Form_Class->textaera("subj", $Text_Class->htmlfromchars($adat["subj"]), lan('subject')) ?>
                <?php $Form_Class->kcebox("msg", $Text_Class->htmlfromchars($adat["msg"]), lan('message')) ?>
                <?php $Form_Class->selectboxeasy2("status", $sparstatus, $adat["status"], lan('status')); ?>


                <div class="clear">
                </div>


            </div>
    </div>


    <p>
        <button type="submit" class="button enterButton"><?php echo $lan['save']; ?> <i
                class="fa fa-arrow-right"></i></button>
    </p>

    </form>

</div>
