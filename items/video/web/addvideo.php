<?php
$video_class=new video();
$form=new formobjects();
$filtersm["modul"]="video";
$qmenu=$MenuClass->menu_selectboxfilter(0,array(),$filtersm,$order='',$page='all');
//arraylist($qmenu);
if ($_POST){
	$mit=array('watch?v=');
	$mire=array("embed/");
	$_POST["url"]=str_replace($mit,$mire,$_POST["url"]);
	
$video_class->save($_POST);	
//$data["blog_tags"]=$_POST["blog_tags"]
$filters["id"]=$_POST["id"];
}

$status=$video_class->status();

if ($getparams[2]>0)$filters["id"]=$getparams[2];
$filters["status"]='all';
if ($filters["id"]>0){
	$datas=$video_class->get($filters);
}
$data=$datas['datas'][0];
//arraylist($data);


?>
<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/ads/web/widget_side1.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
  
  <div class="col-md-9 col-sm-8 ">
<form method="post">
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> Add video
                </div>
              </div>
				<?php $Form_Class->hiddenbox('id',$data["id"]);?>
              <div class="widget-body">
                
                <div class="form-group">
				<?php $Form_Class->textbox('name',$data["name"],'name');?>
                </div>

                <div class="form-group">
				<?php $Form_Class->textbox('url',$data["url"],'Youtoube url');?>
                </div>
                 <div class="form-group">
				<?php $Form_Class->selectbox('mid',$qmenu,array('value'=>'id','name'=>'nev'),$data["mid"],'Video categories');?>
                </div>                               
                <div class="form-group">
				<?php $Form_Class->selectboxeasy('status',$status,$data["status"],'status');?>
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
 </div>
             
</form>

      </div>
 </div>