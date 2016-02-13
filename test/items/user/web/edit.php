<?php 
$profilimage_loc='uploads/profileimg/';

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

$UploadClass=new file_upload();




if ($_POST["uedit"]==1){
$user_id=$_POST["id"];
$data=array();
	
	if ($_POST["id"]<1)
	{
		$data["user_id"]=$user_id;
		$filters["id"]=$user_id;	
		$_POST["id"]=$user_id;
	}
	else
	{
		$data["user_id"]=$thuser["id"];
		$filters["id"]=$thuser["id"];
	}
/*$data["elements"]=$_POST["language_elements"];
$user->save_fb_fbusers_lang($data);

$data["elements"]=$_POST["work_area_elements"];
//arraylist ($data);
$user->save_fb_fbusers_work_area($data);

$data["elements"]=$_POST["location_elements"];
//arraylist ($data);
$user->save_fb_fbusers_locations($data);

//$data["blog_tags"]=$_POST["blog_tags"]
$user->save_ad_tags_field($_POST);
*/
//arraylist($_POST);
$uid=$User_Class->save($_POST);
//profilimg upload
//$profilimage_loc;
$target=$UploadClass->uploadimg('pimg',$profilimage_loc,'p'.$uid,200,200,true,true,true);
$data=array();
		$_SESSION["messageok"]="A módosításokat mentettük.";
}
//echo $_SESSION["messageok"];

//Jelszómódosítás
if ($_POST["passchng"]=='1'&&$thuser["id"]>0)
{
	if ($_POST["pass"]==''){
		$_SESSION["messageerror"]="Nem adtál meg jelszót!";			
	}
	else if ($_POST["pass"]!=$_POST["pass1"]){
		$_SESSION["messageerror"]="Nem egyezik a két jelszó";			
	}
	else if ($_POST["passo"]!=$thuser["pass"]){
		$_SESSION["messageerror"]="Hibás a régi jelszó";
		//arraylist($thuser);			
	}
	else {
		$User_Class->save(array('id'=>$thuser['id'],'pass'=>$_POST["pass"]));
		$mire=array($thuser["firstname"],$thuser["lastname"],$thuser["email"],$_POST["pass"]);
		$mit=array('FIRSTNAME','LASTNAME','USEREMAIL','USERPASS');	
		$subject=str_replace($mit, $mire, page_settings("email_pass_change_subject"));
		$message=str_replace($mit, $mire, page_settings("email_pass_change_text"));
		emailkuldes($thuser["email"],$thuser["firstname"]." ".$thuser["lastname"],$subject,$message);
		$_SESSION["messageok"]="Jelszavad megváltozott!";	
			
	}
}
//Új jelszó kérése
if ($_POST["passreset"]=='1'&&$_POST["email"])
{
	//ellenőrzöm, hogy létezik e már az emailcím
	$usrchk=$User_Class->get_users2(array("email"=>$_POST['email'],'active'=>'all'));
	$chku=$usrchk['datas'][0];
	if ($chku['id']>1){
	//létezik a user	
	
	if ($chku['active']!='1'){
		$_SESSION["messageerror"]="Nem aktív profil, vedd fel a kapcsolatot az oldal üzemetetőjével!";		
	}
	else
	{
		//generálom az új jelszót
		$newpas=generatePassword();
		//lemetem az új jelszót
		$User_Class->save(array('id'=>$chku['id'],'pass'=>$newpas));
		//összeállítom az emailt
		$mire=array($_POST["email"],$newpas,$chku["firstname"],$chku["lastname"]);
		$mit=array('USEREMAIL','USERPASS','FIRSTNAME','LASTNAME');
		$subject=str_replace($mit, $mire, page_settings("email_pass_reset_subject"));
		$message=str_replace($mit, $mire, page_settings("email_pass_reset_text"));
		emailkuldes($_POST["email"],$oldalneve,$subject,$message);
		$_SESSION["messageok"]="Emailben elküldtünk egy ideiglenes jelszót.";		
	}	
	//	
	}
	else{
		$_SESSION["messageerror"]="nincs ilyen felhasználó";	
	}
}


if ($getparams[2]>0)
{
$usrchk=$User_Class->get_users(array('status'=>'all','id'=>$getparams[2]));
//arraylist($usrchk);
	$thuser=$usrchk['datas'][0];	
}



$status=$User_Class->status();
$jog=$User_Class->jog();
$usrchk=$User_Class->get_users(array('status'=>'all','id'=>$getparams[2]));

if ($thuser["id"]==0){
?>You must login
<?php } 
else{
	 $img=$User_Class->profielimg2($thuser);
?>



<div class="container">
  <section class="col-md-3 col-sm-4" >
<?php include("items/user/web/widget_user_menu.php");?>
  </section>     
  <section class="col-md-9 col-sm-8">
      <div class="widget-header">
        <div class="title"> <span class="fs1" aria-hidden="true" data-icon=""></span> User data </div>
      </div>
      <a href="<?php echo $homeurl.$separator.$getparams[0].'/list';?>">Back</a>

        <div class="col-sm-10">
            <form enctype="multipart/form-data" action=""class="profilForm"  method="post" id="FbuserEditForm"  accept-charset="utf-8">
                <?php $Form_Class->hiddenbox('uedit','1');?>
                <?php $Form_Class->hiddenbox('id',$thuser["id"]);?>

                                <div class="form-group">
                                <img class="alignleft" src="<?php echo $img;?>">
                                <div>
                                <span><input id="pimg" name="pimg" class="input-file" type="file" ></span>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="unev">Username</label>  
                                    <div class="col-sm-4">
                                        <input id="unev" name="unev" value="<?php echo $thuser["unev"];?>" type="text">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email">E-mail</label>  
                                    <div class="col-sm-4">
                                        <input id="email" name="email" value="<?php echo $thuser["email"];?>" type="email" data-error="Kérem, a helyes e-mail formátumot adja meg">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                              


                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="nev">Name</label>  
                                    <div class="col-sm-4">
                                        <input id="nev" name="nev" value="<?php echo $thuser["nev"];?>" type="text">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <?php
									$Form_Class->selectboxeasy2("jogid",$jog,$thuser["jogid"],"Acces level");?>
                                </div>                                
                                
                                <div class="form-group">
                                    <?php
									$Form_Class->selectboxeasy2("status",$status,$thuser["status"],$caption="status");?>

                                </div>                                 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Password</label> 
                                    <div class="col-sm-4">   
                                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Reenter password</label> 
                                    <div class="col-sm-4">   
                                        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="A jelszavak nem egyeznek meg" placeholder="Confirm password">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text-right col-sm-4 col-sm-offset-2">
                                        <button class="button enterButton">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
         </div>

  	</section>   
                  
</div>




<?php } ?>