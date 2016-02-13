<?php
$Sys_Class=new sys();
$form=new formobjects();

if ($_POST){
$Sys_Class->save_list('tags',$_POST);
$filters["id"]=$_POST["id"];
}

$status=array('null'=>'','2'=>'Active','4'=>'Deleted');

if ($getparams[2]>0)
{
	$filters["id"]=$getparams[2];
	$filters2["sub"]=$getparams[2];	
}

if ($filters["id"]>0){
	$datas=$Sys_Class->get_list('tags',$filters);

}
$data=$datas[0];
//arraylist($data);


?>
<div class="container">
    <section class="col-md-9 col-sm-8">

<form method="post">

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
				<?php $form->selectboxeasy('status',$status,$data["status"],'status');?>
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
  <section class="col-md-3 col-sm-4" >
  
<?php include("items/user/web/widget_user_menu.php");?>
  
  </section>  
</div>
