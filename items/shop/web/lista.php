<div class="container">
    <section class="col-sm-12" >
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span><?= lan('search')?>
                        </div>
                    </div>
                    <div class="widget-body">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <?php //$form->hiddenbox('q',$_GET["q"]);?>
                                <?php $form->hiddenbox('order',$_GET["order"],'',"sr-only");?>
                                <?php $form->textbox('name',$_GET["name"],'name',"sr-only");?>
                            </div>
                            <div class="form-group">
                                <?php  $form->selectboxeasy2("status", $sitestatus, $adat["status"], lan("status")); ?>
                            </div>

                            <div class="form-group">
                                <?php $Form_Class->selectbox2("mid",$menuk,array('value'=>'id','name'=>'nev'),$_GET["mid"],"Menu");?>
                            </div>
                            <button type="submit" class="btn btn-success" data-original-title=""><?= lan('search')?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo $homeurl.$separator."".$getparams[0]."/edittext";?>" class="btn btn-success"><?= lan('newarticle')?></a>
        <!-- Row start -->
        <?php //arraylist($menuk);?>
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span><?= lan('shop');?><br />
                        </div>
                    </div>
                    <div class="widget-body">
                        <div id="dt_example" class="example_alt_pagination">
                            <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                                <thead>
                                <tr>
                                    <th><?= lan('id');?></th>
                                    <th><?= lan('menu');?></th>
                                    <th style="width:20%"><?= lan('nev');?></th>
                                    <th ><?= lan('storage');?></th>
                                    <th ><?= lan('priece');?></th>
                                    <th ><?= lan('status');?></th>
                                    <th class="hidden-phone"><?= lan('actions')?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (($hirekelemek))foreach ($hirekelemek as $data){?>
                                <tr class="gradeX">
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php
                                        echo $data["mid"];
                                        ?></td>
                                    <td><?php
                                        echo $data["title"];
                                    ?></td>
                                    <td><?php if ($data["storagemin"]>$data["storage"]){
                                        $storagestyle='color:red';
                                        } else $storagestyle='';

                                        echo '<storage style="'.$storagestyle.'">'.$data["storage"].'</storage>';
;
                                        ?> (<?php
                                        echo $data["storagemin"];
                                        ?>)
                                    </td>
                                    <td><?php
                                        echo $data["priece"];
                                        ?></td>
                                    <td><?php
                                        echo ($sitestatus[$data["status"]]);
                                        ?></td>
                                    <td class="hidden-phone">
                                        <a href="<?php echo $server_url.$separator."".$getparams[0]."/edittext/".encode($data['id']);?>" class="actions-icons">
                                            <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                                        </a>
                                        <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."dtag=".$data['id'];?>" class="delete-row" data-original-title="Delete">
                                            <img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash">
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                            <?php
                            if ($oldalakszama>1){
                            ?>
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
                            <?php } ?>
    </section>
</div>