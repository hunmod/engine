<div class="container">
  <left class="col-md-3 col-sm-4" >
<?php 
$widgets[]="items/user/web/widget_user_menu.php";
$widgets[]="items/konyha/web/widget_submenu.php";
$widgets[]="items/ads/web/widget_side1.php";

foreach ($widgets as $widget)if (file_exists($widget))include($widget);?>
  </left> 
<rsscsoplist class="col-md-9 col-sm-8">
                    <a href="<?php echo $homeurl.$separator."".$getparams[0]."/csop_edit";?>" class="btn btn-success">
                    <?php echo $lan['uj']; ?> RSSchanel
                    </a>  
                    
<!-- Row start -->
        <div class="row">
			<div class="col-md-12">
				<div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>Feeds<br />

                </div>
              </div>
              
              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:5%">Id</th>
                        <th style="width:65%"><?php echo $lan['url']; ?></th>
                        <th style="width:5%" class="hidden-phone"><?php echo $lan['period']; ?></th>
                        <th style="width:5%" class="hidden-phone"><?php echo $lan['ido']; ?></th>
                        <th style="width:5%" class="hidden-phone"><?php echo $lan['status']; ?></th>
                        <th style="width:10%" class="hidden-phone"><?php echo $lan['actions']; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($eszkozok as $data){?>


                      <tr class="gradeX">
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['url']; ?></td>
                        <td><?php echo $data['period']; ?></td>
                        <td><?php echo $data['ido']; ?></td>
                        <td class="hidden-phone"><?php echo $estatus[$data['status']]; ?></td>

                        <td class="hidden-phone">
                          <a href="<?php echo $homeurl.$separator."".$getparams[0]."/csop_edit/".$data['id'];?>" class="actions-icons">
                            <img src="<?php echo $homeurl;?>styl/admin/img/edit-icon.png" alt="<?php echo $lan['edit']; ?>" class="icons">
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
</rsscsoplist>
</div>