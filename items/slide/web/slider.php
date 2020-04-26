
<?php
$form=new formobjects();
$upload_Class=new file_upload();
$banner_folder="uploads/slider/";

//$slider=$class_slider->get($_GET);

if ($_POST){
	//arraylist($_POST);
    $_POST["description"]=$TextClass->htmltochars($_POST["description"]);
    $_POST["name"]=$TextClass->htmltochars($_POST["name"]);
    $retval=$class_slider->insert($_POST);
	if ($_POST["id"])
		{
			$filters["id"]=$_POST["id"];
		}
		else
		{
			$filters["id"]=$retval;
		}
		//banner méretének keresése
	/*	foreach ($bannersizes as $bs)
		{
		if ($bs['id']==$_POST["size"])$abs=$bs;	
		}*/
//		echo '<br>'.$_POST["size"].'<br>';
//		arraylist($abs);	
		if ($_FILES['file']['name']){
			//delfile($homeurl.$banner_folder.'b'.$filters["id"].'.jpg');
			//delfile($homeurl.$banner_folder.'b'.$filters["id"].'.png');

		$target=$upload_Class->uploadfile('file',$banner_folder,'b'.$filters["id"]);	
	    //echo $target;
		//$upload_Class->uploadimg('file',$banner_folder,'b'.$filters["id"],$abs['x'],$abs['y'],true,true,true);
		//$target=$banner_folder.$target;
		$class_slider->update(array('imgurl'=>$target,'id'=>$filters["id"]));
		}
}
else{
$filters["id"]=$getparams[2];
}


if ($filters["id"]>0){
	$filters["status"]="all";
	$banners=$class_slider->get($filters);
	$data=$banners['datas'][0];

}
//arraylist($banners);


?>
<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php 
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
  
  <div class="col-md-9 col-sm-8 ">
<form method="post" enctype="multipart/form-data">
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> Slider
                </div>
              </div>
				<?php $Form_Class->hiddenbox('id',$data["id"]);?>
              <div class="widget-body">
                <div class="form-group">
                </div>
                <div class="form-group">
				<?php $Form_Class->textbox('name',$TextClass->htmlfromchars($data["name"]),'name');?>
                </div>

                <div class="form-group">
				<?php $Form_Class->textbox('imgurl',$data["imgurl"],'imgurl');?>
                </div>
                <div class="form-group">
				<?php $Form_Class->textbox('url',$data["url"],'url');?>
                </div>                
				<div class="form-group">
				<?php $Form_Class->textaera('description',$TextClass->htmlfromchars($data["description"]),'description');?>
                </div>                
                <div class="form-group">
				<?php $Form_Class->selectboxeasy('sorrend',$sorrend,$data["sorrend"],'Order num');?>
                </div>           
                <div class="form-group">
				<?php $Form_Class->selectboxeasy('status',$status,$data["status"],'status');?>
                </div>
                     <div class="form-group">
                    <label>Válassz egy file-t</label><input name="file" type="file" /> (1220x435 jpg) 
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
<?php $class_slider->printbanner($data); ?>
 </div>
             
</form>

<script>
var CKfBUrl='<?php echo $homeurl;?>/scripts/ckfinder/ckfinder.html';

		CKEDITOR.replace('description', {
			filebrowserBrowseUrl : CKfBUrl,
			customConfig : '',
			toolbar : [ 
	['Source','-','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SelectAll','RemoveFormat'],
	['Undo','Redo','-','Find','Replace'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Maximize','ShowBlocks'],
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Format','Font','FontSize'],['TextColor','BGColor'],  
	['Link','Unlink','Anchor'],['NumberedList','BulletedList']
]
		});

</script>
        
      </div>
 </div>