<?php
$Sys_Class=new sys();
$form=new formobjects();
$status=array('2'=>'Active','4'=>'Deleted');
//$users=$jobclass->get_users(array());

if ($_GET['dtag']>0){
$Sys_Class->save_list('tags',array("id"=>$_GET['dtag'],'status'=>'4'));
}

$datas=$Sys_Class->get_list('tags',$_GET,"all");
?>
<div class="container">
    <section class="col-md-9 col-sm-8">

<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span> Search
                </div>
              </div>
              <div class="widget-body">
                <form class="form-inline" role="form">
                  <div class="form-group">
					<?php $form->hiddenbox('q',$_GET["q"]);?>
					<?php $form->textbox('name',$_GET["name"],'name',"sr-only");?>

                  </div>
                  <div class="form-group">
				<?php $form->selectboxeasy2('status',$status,$_GET["status"],'status');?>
                  </div>  
                  <button type="submit" class="btn btn-success" data-original-title="">Search</button>
                </form>
              </div>
            </div>
          </div>

</div> 
                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/tag";?>" class="btn btn-success">
                    New tag
                    </a>   
<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>Tags<br />

                </div>
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
                          <a href="<?php echo $server_url.$separator."".$getparams[0]."/tag/".$data['id'];?>" class="actions-icons">
                            <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                          </a>
                          <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."dtag=".$data['id'];?>" class="delete-row" data-original-title="Delete">
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
        <!-- Row end -->
        </div>
        </section>   
  <section class="col-md-3 col-sm-4" >
  
<?php include("items/user/web/widget_user_menu.php");?>
  
  </section>  
        </div>
        