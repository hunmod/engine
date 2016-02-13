<?php $form=new formobjects();?>
<div class="container">
    <section class="col-md-9 col-sm-8">

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
  <section class="col-md-3 col-sm-4" >
  
<?php include("items/user/web/widget_user_menu.php");?>
  
  </section>
</div>