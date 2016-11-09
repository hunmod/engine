<style>

.layer #regsubmit:disabled,
.layer #fbregsubmit:disabled 
{ background: #CCC; }
form {
	text-align:left;
}
.hchecker{
display: block!important;
float:none!important;
width: 10px!important;
height: 10px!important;
margin: 0px!important;
border: 10px solid #fff!important;
background: none!important;
left: 10px;
top: 18px;
padding: 0!important;
position: absolute;
z-index: 0;
background-color: #fff!important;
box-shadow: none;
}

.regerror{
display:none;	
color:#C00;
}
.captha{
position:absolute;
top:-1000px;	
}
</style>
	<div class="layer">
		<div class="cont clr">
        <?php 
		$regerrors=$_SESSION["regeerror"];
		unset($_SESSION["regeerror"]);
		unset($_SESSION["postid"]);
		?>
			<h2><?php echo $lan["reg"]; ?></h2>
			<div class="form">
				<form name="regu"  id="regu" method="post" action="<?php echo $homeurl."/user/userreg"?>">
                    <div id="unev_error" class="regerror"></div>
					<div class="inp clr">
                    <input name="regform" type="hidden" value="2"/>
						<input type="text" name="unev" id="unev" placeholder="<?php echo $lan["fname"]; ?>" required="required" value="<?php echo $bdata['unev']; ?>" class="form-control">
						<i class="icon user"></i>
					</div>
					<div id="nev_error" class="regerror"><?php echo $regerrors['unev']; ?></div>
					<div class="inp clr">
						<input type="text" name="nev" id="nev" placeholder="<?php echo $lan["lname"]; ?>" required="required"  value="<?php echo $bdata['nev']; ?>" class="form-control">
						<i class="icon user"></i>
					</div>

					<div id="email_error" class="regerror"><?php echo $regerrors['nev']; ?></div>
					<div class="inp clr">
						<input type="email" name="email" id="email" placeholder="<?php echo $lan["email"]; ?>" required="required" value="<?php echo $bdata['email']; ?>" class="form-control">
						<i class="icon mail"></i>
					</div>
					<div id="pass_error" class="regerror"><?php echo $regerrors['email']; ?></div>
					<div class="inp clr">
						<input type="password" name="pass" id="pass" placeholder="<?php echo $lan["pass"]; ?>" required="required" value="<?php echo $bdata['pass']; ?>" class="form-control">
						<i class="icon pwd"></i>
					</div>
					<div id="pass1_error" class="regerror"><?php echo $regerrors['pass1']; ?></div>
					<div class="inp clr">
						<input type="password" name="pass1" id="pass1" placeholder="<?php echo $lan["pass2"]; ?>" required="required" class="form-control"><i class="icon pwd"></i>
						<input type="text" name="captha"  placeholder="captha" class="captha">
					</div>
                    
					<div class="inp check clr">
						
							<label class="checker" ><input type="checkbox" name="aszf" id="aszf" value="1" required="required"><i id="aszfl"><i></i></i></label>
							<?php echo $lan["acceptthe"]; ?> <strong><a href="<?php echo $server_url.$separator."aszf";?>" target="_blank"><?php echo $lan["aszf"]; ?></a></strong><?php echo $lan["et"]; ?>
					</div>
					<div id="aszf_error" class="regerror"></div>
					<div class="inp check clr">
						<label class="checker">
							<input type="checkbox"  name="hirlevel" value="1"><i><i></i></i>
                         </label> <?php echo $lan["scrubthe"]; ?>
					</div>                    
					<input onclick="chk_ureg();" type="button" name="" value="<?php echo $lan["reg"]; ?>" class="btn btn-orange" >
					</form>
<?php 
	if (($fb_ap_id!="")&&($fb_ap_secret!=""))
	{
?>  					
				<form name="regfb"  id="regfb" method="post" action="<?php echo $homeurl.'/user/fbreg';?>"></form>
                <div class="fblog">	
					<?php echo $lan["regfb"]; ?>
				</div>
                            <a href="<?php echo $homeurl."?fblog=1"?>" class="button facebookButton">
							<?php echo $lan["loginw"]; ?> Facebook<?php echo $lan["al"]; ?> <i class="fa fa-facebook"></i></a>
<?php 
	}
?>    					
			</div>
		</div>
	</div>
<script>



function chk_fbreg(){
	if (!$("#aszf2").is(':checked')){
		$('#aszf2_error').html('El kell fogadnod a felhasználói feltételeket!');
		showdiv('aszf2_error');
	}
	else{
		hidediv('aszf2_error');
		$( "#regfb" ).submit();	
	}

}


function chk_ureg(){
	var uregerror=0;

  var pass = $("#pass").val();
  var pass1 = $("#pass1").val();
  var email = $( "#email" ).val();

	
	if (!$("#aszf").is(':checked')){
		$('#aszf_error').html('El kell fogadnod a felhasználói feltételeket!');
		showdiv('aszf_error');
		uregerror++;
	}
	else{
		hidediv('aszf_error');
	}



	if (email==''){
		$('#email_error').html('Kötelező kitölteni!');
		showdiv('email_error');
		uregerror++;
	}
	else if(!isValidEmailAddress(email)) {
		$('#email_error').html('Hibás email formátum!');
		showdiv('email_error');
		uregerror++;		
	}
	else{
		hidediv('email_error');
	}


	if (pass==''){
		$('#pass_error').html('Kötelező jelszót megadni!');
		showdiv('pass_error');
		uregerror++;
	}
	else{
		hidediv('pass_error');
	}
	if (pass1!=pass){
		$('#pass1_error').html('Nem egyezik a két jelszó!');
		showdiv('pass1_error');
		uregerror++;
	}
	else{
		hidediv('pass1_error');
	}

	if (uregerror==0)
	{
		$( "#regu" ).submit();		
	}

}



    document.querySelector( "form" )
        .addEventListener( "invalid", function( event ) {
            event.preventDefault();
        }, true );


<?php foreach ($regerrors as $name=>$value)
{
	echo "$('#".$name."_error').html('".$value."');
		showdiv('".$name."_error');";
	
}
?>
/*validate();
  $("#pass").keyup(validate);
  $("#pass1").keyup(validate);
  $("#aszf").click(validate);
  $( "input[name=email]" ).keyup(validate);
  $( "#unev" ).keyup(validate);
  $( "#nev" ).keyup(validate);*/
</script>
