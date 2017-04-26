<?php


$form=new formobjects();
$status=$category_class->status();

$myparams='rooms/lista';
foreach ($_GET as $nam=>$req )
{
    if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page'&&$nam!='mr')
        $myparams.='&'.$nam.'='.$req;
}



//$users=$jobclass->get_users(array());

/*
if ($_GET['dwork']>0){
$class_recipe->save_list('cuisine',array("id"=>$_GET['dwork'],'status'=>'4'));
}
$datas=$class_recipe->get_list('cuisine',array());

*/
//arraylist($qhir);
?>
<style>
    .text{
        padding-right: 10px;
        padding-left: 10px;
    }
    .text .btn-creme-inv{
        margin-top: -8% !important;
    }
</style>
<div class="container">  
<section class="col-md-12" >
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
					<?php  $form->selectboxeasy2("status",$status,$_GET["status"],"status");?>
                  </div>  
                  
                  <div class="form-group">
					<?php $Form_Class->selectbox2("mid",$katmenu,array('value'=>'id','name'=>'nev'),$_GET["mid"],"Menu");?>
                  </div>  
                  <button type="submit" class="btn btn-success" data-original-title=""><?= lan('search');?></button>
                </form>
              </div>
            </div>
          </div>

</div>  

<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span><?= lan('categorie');?><br />

                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                    <?php 
					if (($hirekelemek))foreach ($hirekelemek as $data){?>
                        <article class="col-xs-12 oneurl">
                            <img src="<?=homeurl?><?= $category_class->getimg($data['id'],1000,300)?>" class="img-100" alt="">
                            <div class="text">
                                <h3><?php echo $data['nev']; ?></h3>
                                <div class="col-sm-8"> <?php echo $data['leiras']; ?></div>
                                <a href="<?= $category_class->createurl($data)?>" class="btn btn-creme-inv col-sm-4"><?= lan('tovabb');?></a>
                            </div>
                            <a href="<?php echo $server_url.$separator."".$getparams[0]."/edittext/".encode($data['id']);?>" class="actions-icons">
                                <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                            </a>
                            <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."dtag=".$data['id'];?>" class="delete-row" data-original-title="Delete">
                                <img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash">
                            </a>
                        </article>



                    <?php ?>
                    
                    <?php }?>
                    

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