<?php

$form=new formobjects();
$status=$place_class->status();
$tipus=$place_class->tipus();



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
<section class="col-md-9 col-sm-8" >
<h1>Diétás boltok, vendéglátóegységek, szálláshelyek... listája</h1>
<div>
Helyet keresel ahol biztonságosan vásárolhatsz, vagy csak ennél valamit, de nem tudod van e a közleben olyan hely ahol nem néznek UFO-nak ha gluténmentes, laktózmentes vagy cukormentes kaját kérsz?<br /><br />

Ha találtál egy jó helyet és szívesen megosztanád velünk <a href="<?php echo $homeurl.$separator."".$getparams[0]."/edittext";?>" >ITT</a> megteheted.<br />
A feltöltélteshez be kell <span onclick="javascript:login();">lépned</span>, ha még nem <span onclick="javascript:reg();">regisztrál</span>tál pár másodperc alatt megteheted.<br />

</div>
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
					<?php //$form->hiddenbox('q',$_GET["q"]);?>
					<?php $form->textbox('nev',$_GET["nev"],'name',"sr-only");?>
                  </div>
					<?php if ($auser["jog"]>=3){?>
                  <div class="form-group">
					<?php  $form->selectboxeasy2("status",$status,$_GET["status"],"status");?>
                  </div>  
                  <?php } ?>
                  <div class="form-group">

<?php $Form_Class->selectbox2("varos",$citys['datas'],array('value'=>'city_id','name'=>'city_name'),$adat["varos"],"Város");?>                  
                  </div>  
                  
                  <div class="form-group">
					<?php  $form->selectboxeasy2("tipus",$tipus,$_GET["tipus"],"tipus");?>
                  </div>  
                  <button type="submit" class="btn btn-success" data-original-title=""><?php echo $lan['search'];?></button>
                </form>
              </div>
            </div>
          </div>

</div>  

<?php if ($auser["id"]>0){?>
                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/edittext";?>" class="btn btn-success">
                    Új hely
                    </a>
<?php }?>

<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>Lista<br />
                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:5%">Id</th>
                        <th style="width:65%">Név</th>
                        <th style="width:5%">Cím</th>
                        <?php if ($auser["jog"]>=3){?>
                        <th style="width:5%" class="hidden-phone">Status</th>
						<?php } ?>
                        <th style="width:5%" class="hidden-phone">Tipus</th>
                        <?php if ($auser["jog"]>=3){?>
                        <th style="width:10%" class="hidden-phone">Actions</th>
						<?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
					if (($hirekelemek))foreach ($hirekelemek as $data){?>


                      <tr class="gradeX">
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['nev']; ?></td>
                        <td><?php echo $data['varos_nev']; ?>,<?php echo $data['cim']; ?> <?php echo $data['hsz']; ?></td>                       <?php if ($auser["jog"]>=3){?>
                        <td><?php echo $status[$data['status']]; ?></td>
                        <?php } ?>
                        <td><?php echo $tipus[$data['tipus']]; ?></td>
                        <?php if ($auser["jog"]>=3){?>

                        <td class="hidden-phone">
                          <a href="<?php echo $server_url.$separator."".$getparams[0]."/edittext/".encode($data['id']);?>" class="actions-icons">
                            <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                          </a>
                        </td>
                         <?php } ?>
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
  <section class="col-md-3 col-sm-4" >
  
<?php include("items/user/web/widget_user_menu.php");?>
  
  </section>                   
                  
                </div>

        <!-- Row end -->