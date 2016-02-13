<?php $form=new formobjects();?>

<h1>Oldal beállításai</h1>
    <form id="form_title" name="form_title" method="post" action="">

				<?php $form->textbox('max_job_perpage',page_settings("max_job_perpage"),'Maximális hirdetés egy oldalon');?>
 				<?php $form->textbox('max_user_perpage',page_settings("max_user_perpage"),'Maximális user egy oldalon');?>               
 				<?php $form->textbox('user_activity_req',page_settings("user_activity_req"),'Felhasználói profil aktív napok száma');?>               


                
    <input name="" type="submit" value="Save" />
        </form>
