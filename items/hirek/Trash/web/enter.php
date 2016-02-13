<?php
$formadat=$_POST;
arraylist($_POST);
try 
{   
if (!$formadat["formid"]){
$formerror["van"]="van";
}
else {
	$formerror=array();

	if (($formadat["uname"]==""))
	{
		$formerror["uname"]="Kötelező megadni";
	}	

	if (($formadat["pass"]==""))
	{
		$formerror["pass"]="Kötelező megadni";
	}	


			$input['targy']=$formadat["targy"];// rögzites
			$input['email']=$formadat["uname"];
			$input['jelszo']=$formadat["pass"];//legalább hat karakter


			$input2 = rebabral_be($input);
			//arraylist($input2);

			$output2 = $userdata->__soapCall('greet', array(new SoapParam($input2, "input")),  array('encoding' => 'UTF-8')); 
			//arraylist(rebabral_ki($output2));
		if (count ($output2['hiba'])<1)
		{
			//rögzítés sikeres
			$rogzitve="igen";
			$_SESSION["user"]=$output2;
		}

	}

}
catch (Exception $e) 
{
    printf("Message = %s\n",$e->__toString());
}
?>
<div class="login">
<?php if ($rogzitve!="igen"){?>
<form id="userreg" action="" method="post">
<?php 
hiddenbox('targy',4);
hiddenbox('formid','reg');
?>
<table width="600" border="0">
  <tr>
    <td>email</td>
    <td><?php textbox('uname',$formadat["uname"]);?></td>
    <td><?php echo $formerror["uname"]; ?></td>
  </tr>
  <tr>
    <td>jelszo</td>
    <td><?php textbox('pass',$formadat["pass"]);?></td>
    <td><?php echo $formerror["pass"]; ?></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td><input name="" type="submit" /></td>
  </tr>



</table>

</form>
<?php } else {?>
<h1>Sikeres belépés!</h1>
<?php }?>
</div>