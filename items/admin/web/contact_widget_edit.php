<?php $form=new formobjects();?>
	<section class="col-sx-12">
	<h1>Kapcsolati form beállítása</h1>
	<form id="form_title" name="form_title" method="post" action="">
	<label><?= lan("nev");?></label>
	<?php $form->textbox('c_nev',page_settings("c_nev"),'Név');?>
	<label><?= lan("cim");?></label>
	<?php $form->textbox('c_cim',page_settings("c_cim"),'Cím');?>               
	<label><?= lan("telefon");?></label>
	<?php $form->textbox('c_telefon',page_settings("c_telefon"),'Telefonszám');?>  
	<label><?= lan("mtelefon");?></label>
	<?php $form->textbox('c_mtelefon',page_settings("c_mtelefon"),'mobil');?>
	<label><?= lan("fax");?></label>
	<?php $form->textbox('c_fax',page_settings("c_fax"),'Fax');?>
	<label><?= lan("email");?></label>
	<?php $form->textbox('c_email',page_settings("c_email"),'Email');?>
	<?php $form->kcebox('c_text1',page_settings("c_text1"),'Szöveg 1');?>  
	<?php $form->kcebox('c_text2',page_settings("c_text2"),'Szöveg 2');?>  
	<?php $form->kcebox('c_text3',page_settings("c_text3"),'Szöveg 3');?>
	<input name="" class="btn btn-success" type="submit" value="Save" />
	</form>
	</section>   