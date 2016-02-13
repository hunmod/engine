<?php
//nem csak kép, bármilyen állomány feltöltésére alkalmas, automatikusan létrehozza a könyvtárstruktúrát.
include_once("../items/allpagedatas.php");
if(isset($_POST['submit'])){
	if (isset ($_FILES['new_image'])){
	//kepfeltoltes
		$targetfldr=$_POST["submit"]."/";	
		$extension1 = pathinfo($_FILES['new_image']['name']);
		$extension = strtolower($extension1[extension]);
		$imagenamenew=$date.".".$extension;
        $source = $_FILES['new_image']['tmp_name'];
		createdir($targetfldr);
		$target = $targetfldr.$imagenamenew;
		$target1 = $targetfldr."m_".$imagenamenew;
			//echo $target;
			//$targetnew=$targetfldr.$imagenamenew;
			move_uploaded_file($source, $target);
			filetablaba($target,$_FILES['new_image']['name']);
		//kepfeltoltes
	if ($_GET["w"]=='')
		{$width='800';}
	else
		{$width=$_GET["w"];};
	if ($_GET["h"]=='')
		{$height='600';}
	else
		{$height=$_GET["h"];}; 
			kepatmeretezes($target, $target, $width, $height); 
            echo "Large image: <img src='".$target."'><br>"; 
          }
        }
?>