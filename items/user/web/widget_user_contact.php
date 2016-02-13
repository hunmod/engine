<?php
if ($_POST['contactform']==1 && $_POST['email']!=''&& $_POST['message']!=''&& $_POST['message']!='subject'&&$_POST['captha']){
	$message='<strong>Felado:</strong> <a href="mailto:USEREMAIL">USERNAME</a> (USEREMAIL) <br /> <strong>Tárgy:</strong>'.$_POST["subject"].'<br />'.$_POST["message"];

		$mire=array($_POST["nev"],$_POST["email"]);
		$mit=array('USERNAME','USEREMAIL');	
		$message=str_replace($mit, $mire, $message);
		emailkuldes('hunmod@gmail.com','Nagy Péter'." ".$auser["lastname"],$_POST["subject"],$message);
		$_SESSION["messageok"]=$lan['messagethx'];		

}

?>
<h3><?= $lan['message'];?></h3>
<form action="" method="post" name="contactform" id="contactform">
<?php $Form_Class->hiddenbox('contactform','1');?>
<?php $Form_Class->textbox('captha','');?>

<?php $Form_Class->textbox('email',$auser['email'],$lan['email'],NULL,1);?>
<?php $Form_Class->textbox('nev',$auser['nev'],$lan['nev'],NULL,1);?>
<?php $Form_Class->textbox('subject',$auser['subject'],$lan['subject'],NULL,1);?>
<?php $Form_Class->textaera('message','',$lan['message'],'form-control',1);?>
<button class="btn btn-success" type="submit" value="<?= $lan['sendmessage'];?>"><?= $lan['sendmessage'];?></button>


</form>