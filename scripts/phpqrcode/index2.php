<?php  
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    include "qrlib.php";    
    if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);
    
    $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
     $errorCorrectionLevel = $_REQUEST['level'];    
    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
	$kodod=base64_decode($_GET["data"]);
	if (isset($kodod)) { 
        if (trim($kodod) == '')
            die('data cannot be empty! <a href="?">back</a>');
                	
	$filename = $PNG_TEMP_DIR.'test'.md5($kodod.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        
			
	QRcode::png ($kodod, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    

        
    } else {    
    
    }    
        
$im = imagecreatefrompng($filename);

header('Content-type: image/png');

imagepng($im);
imagedestroy($im);



?>