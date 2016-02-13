<?php session_start();?>
<?php
include_once("../items/allpagedatas.php");
//files

if (isset ($_FILES)){
	
	foreach ($_FILES as $name=>$elem)
	{	
	//kepfeltoltes
		$targetfldr=$_POST["q"]."/";	
		$extension1 = pathinfo($elem['name']);
		$extension = strtolower($extension1['extension']);
		$imagenamenew=$date.".".$extension;
        $source = $elem['tmp_name'];
		createdir($targetfldr);
		$target = $targetfldr.$imagenamenew;
			//echo $target;
			//$targetnew=$targetfldr.$imagenamenew;
			move_uploaded_file($source, $target);
			filetablaba($target,$elem['name']);
			//file_put_contents("a.txt",json_encode($_FILES));

		//kepfeltoltes
	
	/*
	$current.="
	ex:".$elem['name']."
";
	$current.="
	source:".$source."
";
	$current.="
	target:".$target."
";
	$current.="
	source:".$source."
";


		
		foreach ($elem as $name1=>$elem1)
		{
		$current.="
		  ".$name1.": ".$elem1 ;
		}
*/
}

}

//$file="aa.txt";



// Write the contents back to the file
file_put_contents($file, $current);

?>