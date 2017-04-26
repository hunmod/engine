<script>

</script>


<h2><?= lan('gyerekkedvezmeny'); ?></h2>
<form method="post">
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?= lan('gyerekedvezmeny0') ?>
            </div>
            <div class=" col-xs-5">
                <?php $Form_Class->textbox("gyerekedvezmeny0", page_settings("gyerekedvezmeny0"),lan('precent'),'hidden' ); ?>
            </div>
            <div class=" col-xs-1">
                <?php $Form_Class->hiddenbox("gyerekedvezmeny0_tip", '2'); ?>
                %
            </div>
        </div>
    <div class="col-xs-12">
            <div class=" col-xs-6">
                <?= lan('gyerekedvezmeny1') ?>
            </div>
            <div class=" col-xs-5">
                <?php $Form_Class->textbox("gyerekedvezmeny1", page_settings("gyerekedvezmeny1"),lan('precent'),'hidden' ); ?>
            </div>
            <div class=" col-xs-1">
                <?php $Form_Class->hiddenbox("gyerekedvezmeny1_tip", '2'); ?>

                %
            </div>
        </div>
    <div class="col-xs-12">
            <div class=" col-xs-6">
                <?= lan('gyerekedvezmeny2') ?>
            </div>
            <div class=" col-xs-5">
                <?php $Form_Class->textbox("gyerekedvezmeny2", page_settings("gyerekedvezmeny2"),lan('precent'),'hidden' ); ?>
            </div>
            <div class=" col-xs-1">
                <?php $Form_Class->hiddenbox("gyerekedvezmeny2_tip", '2'); ?>

                %
            </div>
        </div>

    <button><?= lan('save'); ?></button>
</form>

