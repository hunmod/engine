<?php

$form=new formobjects();
$status=$bf_class->status();
/*
foreach ($_GET as $nam=>$req )
{
    if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page'&&$nam!='mr')
if  ($myparams==''){$myparams.='?'.$nam.'='.$req;}
else{
   $myparams.='&'.$nam.'='.$req;
}
}*/
$adminv=1;

if ($auser["jog"]>=3){
    $filters['status']='all';
}
else{

}

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
					<?php $form->textbox('s',$_GET["s"],lan('name'),"sr-only");?>
                  </div>
                  <div class="form-group">
					<?php  $form->selectboxeasy2("status",$status,$_GET["status"],"status");?>
                  </div>
                    <div class="form-group">
                        <?php
                        /*$Form_Class->selectbox2("varos",$citys['datas'],array('value'=>'city_id','name'=>'city_name'),$adat["varos"],"Város");*/
                        $form->textbox('citytxt',$_GET["citytxt"],lan('city'),'hidden');

                        ?>
                    </div>
                  <button type="submit" class="btn btn-success" data-original-title=""><?= lan('search');?></button>
                </form>
              </div>
            </div>
          </div>

</div>  

                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/edittext";?>" class="btn btn-success">
                    <?= lan('new');?>
                    </a>
<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>Balatonfelvidék lista 1<br />
                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:5%">Id</th>
                        <th style="width:20%">Name</th>
                        <th style="width:40%">Cim</th>
                        <th style="">tel</th>
                        <th style="width:5%" class="hidden-phone">Status</th>

                        <th style="width:10%" class="hidden-phone">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php
					if (($hirekelemek))foreach ($hirekelemek as $data){?>


                      <tr class="gradeX">
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['nev']; ?></td>
                        <td><?= $data['zip']; ?> <?= $data['varos_nev']; ?> <?= $data['street']; ?> <?= $data['hsz']; ?></td>
                        <td><?php echo $data['telefon']; ?></td>
                        <td class="hidden-phone"><?php echo $status[$data['status']]; ?></td>

                    <td class="hidden-phone">
                        <a href="<?php echo $server_url.$separator."".$getparams[0]."/edittext/".encode($data['id']);?>" class="actions-icons">
                            <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                        </a>
                        <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."dtag=".$data['id'];?>" class="delete-row" data-original-title="Delete">
                            <img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash">
                        </a>
                    </td>
                    </tr>
                   <tr>
                       <td colspan="6"><?php echo $data['cat']; ?>|<?php echo $data['email']; ?>|<?php echo $data['web']; ?> <?php echo $data['facebook']; ?><br>
                           <?php $what="pos"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="wifi"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="bringa"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="dohanyzo"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="sport"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="allat"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="roki"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="konyha"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="medence"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="gyerek"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="specdieta"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="szepkartya"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="erzsebetkartya"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="telen"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="support"; if ($data[$what]==1)echo lan($what);?>
                           <?php $what="balatonltav"; if ($data[$what]>0)echo lan($what).":".$data[$what];?>


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