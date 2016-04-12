<?php


?>
<div class="container">
    <!--section class="col-md-9 col-sm-8"-->
    <section class="col-md-12 col-sm-12">

<form method="post">
    <?php //arraylist($status);?>
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span>Tag
                </div>
              </div>
              <div class="widget-body">
              	<?php $form->hiddenbox('id',$data["id"]);?>

                <div class="form-group">
				<?php $form->textbox('name',$data["name"],'name');?>
                </div>
                <div class="form-group">
				<?php $form->selectbox('status',$status,array('value'=>'id','name'=>'nev'),$data["status"],'status');?>
                </div>
               </div>  
             </div>
           </div>
    <div class="control-group info no-margin">
        <div class="controls">
          <button id="contact-submit" type="submit" class="btn btn-primary pull-right" data-original-title="">Ment</button>
          <div class="clearfix"></div>
        </div>
      </div>
</form>
        </section>   
  <!--section class="col-md-3 col-sm-4" >
  <?php //include("items/user/web/widget_user_menu.php");?>
   </section-->
</div>
