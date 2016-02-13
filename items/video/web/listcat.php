<?php 

$filters["mid"]=19;
//$status=array('1'=>'Active','4'=>'Deleted');
$status=$MenuClass->status();

$qhirekhirekelemek=$MenuClass->get_menu($filters,$order='',$page='all');
$hirekelemek=$qhirekhirekelemek["datas"];
//arraylist($qhirekhirekelemek);
?>


        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>Video categories<br />
                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/menu_edit";?>"  class="btn btn-lg btn-success">
                    New video categorie
                    </a>

                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/lista";?>"  class="btn btn-lg btn-success">
                    Video list
                    </a>

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
                    
                    <?php foreach ($hirekelemek as $data){?>
                                  
                      <tr class="gradeX">
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo htmlfromchars($data["nev"]);?></td>
                        <td class="hidden-phone"><?php echo $status[$data['status']]; ?></td>

                        <td class="hidden-phone">
                          <a href="<?php echo $server_url.$separator."".$getparams[0]."/menu_edit/".($data['id']);?>" class="actions-icons">
                            <img src="<?php echo $server_url;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
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
        </div>
        <!-- Row end -->




<?php if ($oldalakszama>1){
//oldalazó	?>
<div class="clear"></div>
  <div class="hszoldalazo">
   <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=0"; ?>"> |&lt; </a>
   <a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal-1); ?>"> &lt; </a>
    <?php
for ($c=0;$c<=$oldalakszama-1;$c++){
	?><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".$c; ?>"><?php echo $c+1;?></a><?php	}
	?><a href="<?php echo $separator.$_GET["q"].$separator2."oldal=".($oldal+1); ?>"> &gt;</a><a href="<?php echo $separator.$_GET["q"]."&oldal=".($oldalakszama-1); ?>">&gt;| </a>
	</div>
    <?php	
//oldalazó
};?>
