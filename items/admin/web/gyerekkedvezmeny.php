<?php $form=new formobjects();?>

<h1><?= lan("fixkedvezmenyek")?></h1>
    <form id="form_title" name="form_title" method="post" action="">

		<?php $form->textbox('gyerekedvezmeny0',page_settings("gyerekedvezmeny0"),lan('gyerekedvezmeny0'));?>
        <?php  $form->selectboxeasy2("gyerekedvezmeny0_tip", $kedvezmenytipus, page_settings("gyerekedvezmeny0_tip"), lan('gyerekedvezmeny0_tip')); ?>

        <?php $form->textbox('gyerekedvezmeny1',page_settings("gyerekedvezmeny1"),lan('gyerekedvezmeny1'));?>
        <?php  $form->selectboxeasy2("gyerekedvezmeny1_tip", $kedvezmenytipus, page_settings("gyerekedvezmeny1_tip"), lan('gyerekedvezmeny1_tip')); ?>

        <?php $form->textbox('gyerekedvezmeny2',page_settings("gyerekedvezmeny2"),lan('gyerekedvezmeny2'));?>
        <?php  $form->selectboxeasy2("gyerekedvezmeny2_tip", $kedvezmenytipus, page_settings("gyerekedvezmeny2_tip"), lan('gyerekedvezmeny2_tip')); ?>

        <?php $form->textbox('gyerekedvezmeny3',page_settings("gyerekedvezmeny3"),lan('gyerekedvezmeny3'));?>
        <?php  $form->selectboxeasy2("gyerekedvezmeny3_tip", $kedvezmenytipus, page_settings("gyerekedvezmeny3_tip"), lan('gyerekedvezmeny3_tip')); ?>

                
    <input name="" type="submit" value="Save" />
        </form>
