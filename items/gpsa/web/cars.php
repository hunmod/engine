<div class="container">
    <div class="widget">
        <div class="widget-header">
            <div class="title"><span class="fs1" aria-hidden="true"
                                     data-icon=""></span> <?php echo $lan["search"]; ?> </div>
        </div>
        <div class="widget-body">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <?php $form->hiddenbox('q', $_GET["q"]); ?>
                    <?php $form->textbox('s', $_GET["s"], $lan["s"], "sr-only"); ?>
                </div>
                <div class="form-group">
                    <?php $Form_Class->selectboxeasy2("status", $status, $_GET["status"], $lan["status"]); ?>
                </div>
                <div class="form-group">
                    <?php $form->selectboxeasy2('order', $orderbye, $_GET["order"], 'Order'); ?>
                </div>

                <div class="form-group">
                    <?php $form->selectboxeasy2('by', $orderbyebye, $_GET["by"], 'by'); ?>
                </div>
                <div class="form-group">
                    <?php //$form->selectboxeasy2('status',$status,$_GET["status"],'status');?>
                </div>
                <button type="submit" class="btn btn-success"
                        data-original-title=""><?php echo $lan["search"]; ?></button>
            </form>
        </div>
    </div>
    <a href="<?php echo $homeurl . $separator . "" . $getparams[0] . "/car"; ?>"
       class="btn btn-success"> <?php echo $lan["new"]; ?> <?php echo $lan["car"]; ?></a>
    <!-- Row start -->
    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title"><span class="fs1" aria-hidden="true"
                                             data-icon=""></span> <?php echo $lan["users"]; ?>  </div>
                </div>
                <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left"
                               id="data-table">
                            <thead>
                            <tr>
                                <th style="width:5%">Id</th>
                                <th style="width:20%"><?php echo $lan["Rsz"]; ?> </th>
                                <th style="width:20%"><?php echo $lan["IMEI"]; ?> </th>
                                <th style="width:20%"><?php echo $lan["modositas"]; ?> </th>
                                <th style="width:5%" class="hidden-phone"><?php echo $lan["status"]; ?></th>
                                <th style="width:15%" class="hidden-phone">Last Active</th>
                                <th style="width:10%" class="hidden-phone"><?php echo $lan["status"]; ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datas as $data) { ?>
                                <tr class="gradeX">
                                    <td><?php echo $data['szerzszam']; ?></td>
                                    <td><?php echo $data['vrendszam']; ?></td>
                                    <td><?php echo $data['rendszam']; ?></td>
                                    <td><?php echo $data['modositas']; ?></td>

                                    <td class="hidden-phone"><?php echo $status[$data['status']]; ?></td>
                                    <td class="hidden-phone"><?php echo $data['lastactive']; ?></td>

                                    <td class="hidden-phone">
                                        <a href="<?php echo $server_url . $separator . "" . $getparams[0] . "/car/" . $data['szerzszam']; ?>"
                                           class="actions-icons"> <?= $lan["edit"];?></a>
                                        <a href="<?php echo $server_url . $separator . "" . $getparams[0] . "/cars_user/" . $data['szerzszam']; ?>"
                                           class="actions-icons"> Users </a>
                                    </td>
                                </tr>
                                <!--tr class="gradeX" style="column-span: 4;">
                                    <td>
                                        <?php
                                /*$ficar["uid"]=$data['id'];
                                $cars=$gpsacars_class->get_usercar($ficar);
                                 arraylist($cars["datas"]) ;*/
                                ?>

                                    </td>
                                </tr-->
                                <?php ?>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="text-center">
            <ul class="pagination">
                <!--li>
   <a href="<?php echo $server_url . $separator . $myparams . "page=0"; ?>" aria-label="first">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                            </a>
                                        </li>

                                        <li>
   <a href="<?php echo $server_url . $separator . $myparams . "page=" . ($oldal - 1); ?>" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                            </a>
                                        </li-->


                <li>
                    <a href="<?php echo $server_url . $separator . $myparams . "&page=0" ?>" <?php echo $selc; ?> ><i
                            class="fa fa-angle-double-left"></i></a></li>
                <li>
                    <a href="<?php echo $server_url . $separator . $myparams . "&page=" . ($oldal - 1); ?>" <?php echo $selc; ?> ><i
                            class="fa fa-angle-left"></i></a></li>


                <?php for ($c = 0; $c <= $oldalakszama - 1; $c++) {
                    $selc = '';
                    if ($oldal == $c) $selc = 'class="active"';
                    ?>
                    <li>
                        <a href="<?php echo $server_url . $separator . $myparams . "&page=" . $c; ?>" <?php echo $selc; ?> ><?php echo $c + 1; ?></a>
                    </li>


                    <?php
                }
                ?>
                <!--li>
    <a href="<?php echo $server_url . $separator . $myparams . "&page=" . ($oldal + 1); ?>" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                          </a>
                                        </li>
                                        <li>
    <a href="<?php echo $server_url . $separator . "&page=" . ($oldalakszama - 1); ?>" aria-label="Last">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                            </a>
                                        </li-->
                <li>
                    <a href="<?php echo $server_url . $separator . $myparams . "&page=" . ($oldal + 1); ?>" <?php echo $selc; ?> ><i
                            class="fa fa-angle-right"></i></a></li>
                <li>
                    <a href="<?php echo $server_url . $separator . $myparams . "&page=" . ($oldalakszama - 1); ?>" <?php echo $selc; ?> ><i
                            class="fa fa-angle-right"></i></a></li>
            </ul>
        </nav>
        </section>

</div>
