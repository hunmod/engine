<script>
</script>
<h2><?= lan('elofoglalasikedvezmeny'); ?></h2>
<form method="post">
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[0][nap]", $elofoglalasikedvezmeny[0]['nap'],lan('nap'),'hidden' ); ?>
            </div>
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[0][szazalek]", $elofoglalasikedvezmeny[0]['szazalek'],lan('szazalek'),'hidden' ); ?>
            </div>
        </div>
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[1][nap]", $elofoglalasikedvezmeny[1]['nap'],lan('nap'),'hidden' ); ?>
            </div>
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[1][szazalek]", $elofoglalasikedvezmeny[1]['szazalek'],lan('szazalek'),'hidden' ); ?>
            </div>
        </div>
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[2][nap]", $elofoglalasikedvezmeny[2]['nap'],lan('nap'),'hidden' ); ?>
            </div>
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[2][szazalek]", $elofoglalasikedvezmeny[2]['szazalek'],lan('szazalek'),'hidden' ); ?>
            </div>
        </div>
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[3][nap]", $elofoglalasikedvezmeny[3]['nap'],lan('nap'),'hidden' ); ?>
            </div>
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[3][szazalek]", $elofoglalasikedvezmeny[3]['szazalek'],lan('szazalek'),'hidden' ); ?>
            </div>
        </div>
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[4][nap]", $elofoglalasikedvezmeny[4]['nap'],lan('nap'),'hidden' ); ?>
            </div>
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[4][szazalek]", $elofoglalasikedvezmeny[4]['szazalek'],lan('szazalek'),'hidden' ); ?>
            </div>
        </div>
        <div class="col-xs-12">
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[5][nap]", $elofoglalasikedvezmeny[5]['nap'],lan('nap'),'hidden' ); ?>
            </div>
            <div class=" col-xs-6">
                <?php $Form_Class->textbox("elofoglalasikedvezmeny[5][szazalek]", $elofoglalasikedvezmeny[5]['szazalek'],lan('szazalek'),'hidden' ); ?>
            </div>
        </div>



    <button class="btn btn-success"><?= lan('save'); ?></button>
</form>

