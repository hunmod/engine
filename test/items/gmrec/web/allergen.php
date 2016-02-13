<?php
$class_gmrec=new gmrec();
$form=new formobjects();

if ($_POST){
$class_gmrec->save_list('allergen',$_POST);
$filters["id"]=$_POST["id"];
}

$status=array('2'=>'Active','4'=>'Deleted');

if ($getparams[2]>0)
{
	$filters["id"]=$getparams[2];
	$filters2["sub"]=$getparams[2];	
}

if ($filters["id"]>0){
	$datas=$class_gmrec->get_list('allergen',$filters);

}
$data=$datas[0];
//arraylist($data);


?>

<form method="post">
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> allergen
                </div>
              </div>
				<?php $form->hiddenbox('id',$data["id"]);?>
              <div class="widget-body">
                <div class="form-group">
				<?php $form->textbox('name',$data["name"],'name');?>
                </div>
                <div class="form-group">
				<?php $form->selectboxeasy('status',$status,$data["status"],'status');?>
                </div>
               </div>  
             </div>
            </div>
		</div>

 
    <div class="control-group info no-margin">
        <div class="controls">
          <button id="contact-submit" type="submit" class="btn btn-primary pull-right" data-original-title="">Save</button>
          <div class="clearfix"></div>
        </div>
      </div>
 </div>
             
</form>