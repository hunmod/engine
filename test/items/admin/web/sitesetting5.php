<?php

$css_array=dirlist("styl");
foreach ($css_array as $cssfld)
{
$css_liste["id"]=$cssfld;
$css_liste["nev"]=$cssfld;
$css_list[]=$css_liste;
}


?>
<div class="container">
<h1>Site setting</h1>
    <!--section class="col-md-9 col-sm-8"-->
    <section class="col-md-12 col-sm-12">

    <form id="form_title" name="form_title" method="post" action="">

				<?php $Form_Class->textbox('form_Keywords',page_settings("form_Keywords"),'Kulcsszavak (Keywords)');?>
 				<?php $Form_Class->textbox('title',page_settings("title"),'title (Description)');?>               
 				<?php $Form_Class->textbox('description',page_settings("description"),'description');?>               
 				<?php $Form_Class->textbox('start_page_'.$_SESSION["lang"],page_settings('start_page_'.$_SESSION["lang"]),'Kezdő oldal ('.$_SESSION["lang"].')');?>               

			<?php
$rootmenu_array=$MenuClass->menu_selectbox(0,array(),$filtersm,$order='',$page='all');
$rootmenu_array[]=array("nev"=>"root","id"=>"0");

$name="site_css"; 
   	 $Form_Class->selectbox($name,$css_list,array('value'=>'id','name'=>'nev'),page_settings($name),'Stíluslap');

$name="menu_root_admin"; 
   	 $Form_Class->selectbox($name,$rootmenu_array,array('value'=>'id','name'=>'nev'),page_settings($name),'Rootmenu admin');
$name="menu_root_".$_SESSION["lang"]; 
   	 $Form_Class->selectbox($name,$rootmenu_array,array('value'=>'id','name'=>'nev'),page_settings($name),'Rootmenu');


$blockmouse=array();
$blockmousee['id']=2;
$blockmousee['nev']='Yes';
$blockmouse[]=$blockmousee;


$blockmousee['id']=4;
$blockmousee['nev']='No';
$blockmouse[]=$blockmousee;

   	 $Form_Class->selectbox('blockmouse',$blockmouse,array('value'=>'id','name'=>'nev'),page_settings('blockmouse'),'Block left mouseclick');

			?>
            
            
            
            
  				<?php  /*$Form_Class->textaera('footertext',page_settings("footertext"),'Footertext');?>  
           
  				<?php $Form_Class->textaera('policytext',page_settings("policytext"),'Privacy policy');?>  
            
  				<?php $Form_Class->textaera('sitetermtext',page_settings("sitetermtext"),'Site term');?>     
                
                
  				<?php $Form_Class->textaera('contacttext',page_settings("contacttext"),'Site Contact');?>                 

  				<?php $Form_Class->textaera('advertisetext',page_settings("advertisetext"),'site advertise');?>   
                
  				<?php $Form_Class->textaera('footerblock1',page_settings("footerblock1"),'footer block1');?>                 
  				<?php $Form_Class->textaera('footerblock2',page_settings("footerblock2"),'footer block2');?>                 
  				<?php $Form_Class->textaera('footerblock3',page_settings("footerblock3"),'footer block3'); */?>                 


                            
    <input name="" type="submit" value="Save" />
        </form>
<script>
var CKfBUrl='<?php echo $homeurl;?>/scripts/ckfinder/ckfinder.html';

		CKEDITOR.replace('footertext', {
			filebrowserBrowseUrl : CKfBUrl,
			customConfig : ''
		});
		
		CKEDITOR.replace('policytext', {
			filebrowserBrowseUrl : CKfBUrl,
			customConfig : ''
		});
		CKEDITOR.replace('sitetermtext', {
			filebrowserBrowseUrl : CKfBUrl,
			customConfig : ''
		});
		
		CKEDITOR.replace('contacttext', {
			filebrowserBrowseUrl : CKfBUrl,
			customConfig : ''
		});		
		CKEDITOR.replace('advertisetext', {
			filebrowserBrowseUrl : CKfBUrl,
			customConfig : ''
		});
		CKEDITOR.replace('footerblock1', {
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
        
		CKEDITOR.replace('footerblock2', {
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
        
 		CKEDITOR.replace('footerblock3', {
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
        </section>   
  <!--section class="col-md-3 col-sm-4" >
  
<?php include("items/user/web/widget_user_menu.php");?>
  
  </section-->

</div>