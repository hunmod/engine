<?php $form=new formobjects();?>
<div class="container">
    <section class="col-sm-12">

<h1>Szociális média beállításai</h1>
    <form id="form_title" name="form_title" method="post" action="">

				<?php $form->textbox('analitics_id',page_settings("analitics_id"),'Google analitics követőkód');?>
 				<?php $form->textbox('fb_ap_id',page_settings("fb_ap_id"),'facebook ap id');?>               
 				<?php $form->textbox('fb_ap_secret',page_settings("fb_ap_secret"),'facebook ap titkos kód');?>  

 				<?php $form->textbox('fb_page_id',page_settings("fb_page_id"),'Facebook oldal azonosító');?>  
 				<?php $form->textbox('fb_page_name',page_settings("fb_page_name"),'Facebook oldal név');?>  
                
    <input name="" type="submit" value="Save" />
        </form>
        </section>   

</div>