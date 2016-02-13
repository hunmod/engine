<?php
$id=decode($getparams[2]);

if (count($_POST)>0){

	if ($_POST["id"]==""){
	//rögzítés
$qs="INSERT INTO  ".$tbl["site_text"]." (
`id` ,
`szoveg` ,
`leiras` ,
`lang_id`
)
VALUES (
'".$_POST["id"]."',  '".htmltochars($_POST["szoveg"])."',  '".htmltochars($_POST["leiras"])."',  '".$_POST["lang_id"]."'
);
";
	}
	else{
	//módosítás
$qs="UPDATE  ".$tbl["site_text"]." SET  `szoveg` =  '".htmltochars($_POST["szoveg"])."',
`leiras` =  '".htmltochars($_POST["leiras"])."' WHERE  `id`  =  '".$_POST["id"]."' LIMIT 1 ;";
	}
db_Query($qs, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "insert");	

}


if ($id!="")
{
	$Q="Select * FROM ".$tbl["site_text"]." WHERE `lang_id` ='1'
	and id='".$id."'";
	$lista=db_Query($Q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");
	$elem=$lista[0];
	$elem["szoveg"]=htmlfromchars($elem["szoveg"]);
	$elem["leiras"]=htmlfromchars($elem["leiras"]);
}

//arraylist($elem);
?>
<form method="post">

<?php
hiddenbox("lang_id",$defaultlangid);
textbox("id",$elem["id"]);
kcebox("szoveg",$elem["szoveg"],0);
textbox("leiras",$elem["leiras"]);
?>
<input type="submit" />
</form>