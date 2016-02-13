<?php
/*$cuisine=$class_recipe->get_list('cuisine',array());
$cous[0]=array("name"=>'none',"code"=>"XX");
$cuisines=$cous+$cuisine;*/
//arraylist($cuisines);
$status=array();
$status=$class_ads->status();


if ($_POST["formname"]=="adsedit"){
	$postvalue=$_POST;
	$ADS_id=$class_ads->save($postvalue);
}
if (($getparams[2])>0)
{
	$getadst=$class_ads->get(array("id"=>$getparams[2],'status'=>'all'));
	//arraylist($getadst);
	$postvalue=$getadst[0];
	
	//elérhető adspos
	foreach ($adspos as $adp){
		$postvalue["adid"];
		$adsizes=explode(',',$adp['sizes']);
		
		$addadpos=0;
		foreach ($adsizes as $ads){
			if ($postvalue["adid"]==$ads)$addadpos=1;
		}
			
		if ($addadpos==1)$adspos2[]=$adp;	
	}

	//pos törlése adstól
	if ($_GET['delp']>0){
		$class_ads->save_adpos($getparams[2],$_GET['delp'],4);	
	}
	
	//adspos ads-hez
	if ($_POST["formname"]=="adspos"){
		$adspositons=$class_ads->save_adpos($getparams[2],$_POST["adpos"]);	
	}
	$adspositons=$class_ads->get_ad_pos(array("ad_id"=>$getparams[2]));	

	//lang törlése adstól
	if ($_GET['dell']!=''){
		$class_ads->save_adlang($getparams[2],$_GET['dell'],4);	
	}
		//lang ads-hez
	if ($_POST["formname"]=="adslang"){
		$adspositons=$class_ads->save_adlang($getparams[2],$_POST["lang_id"]);	
	}
	$adspositons=$class_ads->get_ad_pos(array("ad_id"=>$getparams[2]));	
	$adslangs=$class_ads->get_ad_lang(array("ad_id"=>$getparams[2]));	
	
}
?>

<div class="container"> 
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left>  
<section class="col-md-9 col-sm-8" ads >
<form method="post">
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> ADS
                </div>
              </div>

<?php
$Form_Class->hiddenbox('formname','adsedit');
$Form_Class->hiddenbox('id',$postvalue["id"]);
?>             
<div class="widget-body">
	<div class="form-group">

Size: 
<?php
$Form_Class->selectbox('adid',$bannersizes,array("value"=>"id","name"=>"nev"),$postvalue["adid"]);
?>
    </div>
    <div class="form-group">
Country: 
<?php
$Form_Class->selectbox('country',$cuisines,array("value"=>"code","name"=>"name"),$postvalue["country"]);
?>
    </div>
    <div class="form-group">
Code: 
<?php
$Form_Class->textaera('code',$postvalue["code"]);
?> *kép url-je, vagy fleshh embered kódja<br />
    </div>
    <div class="form-group">
URL: 
<?php
$Form_Class->textaera('url',$postvalue["url"]);
?>*csak kép esetén kell, berakja egy linkbe a code tartalmát
    </div>
    <div class="form-group">
Status:<?php 
				$typ["value"]="id";
				$typ["name"]="nev";
//selectbox('status',$status,$typ,$postvalue["status"])

$Form_Class->selectboxeasy2('status',$status,$postvalue["status"],'status');

?>
<br />
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
</form>
<form method="post">
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> Positions
                </div>
              </div>
<?php $Form_Class->hiddenbox('formname','adspos');?>
    <div class="form-group">
<?php
$Form_Class->selectbox2("adpos",$adspos2,array('value'=>'id','name'=>'name'),$recipe["adpos"],$caption="Select");									
?>   
	</div>

               </div>  
             </div>
		</div>
 
    <div class="control-group info no-margin">
        <div class="controls">
          <button id="contact-submit" type="submit" class="btn btn-primary pull-right" data-original-title="">Add</button>
          <div class="clearfix"></div>
        </div>
      </div>
</form>
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> ADS positions<br />
                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:65%">Name</th>
                        <th style="width:10%" class="hidden-phone">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (count($adspositons ))foreach ($adspositons as $data){?>


                      <tr class="gradeX">
                        <td><?php echo $adspos[$data['pos_id']]["name"]; ?></td>
                        <td class="hidden-phone">
                          <a href="<?php echo $server_url.$separator."".$getparams[0]."/".$getparams[1]."/".$getparams[2]."?delp=".$data['pos_id'];?>" class="actions-icons">
                           <img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash">
                          </a>

                          </a>
                        </td>
                      </tr>
                    
                    <?php ?>
                    
                    <?php }?>
                    
                    </tbody>
                  </table>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Row end -->
        
<form method="post">
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> Countries
                </div>
              </div>
<?php $Form_Class->hiddenbox('formname','adslang');?>
    <div class="form-group">
<?php
$Form_Class->selectbox2("lang_id",$cuisine,array('value'=>'code','name'=>'name'),$recipe["adpos"],$caption="Select");									
?>   
	</div>

               </div>  
             </div>
		</div>
 
    <div class="control-group info no-margin">
        <div class="controls">
          <button id="contact-submit" type="submit" class="btn btn-primary pull-right" data-original-title="">Add</button>
          <div class="clearfix"></div>
        </div>
      </div>
</form>

        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> ADS Countries<br />
                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:65%">Name</th>
                        <th style="width:10%" class="hidden-phone">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (count($adslangs ))foreach ($adslangs as $data){?>


                      <tr class="gradeX">
                        <td><?php 
						$mcuisine=$class_recipe->get_list('cuisine',array("code"=>$data['lang_id']));
						echo $mcuisine[0]["name"]; ?></td>
                        <td class="hidden-phone">
                          <a href="<?php echo $server_url.$separator."".$getparams[0]."/".$getparams[1]."/".$getparams[2]."?dell=".$data['lang_id'];?>" class="actions-icons">
                            <img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash">
                          </a>

                        </td>
                      </tr>
                    
                    <?php ?>
                    
                    <?php }?>
                    
                    </tbody>
                  </table>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Row end -->
        </section>
</div> 