<?php $form=new formobjects();?>
<div class="container">
    <section class="col-sm-12">

<h1>Szociális média beállításai</h1>
    <form id="form_title" name="form_title" method="post" action="">
        <label><?= lan("analitics_id");?></label>
        <?php $form->textbox('analitics_id',page_settings("analitics_id"),'Google analitics követőkód');?>
        <label><?= lan("addsense_id");?></label>
        <?php $form->textbox('addsense_id',page_settings("addsense_id"),'Google addsense követőkód');?>


        <label><?= lan("fb_page_id");?></label>
        <?php $form->textbox('fb_page_id',page_settings("fb_page_id"),'Facebook oldal azonosító');?>  
        <label><?= lan("fb_page_name");?></label>
        <?php $form->textbox('fb_page_name',page_settings("fb_page_name"),'Facebook oldal név');?>
        <a href="https://console.developers.google.com/" target="_blank">googlemaps apikey</a>
        <?php $form->textbox('google_api_key',page_settings("google_api_key"),'google API key');?>
        <input name="" type="submit" value="Save" class="btn btn-success" />
        </form>
        </section>   

</div>