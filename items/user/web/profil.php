<?php 

$profilimage_loc='uploads/profileimg/';

$UploadClass=new file_upload();
//arraylist($auser);
if ($_GET['del']){

$ddata["id"]=$auser["id"];
$ddata["status"]=4;
$User_Class->save($ddata);
		$mire=array($auser["unev"],$auser["nev"],$auser["email"]);
		$mit=array('USERNAME','REALNAME','USEREMAIL','USERPASS');	
		$subject=str_replace($mit, $mire, page_settings("email_user_del_subject"));
		$message=str_replace($mit, $mire, page_settings("email_user_del_text"));
		emailkuldes($auser["email"],$auser["firstname"]." ".$auser["lastname"],$subject,$message);
		$_SESSION["messageok"]="Your account has been deleted!";	
		$noerrorep=1;
		  	header("Location:". $homeurl.'/'.$separator.'user/logout');

}
if (!$_POST["hirlevel"])$_POST["hirlevel"]='0';    


if ($_POST["uedit"]==1){
//Jelszómódosítás
    
    
if ($_POST["pass"]!='' && $_POST["inputPasswordConfirm"]!='' && $auser["id"]>0)
{
	if ($_POST["pass"]!=$_POST["inputPasswordConfirm"]){
		$_SESSION["messageerror"]="The passwords do not match";			
	}
	else {
		$User_Class->save(array('id'=>$auser['id'],'pass'=>$_POST["pass"]));
		$mire=array($auser["unev"],$auser["nev"],$auser["email"],$_POST["pass"]);
		$mit=array('USERNAME','REALNAME','USEREMAIL','USERPASS');	
		$subject=str_replace($mit, $mire, page_settings("email_pass_change_subject"));
		$message=str_replace($mit, $mire, page_settings("email_pass_change_text"));
		emailkuldes($auser["email"],$auser["firstname"]." ".$auser["lastname"],$subject,$message);
		$_SESSION["messageok"]="Your password has been changed!";	
			
	}
}
	unset($_POST["pass"]);
        
$user_id=$_SESSION["uid"];
$data=array();
	
	if ($_POST["id"]<1)
	{
		$data["user_id"]=$user_id;
		$filters["id"]=$user_id;	
		$_POST["id"]=$user_id;
	}
	else
	{
		$data["user_id"]=$_SESSION["uid"];
		$filters["id"]=$_SESSION["uid"];
	}



$User_Class->save($_POST);

//profilimg upload
$profilimage_loc;
$target=$UploadClass->uploadimg('pimg',$profilimage_loc,'p'.$_POST["id"],200,200,true,true,true);

$data=array();
		$_SESSION["messageok"]="The changes have been saved.";
                
                $ausesr=$User_Class->get_users(array('id'=>$auser['id']),'','all');
	$auser=$ausesr["datas"][0];;
}

//$cuisine=$class_recipe->get_list('cuisine',array());


if ($auser["id"]==0){
?>Ehhez be kell lépni!
<?php } 
else{
	 $img=$User_Class->profielimg2($auser);
?>
    <div class="clear"></div>
    <div class="container">
	<section class="col-sm-8">
        <br>
					<form enctype="multipart/form-data" action=""class="profilForm"  method="post" id="FbuserEditForm"  accept-charset="utf-8">
<?php $Form_Class->hiddenbox('uedit','1');?>
                            <fieldset>
                                <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <img class="alignleft" src="<?php echo $img;?>">
                                 </div>   
                                 <div class="col-sm-6">   
                                    <div class="bootstrap-filestyle input-group" style="margin-top: 145px;">
                                    <!--span class="group-span-filestyle input-group-btn" tabindex="0">
                                    <input id="pimg" name="pimg" class="input-file" type="file" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">

                                    </span-->
                                    <input id="pimg" name="pimg" class="input-file" type="file" class="btn input-group-btn " >
                                    <!--input type="text" class="form-control " disabled=""--> 
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-12">
                                <br>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4"><strong><?php echo $lan["email"]; ?></strong></div>  
                                    <div class="col-sm-8">
                                        <?php echo $auser["email"];?>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="nev"><?php echo $lan["uname"]; ?></label>  
                                    <div class="col-sm-8">
                                        <input id="nev" name="nev" value="<?php echo $auser["unev"];?>" class="form-control" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="nev"><?php echo $lan["name"]; ?></label>  
                                    <div class="col-sm-8">
                                        <input id="nev" name="nev" value="<?php echo $auser["nev"];?>" class="form-control" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="textinput"><?php echo $lan["pass"]; ?></label> 
                                    <div class="col-sm-8">   
                                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="pass" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="textinput"><?php echo $lan["pass2"]; ?></label> 
                                    <div class="col-sm-8">   
                                        <input type="password" class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm"  data-match="#inputPassword" data-match-error="A jelszavak nem egyeznek meg" placeholder="<?php echo $lan["pass2"]; ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-4 control-label" for="nev"><?php echo $lan["hirlevel"]; ?></label>  
                                    <div class="col-sm-8">
                                        
                                        
                                        <input name="hirlevel" id="hirlevel" value="1" type="checkbox" class="" <?php if ($auser["hirlevel"]==1){echo ' checked="checked"';}?> style="position: relative">
                                        <label class="checkbox-inline terms" for="hirlevel"><?php echo $lan["scrubthe"]; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4" style="padding-left:0; ">
                                                                            <button class="button enterButton"><?php echo $lan["save"]; ?></button>
                                    </div>

                                    <div class="col-sm-4">
 <a href="<?php echo $homeurl.'/'.$separator;?>user/logout" class="button enterButton"><span><?php echo $lan["logout"]; ?></span></a><br>
 <a data-toggle="modal" data-target="#delsure" class="button enterButton" href="#"><span><?php echo $lan["user"]; ?> <?php echo $lan["delete"]; ?> </span></a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

	</section>

</div>
</div>


        <div class="modal fade" id="delsure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-400">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#delsure').modal('hide');"></button>  
                  <div class="modal-head"> </div> 
                 <div id="hiddencontent" class="modal-body">


            Delete profile implies you won't be able to log in with this username or email address in future and your profile will be removed from recipes you shared. Are you sure to continue deleting your account?<br />
             <a class="button enterButton" href="javascript:$('#delsure').modal( 'hide' );"><span>No</span></a>
             <a class="button enterButton" href="<?php echo $homeurl.'/'.$separator.$getparams[0].'/'.$getparams[1];?>?del=true"><span>Yes</span></a>

            </div>
          </div>
        </div>
        </div>

<?php } ?>