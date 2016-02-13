<?php 
$form=new formobjects();
$upload_Class=new file_upload();
$slide_folder="uploads/slide/";

if ($_GET["dimg"]!=''){
$upload_Class->delfile($slide_folder.$_GET["dimg"]);	
}

$target=$upload_Class->uploadimg('file',$slide_folder,'s'.($date),1170,490,true,true,true);
$list=$upload_Class->listfiles($slide_folder);

//arraylist($list);
?>

<h1>Slideshow</h1>



<div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon=""></span> Feltöltés
                </div>
              </div>
              <div class="widget-body">
<form action="" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label>Válassz egy file-t</label><input name="file" type="file" />
                  </div>



<input class="btn btn-success"  name="" type="submit" value="Feltöltés" />

</form>              
			</div>
			</div>
          </div>

        <div class="row">
          <div class="col-md-12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Képek<br />
                </div>
              </div>

              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                    <thead>
                      <tr>
                        <th style="width:25%">Kép</th>
                        <th style="width:10%" class="hidden-phone">Tevékenységek</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if (count($list))foreach ($list as $data){?>
					
                      <tr class="gradeX">
                        <td><?php echo $server_url.$slide_folder.$data; ?><img src="<?php echo $server_url.$slide_folder.$data; ?>" width="100%" /></td>
                         <td> <a href="<?php echo $server_url.$separator.$_GET['q'].$separator2."dimg=".$data;?>" class="delete-row" data-original-title="Delete"><img src="<?php echo $server_url;?>styl/admin/img/trash-icon.png" alt="trash"></a>                        </td>
                      </tr>
                    
					<?php }?>
					</tbody>
                    </table>

                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
</div>
