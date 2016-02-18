<?php
$UserClass=new user();
$form=new formobjects();

$orderbye=array();
//$orderbye['name']='created';
//$orderbye['id']='created';
//$orderlist[]=$orderbye;
$orderbye['nev']='Name';
$orderbye['unev']='Username';
$orderbye['status']='Username';
$orderbye['lastactive']='Active Time';



$orderbyebye=array();

$orderbyebye['ASC']='ASC';
$orderbyebye['DESC']='DESC';

$order='';
if ($_GET['order']!="" && $_GET['order']!="all"){
    $order=" ".$_GET['order'];
    if ($_GET['by']!="" && $_GET['by']!="all"){
        $order.=" ".$_GET['by'];
    }
    else{
        $order.=" ASC ";
    }
}


//$datas
$filters=$_GET;
$myparams='user/list';
foreach ($_GET as $nam=>$req )
{
    if ($nam!='PHPSESSID'&&$nam!='q'&&$nam!='CKFinder_Path'&&$nam!='googtrans'&&$nam!='oldal'&&$nam!='cpsession'&&$nam!='langedit'&&$nam!='lang'&&$nam!='cprelogin'&&$nam!='page')
        //echo '<br>&'.$nam.'='.$req;
        $myparams.='&'.$nam.'='.$req;
}

$maxegyoldalon=20;
if (($_GET["page"]=="") || ($_GET["page"]<=0)){
    $oldal='0';
}
else {
    $oldal=$_GET["page"];
}


if ($_GET["status"])
{
    $filters=$_GET;
}
else{
    $_GET["status"]='all';
}
$usrchk=$UserClass->get_users($filters,$order,$oldal);
//arraylist($usrchk);


$hszlistacount=$usrchk['count'];

//arraylist($filters);

//
$oldal=$_REQUEST["page"];
$mycount=$hszlistacount;
//$maxegyoldalon=page_settings("max_recipe_perpage");
$oldalakszama=ceil ($mycount/$maxegyoldalon);
if ($oldalakszama>$maxoldalazonum){
    $start=$oldal-10;
    if ($start<round($maxoldalazonum/2)){
        $start=0;
        $end=$start+$maxoldalazonum+5;
    }
    //echo $start.'sss'.$oldalakszama-1;
    if ($start>=$oldalakszama-1-round($maxoldalazonum/2)){
        //echo 'sss';
        $start=$oldalakszama-1-$maxoldalazonum;
        $end=$oldalakszama-1;
    }
    else
    {
        $end=$start+$maxoldalazonum;
    }
}
else
{
    $start=0;
    $end=$oldalakszama-1;
}
if ($oldal>$oldalakszama-1)$oldal=$oldalakszama-1;




$datas=$usrchk['datas'];
//echo $usrchk['query'];
//arraylist($datas);

$status=$UserClass->status();
$jog=$UserClass->jog();


if ($_GET['active']){
    updt_page_settings('month_chef',$_GET['active']);
    //page_settings('active_week');
}

//arraylist($status);
$monthcheafq=$UserClass->get_users(array("id"=>page_settings('month_chef')));
$monthcheaf=$monthcheafq['datas'][0];
?>



<div class="container">
    <section class="col-md-9 col-sm-8">
        <div class="widget">
            <div class="widget-header">
                <div class="title"> <span class="fs1" aria-hidden="true" data-icon=""></span> <?php echo $lan["search"]; ?> </div>
            </div>
            <div class="widget-body">
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <?php $form->hiddenbox('q',$_GET["q"]);?>
                        <?php $form->textbox('name',$_GET["name"],$lan["name"],"sr-only");?>
                    </div>
                    <div class="form-group">
                        <?php $Form_Class->selectboxeasy2("status",$status,$_GET["status"],$lan["status"]);?>
                    </div>
                    <div class="form-group">
                        <?php $form->selectboxeasy2('order',$orderbye,$_GET["order"],'Order');?>
                    </div>

                    <div class="form-group">
                        <?php $form->selectboxeasy2('by',$orderbyebye,$_GET["by"],'by');?>
                    </div>
                    <div class="form-group">
                        <?php //$form->selectboxeasy2('status',$status,$_GET["status"],'status');?>
                    </div>
                    <button type="submit" class="btn btn-success" data-original-title=""><?php echo $lan["search"]; ?></button>
                </form>
            </div>
        </div>

        <a href="<?php echo $homeurl.$separator."".$getparams[0]."/edit";?>" class="btn btn-success"> <?php echo $lan["new"]; ?>  <?php echo $lan["user"]; ?></a>
        <!-- Row start -->
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title"> <span class="fs1" aria-hidden="true" data-icon=""></span> <?php echo $lan["users"]; ?>  </div>
                    </div>
                    <div class="widget-body">
                        <div id="dt_example" class="example_alt_pagination">
                            <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                                <thead>
                                <tr>
                                    <th style="width:5%">Id</th>
                                    <th style="width:20%"><?php echo $lan["name"]; ?> </th>
                                    <th style="width:20%"><?php echo $lan["uname"]; ?> </th>
                                    <th style="width:20%"><?php echo $lan["email"]; ?> </th>
                                    <th style="width:5%" class="hidden-phone"><?php echo $lan["status"]; ?></th>
                                    <th style="width:15%" class="hidden-phone">Last Active</th>
                              <th style="width:10%" class="hidden-phone"><?php echo $lan["status"]; ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($datas as $data){?>
                                    <tr class="gradeX">
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['nev']; ?></td>
                                        <td><?php echo $data['unev']; ?></td>
                                        <td><?php echo $data['email']; ?></td>

                                        <td class="hidden-phone"><?php echo $status[$data['status']]; ?></td>
                                        <td class="hidden-phone"><?php echo $data['lastactive']; ?></td>

                                        <td class="hidden-phone">
                                            <a href="<?php echo $server_url.$separator."".$getparams[0]."/edit/".$data['id'];?>" class="actions-icons"> <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons" /> </a>
                                            <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."active=".$data['id'].'&'.$addtourl;?>" class="actions-icons" onclick="return confirm('Are you sure?')">  <span class="fs1" aria-hidden="true" data-icon="&#xe000;"></span> </a> </td>
                                    </tr>
                                <tr class="gradeX" style="column-span: 4;">
                                    <td>
                                        <?php
                                        $ficar["uid"]=$data['id'];
                                        $cars=$gpsacars_class->get_usercar($ficar);
                                         arraylist($cars["datas"]) ;
                                        ?>

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

            <nav class="text-center">
                <ul class="pagination">
                    <!--li>
   <a href="<?php echo $server_url.$separator.$myparams."page=0"; ?>" aria-label="first">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                            </a>
                                        </li>

                                        <li>
   <a href="<?php echo $server_url.$separator.$myparams."page=".($oldal-1); ?>" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                            </a>
                                        </li-->


                    <li><a href="<?php echo $server_url.$separator.$myparams."&page=0" ?>" <?php echo $selc; ?> ><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="<?php echo $server_url.$separator.$myparams."&page=".($oldal-1); ?>" <?php echo $selc; ?> ><i class="fa fa-angle-left"></i></a></li>




                    <?php for ($c=0;$c<=$oldalakszama-1;$c++){
                        $selc= '';
                        if ($oldal==$c)$selc='class="active"';
                        ?>
                        <li><a href="<?php echo $server_url.$separator.$myparams."&page=".$c; ?>" <?php echo $selc; ?> ><?php echo $c+1;?></a></li>


                        <?php
                    }
                    ?>
                    <!--li>
    <a href="<?php echo $server_url.$separator.$myparams."&page=".($oldal+1); ?>" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                          </a>
                                        </li>
                                        <li>
    <a href="<?php echo $server_url.$separator."&page=".($oldalakszama-1); ?>" aria-label="Last">
                                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                            </a>
                                        </li-->
                    <li><a href="<?php echo $server_url.$separator.$myparams."&page=".($oldal+1); ?>" <?php echo $selc; ?> ><i class="fa fa-angle-right"></i></a></li>
                    <li><a href="<?php echo $server_url.$separator.$myparams."&page=".($oldalakszama-1); ?>" <?php echo $selc; ?> ><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </nav>
    </section>
    <section class="col-md-3 col-sm-4" >

        <?php include("items/user/web/widget_user_menu.php");?>

    </section>
</div>