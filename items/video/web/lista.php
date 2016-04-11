<?php
$_SESSION["utolso_lap"]=$_SERVER["REQUEST_URI"];
$video_class=new video();
$datasx=$video_class->get($_GET);
$datas=$datasx["datas"];
$status=array('all'=>'All','2'=>'Active','4'=>'Deleted');
$video_class=new video();
$form=new formobjects();
/*$filtersm["mid"]=19;
$qmenu=$MenuClass->get_menu($filtersm,$order='',$page='all');*/

//$filtersm["modul"]="video";
$filtersm["modul"]="video";
$qmenu=$MenuClass->menu_selectboxfilter(0,array(),$filtersm,$order='',$page='all');
//arraylist($datas);
?>

<div class="container">
  <!--left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/ads/web/widget_side1.php";
$widgets[]="items/konyha/web/widget_submenu.php";
foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left-->

  <!--section class="col-md-9 col-sm-8"-->
  <section class="col-md-12 col-sm-12">
  <div class="col-md-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title"> <span class="fs1" aria-hidden="true" data-icon=""></span> Search </div>
      </div>
 
      <div class="widget-body">
        <form class="form-inline" role="form">
          <div class="form-group">
            <?php $Form_Class->hiddenbox('q',$_GET["q"]);?>
            <?php $Form_Class->textbox('name',$_GET["name"],'name',"sr-only");?>
      </div>
      <div class="form-group">
                        <?php $form->selectbox2('mid',$qmenu,array('value'=>'id','name'=>'nev'),$data["mid"],'mid');?>
          </div>
      <div class="form-group">
			<?php $Form_Class->selectboxeasy2("status",$status,$_GET["status"],$caption="status");?>
          </div>
          <div class="form-group">
            <?php //$form->selectboxeasy2('status',$status,$_GET["status"],'status');?>
          </div>
          <button type="submit" class="btn btn-success" data-original-title="">Search</button>
        </form>
      </div>
    </div>
  </div>
<?php 
//arraylist($aprodata);
if ($auser["jogid"]==4){
?>
	<a href="<?php echo $server_url.$separator.$getparams[0]."/addvideo";?>" class="btn btn-lg btn-success">
New video</a>  
<!--a href="<?php echo $homeurl.$separator;?>video/listcat"  class="btn btn-lg btn-success">Video categories</a-->
<?php	
	}
?>  
<!-- Row start -->
<div class="row">
  <div class="col-md-12">
    <div class="widget">
      <div class="widget-header">
        <div class="title"> <span class="fs1" aria-hidden="true" data-icon=""></span> Videos </div>
      </div>
      <div class="widget-body">
        <div id="dt_example" class="example_alt_pagination">
          <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
            <thead>
              <tr>
                <th style="width:5%">Id</th>
                <th style="width:65%">Name</th>
                <th style="width:5%" class="hidden-phone">Status</th>
                <th style="width:10%" class="hidden-phone">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datas as $data){?>
              <tr class="gradeX">
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>

                <td class="hidden-phone"><?php echo $status[$data['status']]; ?></td>
                <td class="hidden-phone">
                <a href="<?php echo $server_url.$separator."".$getparams[0]."/addvideo/".$data['id'];?>" class="actions-icons"> <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons" /> </a> 
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
    </div>
  </section>