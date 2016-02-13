<style>
.aktivlink{
background:#3C0;	
}
</style>
<?php 

if ($getparams[3]>0){
$quuserse="SELECT * FROM ".$tbl["user"]." WHERE id='".$getparams[3]."'";
$usersex=db_Query($quuserse, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
$userse=$usersex[0];
}


//jog állítás
if ($getparams[2]=='jog'){
$qupdt="UPDATE  ".$tbl["user"]." SET `jogid`=".$getparams[4]." WHERE `id`=".$getparams[3].";";
db_Query($qupdt, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");

//mail
$subject = 'Jogosultság változása';
$message = '
<html>
<head>
  <title>Jogosultság változása</title>
</head>
<body>
  <h2>Kedves '.$userse["nev"].'!</h2>
 <br>
 Mostantól <strong>'.$jogok[$getparams[4]]["nev"].'</strong> jogosultsággal rendelkezel.
<br>
   <p>További jó böngészést kíván a <strong>'.$oldalneve.'</strong>!</p>
</body>
</html>';
//mail

}
//jog állítás

//status állítás
if ($getparams[2]=='status'){
$qupdt="UPDATE  ".$tbl["user"]." SET `status`=".$getparams[4]." WHERE `id`=".$getparams[3].";";
db_Query($qupdt, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "update");
//mail
$subject = 'Státusz változása';
$message = '
<html>
<head>
  <title>Státusz változása</title>
</head>
<body>
  <h2>Kedves '.$userse["nev"].'!</h2>
 <br>
 Mostantól <strong>'.$status[$getparams[4]]["nev"].'</strong> státusszal rendelkezel.
<br>
   <p>További jó böngészést kíván a <strong>'.$oldalneve.'</strong>!</p>
</body>
</html>';
//mail
}
//status állítás
if (($getparams[2]=='status') ||($getparams[2]=='jog')){

//mail
$to = $userse["email"];

emailkuldes($userse["email"],$userse["nev"],$subject,$message);

//mail
}

//Összes user
$quusers="SELECT * FROM ".$tbl["user"];
$users=db_Query($quusers, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
//Összes user
?>
<table style="width: 100%">
<?php foreach ($users as $oneuser){?>
	<tr>
		<td style="height: 23px"><span onclick="javascript:showwarp('hidden','','fnct/user/profil','uid=<?php echo $oneuser["id"];?>');"><?php echo $oneuser["id"];?></span></td>
		<td style="height: 23px"><?php echo $oneuser["unev"];?></td>
		<td style="height: 23px"><?php echo $oneuser["nev"];?></td>
		<td style="height: 23px">
		<a <?php if ($oneuser["status"]==4){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/status/".$oneuser["id"]."/4";?>">Kitilt </a> 
		<a <?php if ($oneuser["status"]==1){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/status/".$oneuser["id"]."/1";?>">Enged</a> 
		</td>
		<td style="height: 23px">
		<a <?php if ($oneuser["jogid"]==0){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/jog/".$oneuser["id"]."/0";?>">Vendég </a> 
		<a <?php if ($oneuser["jogid"]==1){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/jog/".$oneuser["id"]."/1";?>">Regisztrált </a> 
		<a <?php if ($oneuser["jogid"]==2){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/jog/".$oneuser["id"]."/2";?>">Tag </a> 
		<a <?php if ($oneuser["jogid"]==3){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/jog/".$oneuser["id"]."/3";?>">Szerkesztő </a> 
		<a <?php if ($oneuser["jogid"]==4){ echo 'class="aktivlink"';} ?>  href="<?php echo $separator.$getparams[0]."/".$getparams[1]."/jog/".$oneuser["id"]."/4";?>">Admin</a> 
		</td>
	</tr>
<?php } ?>	
</table>

