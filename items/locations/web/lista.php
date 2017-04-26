<?php
$form=new formobjects();



//$users=$jobclass->get_users(array());

/*
if ($_GET['dwork']>0){
$class_recipe->save_list('cuisine',array("id"=>$_GET['dwork'],'status'=>'4'));
}
$datas=$class_recipe->get_list('cuisine',array());

*/
//arraylist($menuk);
?>
<div class="container">  
<section class="col-sm-12" >
<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span> <?= lan('search');?>
                </div>
              </div>
              <div class="widget-body">
                <form class="form-inline" role="form">
                  <div class="form-group">
					<?php //$form->hiddenbox('q',$_GET["q"]);?>
					<?php $form->textbox('name',$_GET["name"],'name',"sr-only");?>
                  </div>
                  <div class="form-group">
					<?php  $form->selectboxeasy2("status",$eventtatus,$_GET["status"],"status");?>
                  </div>  
                  
                  <div class="form-group">
					<?php //$Form_Class->selectbox2("mid",$menuk,array('value'=>'id','name'=>'nev'),$_GET["mid"],"Menu");?>
                  </div>  
                  <button type="submit" class="btn btn-success" data-original-title=""><?= lan('search');?></button>
                </form>
              </div>
            </div>
          </div>

</div>  

                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/edittext";?>" class="btn btn-success">
                        <?= lan('newevent');?>
                    </a>
<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span><?= lan('events');?><br />

                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:5%">Id</th>
                        <th style="width:20%"><?= lan('city');?></th>
                        <th style="width:20%"><?= lan('nev');?></th>
                        <th style="width:20%"><?= lan('date');?></th>
                        <th style="width:65%"><?= lan('leadtext');?></th>

                        <th style="width:5%" class="hidden-phone"><?= lan('status');?></th>

                        <th style="width:10%" class="hidden-phone"><?= lan('actions');?></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
					if (($hirekelemek))foreach ($hirekelemek as $data){?>
                        <?php
                        if($data["city"]>0) {
                            $cfiltersd['id'] = $data["city"];
                            $vcity = $location_class->get_city($cfiltersd);
                            //arraylist($vcity);
                            $data['city_name']=$vcity['datas'][0]['city_name'];
                        }
                        ?>

                      <tr class="gradeX">
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['city_name']; ?></td>
                        <td><?php echo $data['title']; ?></td>
                        <td><?php echo $data['fromdate']; ?>-<?php echo $data['todate']; ?></td>
                        <td><?php echo $data['leadtext']; ?></td>
                        <td class="hidden-phone"><?php echo $eventtatus[$data['status']]; ?></td>

                        <td class="hidden-phone">
                          <a href="<?php echo $server_url.$separator."".$getparams[0]."/edittext/".encode($data['id']);?>" class="actions-icons">
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
                  
                                <nav class="text-center">
                                    <ul class="pagination">
                                        <li>
   <a href="<?php echo $server_url.$separator.$myparams."page=0"; ?>" aria-label="first">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                            </a>
                                        </li>
                                        <li>
   <a href="<?php echo $server_url.$separator.$myparams."page=".($oldal-1); ?>" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                            </a>
                                        </li>


                    
<?php for ($c=0;$c<=$oldalakszama-1;$c++){
	$selc= '';
	if ($oldal==$c)$selc='class="active"';
?>
   <li> <a href="<?php echo $server_url.$separator.$myparams."&page=".$c; ?>" <?php echo $selc; ?> ><?php echo $c+1;?></a></li>
<?php	
}
?>
                                        <li>
    <a href="<?php echo $server_url.$separator.$myparams."&page=".($oldal+1); ?>" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                          </a>
                                        </li>
                                        <li>
    <a href="<?php echo $server_url.$separator."&page=".($oldalakszama-1); ?>" aria-label="Last">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                            </a>
                                        </li>    
                                      </ul>
                                </nav>

</section>   
                </div>

        <!-- Row end -->