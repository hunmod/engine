<?php
$form=new formobjects();
$status=array('2'=>'Active','3'=>'Suspended','4'=>'Deleted');
$sorrend=$class_slider->get_sorrend();
//$users=$jobclass->get_users(array());
$slider=$class_slider->get($_GET);
//arraylist($slider);
$datas=$slider['datas'];
?>
<div class="container">

        <a href="<?php echo $server_url.$separator."slide/slider";?>" class="btn btn-lg btn-success">
                    New Slide
                    </a>         
	<!-- Row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sliders<br />

                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:25%">Slider name</th>
                        <th style="width:35%">Order num</th>
                        <th style="width:15%" class="hidden-phone">Status</th>

                        <th style="width:10%" class="hidden-phone">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php if (count($datas))foreach ($datas as $data){?>


                      <tr class="gradeX">
                        <td><?php echo $data['name']; ?></td>
                        <td class="hidden-phone"><?php echo $sorrend[$data['sorrend']]; ?></td>
						<td><?php echo $status[$data['status']]; ?></td>
                        <td class="hidden-phone">
                          <a href="<?php echo $server_url.$separator."slide/slider/".$data['id'];?>" class="actions-icons">                            <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
                          </a>
                        </td>
                      </tr>
                    <tr class="gradeX">
                    <td colspan="4">
                    <?php
						$img=$data['imgurl'];
	if ($img!="none"){
		$img="picture.php?picture=".encode($data['imgurl'])."&ext=.jpg";
	}
	else{
		$img="uploads/".$defaultimg;
	}
					// echo $data['imgurl'];
					 ?>
                    <img src="<?php echo $server_url.$img;?>" alt="edit" class="icons">
                    </td>
                    </tr>
                    <?php ?>
                    
                    <?php }?>
                    
                    </tbody>
                  </table>
                  <div class="clearfix"></div>
                  <div class="dataTables_paginate paging_full_numbers">
<span>
<a href="<?php echo $server_url.$separator.$_GET["q"].$separator2."oldal=0".$sparams; ?>" class="paginate_button">|<</a>
<a href="<?php echo $server_url.$separator.$_GET["q"].$separator2."oldal=".($oldal-1).$sparams; ?>" class="paginate_button"><</a>
<?php
for ($c=0;$c<=$oldalakszama-1;$c++){
$selc= '';
if ($oldal==$c)
{
	$selc='class="paginate_active"';
}else{
	$selc='class="paginate_button"';

}
?><a href="<?php echo $server_url.$separator.$_GET["q"].$separator2."oldal=".$c.$sparams; ?>" <?php echo $selc; ?> ><?php echo $c+1;?></a><?php	}

?>
<a href="<?php echo $server_url.$separator.$_GET["q"].$separator2."oldal=".($oldal+1).$sparams; ?>" class="paginate_button">></a>
<a href="<?php echo $server_url.$separator.$_GET["q"]."&oldal=".($oldalakszama-1).$sparams; ?>" class="paginate_button">>|</a>
</span>
</div>                       
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Row end -->
        
 </div>