<?php	
error_reporting(0);
//include("../items/admin/data/class/resize-class.php");
include("items/admin/data/class/resize-class.php");

if ($_GET['picture'] != "") {
		$theimage=base64_decode($_GET['picture']);
	if (file_exists($theimage)) {
		$x = 120;

		list($width, $height, $type, $attr)= getimagesize($theimage, $info);

		if (($_GET['x'] == "")&&($_GET['y'] == "")) {
            $_GET['y']=$y=$x/$width*$height;
		}
		if (($_GET['x'] != "")&&($_GET['y'] == "")) {
			$x = $_GET['x'];
            $_GET['y']=$y=$x/$width*$height;
		}
		if (($_GET['y'] != "")&&($_GET['x'] == "")) {
			$y = $_GET['y'];
            $_GET['x']=$x=$width*$y/$height;
		}		

		if (($_GET['x'] != "")&& ($_GET['y'] != "")){
			$x = $_GET['x'];
			$y = $_GET['y'];
			if ($width<$height){
				$y=($x/$width)*$height*2/3;
				$x=$x*2/3;
				}
			else{	
				$x=($y/$height)*$width;
				$y=$y;
			}
		}
		
	//header('Content-type: '.$Contenttype);
		
//echo $theimage;


// *** 1) Initialize / load image
$resizeObj = new resize($theimage);
 //var_dump($resizeObj);
// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
$resizeObj -> resizeImage($_GET['x'], $_GET['y'], 'crop');
 
// *** 3) Save image
$resizeObj -> showImage($theimage, 68);
}
}

?>