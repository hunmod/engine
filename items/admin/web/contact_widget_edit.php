<?php $form=new formobjects();?>
	<section class="col-sx-12">
	<h1>Kapcsolati form beállítása</h1>
	<form id="form_title" name="form_title" method="post" action="">
		<?php $form->textbox('c_nev',page_settings("c_nev"),'Név');?>
		<?php $form->textbox('c_cim',page_settings("c_cim"),'Cím');?>               
		<?php $form->textbox('c_telefon',page_settings("c_telefon"),'Telefonszám');?>  
		<?php $form->textbox('c_mtelefon',page_settings("c_mtelefon"),'mobil');?>
		<?php $form->textbox('c_fax',page_settings("c_fax"),'Fax');?>
		<?php $form->textbox('c_email',page_settings("c_email"),'Email');?>
		<?php $form->kcebox('c_text1',page_settings("c_text1"),'Szöveg 1');?>  
		<?php $form->kcebox('c_text2',page_settings("c_text2"),'Szöveg 2');?>  
	<input name="" class="btn btn-success" type="submit" value="Save" />
	</form>
	</section>   