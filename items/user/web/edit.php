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


if ($_GET['activate']==1)
    if ($getparams[2]){
        $usrchk=$User_Class->get_users(array('status'=>'all','id'=>$getparams[2]));
//arraylist($usrchk);
        $uuu=$usrchk['datas'][0];
        $uuu['jogid']=2;
        $User_Class->save($uuu);
        $mire=array($uuu["firstname"],$uuu["lastname"],$uuu["email"]);
        $mit=array('USERNAME','REALNAME','USEREMAIL');
        $subject=str_replace($mit, $mire, $Text_Class->htmlfromchars(page_settings("email_uservalidok_subject")));
        $message=str_replace($mit, $mire, $Text_Class->htmlfromchars(page_settings("email_uservalidok_text")));
        emailkuldes($uuu["email"],'',$subject,$message);


    }




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
$_POST["unev"]=$Text_Class->htmltochars($_POST["unev"]);
$_POST["nev"]=$Text_Class->htmltochars($_POST["nev"]);
$_POST["about"]=$Text_Class->htmltochars($_POST["about"]);	
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
//fromtext
if ($_POST['nimg'] !=''){
	//arraylist($_POST);	
	$fileup = $profilimage_loc.'p'.$_POST["id"].'.jpg';
	$data = $_POST['nimg'];
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);
	file_put_contents($fileup, $data);
}	
//from file
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
else{
	$thuser=$auser;
}

arraylist($thuser);
$status=$User_Class->status();
$jog=$User_Class->jog();
$usrchk=$User_Class->get_users(array('status'=>'all','id'=>$getparams[2]));

if ($thuser["id"]==0){
?>You must login
<?php } 
else{
	 $img=$User_Class->profielimg2($thuser);
	 $img2=$User_Class->profielimgurl($thuser);	 
?>



<div class="container">
  <section class="col-sm-12">
      <div class="widget-header">
        <h1 class="title"> <span class="fs1" aria-hidden="true" data-icon=""></span> <?= lan('user');?> </h1>
      </div>
      <a href="<?php echo $homeurl.$separator.$getparams[0].'/list';?>"><?= lan('back');?></a>

        <div class="col-sm-10">
            <form enctype="multipart/form-data" action=""class="profilForm"  method="post" id="FbuserEditForm"  accept-charset="utf-8">
                <?php $Form_Class->hiddenbox('uedit','1');?>
                <?php $Form_Class->hiddenbox('id',$thuser["id"]);?>
				<?php $Form_Class->hiddenbox('nimg','');?>
								
								
   <style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 200px;
        height: 200px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        display: block;
      }

      button {
        margin-top: 10px;
      }
    </style>
	<script>
	$(document).ready(function(){ 

	$('form').submit(function() {
	var imageData = $('.image-editor').cropit('export',{
	type: 'image/jpeg',
	quality: .9,
	originalSize: true
	});

	document.getElementById("nimg").value=imageData;

	// Print HTTP request params
	var formValue = $(this).serialize();
	$('#result-data').text(formValue);

	// Prevent the form from actually submitting
	return true;
	});	  


	$('.image-editor').cropit({
	imageState: {
	src: '<?php echo $img;?>',
	},
	});

	$('.rotate-cw').click(function() {
	$('.image-editor').cropit('rotateCW');
	});
	$('.rotate-ccw').click(function() {
	$('.image-editor').cropit('rotateCCW');
	});
	});
	</script>
								<div class="form-group">
									<label class="control-label"><?php echo $lan["profimg"]; ?></label>  
                                    <div class="clearfix"></div>
								</div>

								<div class="form-group">
									<div class="image-editor">
										<input type="file" class="cropit-image-input">
										<div class="cropit-preview"></div>
										<div class="image-size-label"><?= lan("imageresize");?></div>
										<input type="range" class="cropit-image-zoom-input">
										<!-- button class="rotate-ccw">Rotate counterclockwise</button>
										<button class="rotate-cw">Rotate clockwise</button -->
									</div>
								</div>
								
		         

                                <div class="form-group">
                                        <?php  $Form_Class->textbox("unev",$thuser["unev"],lan('uname'));?>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email">E-mail</label>  
                                        <input class="form-control" id="email" name="email" value="<?php echo $thuser["email"];?>" type="email" data-error="Kérem, a helyes e-mail formátumot adja meg">
                                        <div class="help-block with-errors"></div>
                                </div>


                                

                <?php  $Form_Class->textbox("nev",$thuser["nev"],lan('nev'));?>
                <?php  $Form_Class->textaera("about",$thuser["about"],lan('about'));?>

                                <div class="form-group">
                                    <?php
									$Form_Class->selectboxeasy2("jogid",$jog,$thuser["jogid"],lan('jogid'));?>
                                </div>                                
                                
                                <div class="form-group">
                                    <?php
									$Form_Class->selectboxeasy2("status",$status,$thuser["status"],lan('status'));?>

                                </div>                                 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput"><?= lan('pass');?></label>
                                    <div class="col-sm-4">   
                                        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="<?= lan('pass');?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput"><?= lan('pass2');?></label>
                                    <div class="col-sm-4">   
                                        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="<?= lan('nemegyezik');?>" placeholder="<?= lan('pass2');?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="text-center col-sm-10 col-sm-offset-2">
                                        <button class="btn btn-success "><?= lan('save');?></button>
										<a href="?activate=1" class="btn btn-success " style="margin-top: 10px;"><?= lan('activateuser');?></a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
         </div>

  	</section>   
                  
</div>




<?php } ?>