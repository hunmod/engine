<?php
$tblmodulom='files';
$tbl[$tblmodulom]=$adatbazis["db1_db"].".".$prefix."files";

$file_structuct["modules"]=$tblmodulom;
$file_structuct["name"]="fájlok képek";
$file_structuct["file"]="list";
$modules[]=$file_structuct;


/*tábla létrehozása ha nincs*/
if ($tblexists[$tbl[$tblmodulom]]!=1)
{
$qfiletbl="CREATE TABLE IF NOT EXISTS ".$tbl[$tblmodulom]." (
  `filepath` varchar(200) NOT NULL,
  `leiras` text NOT NULL,
  PRIMARY KEY  (`filepath`)
) DEFAULT CHARSET=utf8;
";
$returnquery=db_Query($qfiletbl, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "create");
}

if(!function_exists("imagerotate")) {
    function imagerotate($srcImg, $angle, $bgcolor, $ignore_transparent = 0) {
        return rotateImage($srcImg, $angle);
    }
}

function rotateImage($img1, $rec) {
    $wid = imagesx($img1);
    $hei = imagesy($img1);
    switch($rec) {
        case 270:
            $img2 = @imagecreatetruecolor($hei, $wid);
        break;
        case 180:
            $img2 = @imagecreatetruecolor($wid, $hei);
        break;
        default :
            $img2 = @imagecreatetruecolor($hei, $wid);
    }
    if($img2) {
        for($i = 0;$i < $wid; $i++) {
            for($j = 0;$j < $hei; $j++) {
                $ref = imagecolorat($img1,$i,$j);
                switch($rec) {
                    case 270:
                        if(!@imagesetpixel($img2, ($hei - 1) - $j, $i, $ref)){
                            return false;
                        }
                    break;
                    case 180:
                        if(!@imagesetpixel($img2, $i, ($hei - 1) - $j, $ref)) {
                            return false;
                        }
                    break;
                    default:
                        if(!@imagesetpixel($img2, $j, ($wid - 1) - $i, $ref)) {
                            return false;
                        }
                }
            }
        }
        return $img2;
    }
    return false;
}

//
	
function imagecreatefrombmp($p_sFile) 
    { 
        //    Load the image into a string 
        $file    =    fopen($p_sFile,"rb"); 
        $read    =    fread($file,10); 
        while(!feof($file)&&($read<>"")) 
            $read    .=    fread($file,1024); 
        
        $temp    =    unpack("H*",$read); 
        $hex    =    $temp[1]; 
        $header    =    substr($hex,0,108); 
        
        //    Process the header 
        //    Structure: http://www.fastgraph.com/help/bmp_header_format.html 
        if (substr($header,0,4)=="424d") 
        { 
            //    Cut it in parts of 2 bytes 
            $header_parts    =    str_split($header,2); 
            
            //    Get the width        4 bytes 
            $width            =    hexdec($header_parts[19].$header_parts[18]); 
            
            //    Get the height        4 bytes 
            $height            =    hexdec($header_parts[23].$header_parts[22]); 
            
            //    Unset the header params 
            unset($header_parts); 
        } 
        
        //    Define starting X and Y 
        $x                =    0; 
        $y                =    1; 
        
        //    Create newimage 
        $image            =    imagecreatetruecolor($width,$height); 
        
        //    Grab the body from the image 
        $body            =    substr($hex,108); 

        //    Calculate if padding at the end-line is needed 
        //    Divided by two to keep overview. 
        //    1 byte = 2 HEX-chars 
        $body_size        =    (strlen($body)/2); 
        $header_size    =    ($width*$height); 

        //    Use end-line padding? Only when needed 
        $usePadding        =    ($body_size>($header_size*3)+4); 
        
        //    Using a for-loop with index-calculation instaid of str_split to avoid large memory consumption 
        //    Calculate the next DWORD-position in the body 
        for ($i=0;$i<$body_size;$i+=3) 
        { 
            //    Calculate line-ending and padding 
            if ($x>=$width) 
            { 
                //    If padding needed, ignore image-padding 
                //    Shift i to the ending of the current 32-bit-block 
                if ($usePadding) 
                    $i    +=    $width%4; 
                
                //    Reset horizontal position 
                $x    =    0; 
                
                //    Raise the height-position (bottom-up) 
                $y++; 
                
                //    Reached the image-height? Break the for-loop 
                if ($y>$height) 
                    break; 
            } 
            
            //    Calculation of the RGB-pixel (defined as BGR in image-data) 
            //    Define $i_pos as absolute position in the body 
            $i_pos    =    $i*2; 
            $r        =    hexdec($body[$i_pos+4].$body[$i_pos+5]); 
            $g        =    hexdec($body[$i_pos+2].$body[$i_pos+3]); 
            $b        =    hexdec($body[$i_pos].$body[$i_pos+1]); 
            
            //    Calculate and draw the pixel 
            $color    =    imagecolorallocate($image,$r,$g,$b); 
            imagesetpixel($image,$x,$height-$y,$color); 
            
            //    Raise the horizontal position 
            $x++; 
        } 
        
        //    Unset the body / free the memory 
        unset($body); 
        
        //    Return image-object 
        return $image; 
    } 


function imagecreatefromx($filename){
$kierjeztes=kierjeztes($filename);
	switch (strtolower($kierjeztes)){
    case "jpg":
        $image_in = imagecreatefromjpeg($filename);
		$Contenttype = 'image/jpeg';
        break;
    case "jpeg":
        $image_in = imagecreatefromjpeg($filename);
		$Contenttype = 'image/jpeg';
        break;		
    case "gif":
        $image_in = imagecreatefromgif($filename);
		$Contenttype = 'image/gif';
        break;
    case "png":
        $image_in = imagecreatefrompng($filename);
		$Contenttype = 'image/png';
        break;
    case "bmp":
        $image_in = imagecreatefrombmp($filename);
		$Contenttype = 'image/bmp';
        break;				
	}	
return $image_in;
}
	
	
	
function kepforgat ($kepurl,$irany){
//$kepurl = "imageurl";	
//$irany = "l"(left);r(Rigth);	
$filename = $kepurl;
$image_in=imagecreatefromx($filename);
	if ($irany=="r"){	
		$degrees = 90;
	}
	else {$degrees = 270;}
		// Rotate
		$rotate = imagerotate($image_in, $degrees, 0);
		// Output
		imagejpeg($rotate, $filename);
		imagedestroy($rotate);
}

function egykepwmurl($fileimg,$folder){
	return str_replace($folder["uploads"]."/", '',$fileimg);
}
function chkimg($file){
	global $defaultimg;
	if (is_file($file)){
		return ($file);
	}
	else {return($defaultimg);}
}


//vissza adja egy fájl elérési útjából a file kiterjesztését
function kierjeztes($file){
		$kiterjeszteshez= explode("/",$file);
		$kiterjeszteshez2=explode(".",$kiterjeszteshez[count($kiterjeszteshez)-1]);
		$kiterjesztes=strtolower($kiterjeszteshez2[count($kiterjeszteshez2)-1]);
		return 	$kiterjesztes;
}


//kép átméretzés
function kepatmeretezes($forraskep, $vegsokep, $max_width, $max_height) 
{
	$extension = pathinfo($forraskep);
	$extension = $extension[extension];
	if ((strtolower($extension)=="gif")||(strtolower($extension)=="jpg")||(strtolower($extension)=="jpeg")||(strtolower($extension)=="png")){
	
	list($width,$height) = getimagesize($forraskep);
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	if(($width <= $max_width) && ($height <= $max_height))
	{
		$tn_width = $width;
		$tn_height = $height;
	} elseif (($x_ratio * $height) < $max_height) 
	{
		$tn_height = ceil($x_ratio * $height);
		$tn_width = $max_width;
	} else {
		$tn_width = ceil($y_ratio * $width);
		$tn_height = $max_height;
	};	
	
	$tmp=imagecreatetruecolor($tn_width,$tn_height);

	$tmp_image=imagecreatefromx($forraskep);

	imagecopyresampled($tmp,$tmp_image,0,0,0,0,$tn_width, $tn_height,$width,$height);
	
	switch (strtolower($extension)) {
			case 'gif' :
				imagegif($tmp, $vegsokep);
				break;
			case 'jpg' :
				imagejpeg($tmp, $vegsokep, 100);
				break;
			case 'jpeg' :
				imagejpeg($tmp, $vegsokep, 100);
				break;
			case 'png' :
				imagepng($tmp, $vegsokep, 0);
				break;  

		}
		
	}
};
//kép átméretzés

//kép átméretezés, kivágással
function resize_image($source_image, $destination_filename, $width = 200, $height = 150, $quality = 70, $crop = true)
{
 
	if( ! $image_data = getimagesize( $source_image ) )
	{
		return false;
	}
 
	switch( $image_data['mime'] )
	{
		case 'image/gif':
			$get_func = 'imagecreatefromgif';
			$suffix = ".gif";
		break;
		case 'image/jpeg';
			$get_func = 'imagecreatefromjpeg';
			$suffix = ".jpg";
		break;
		case 'image/png':
			$get_func = 'imagecreatefrompng';
			$suffix = ".png";
		break;
	}
 
	$img_original = call_user_func( $get_func, $source_image );
	$old_width = $image_data[0];
	$old_height = $image_data[1];
	$new_width = $width;
	$new_height = $height;
	$src_x = 0;
	$src_y = 0;
	$current_ratio = round( $old_width / $old_height, 2 );
	$desired_ratio_after = round( $width / $height, 2 );
	$desired_ratio_before = round( $height / $width, 2 );
 
	if( $old_width < $width || $old_height < $height )
	{
		/**
		 * The desired image size is bigger than the original image. 
		 * Best not to do anything at all really.
		 */
		return false;
	}
 
 
	/**
	 * If the crop option is left on, it will take an image and best fit it
	 * so it will always come out the exact specified size.
	 */
	if( $crop )
	{
		/**
		 * create empty image of the specified size
		 */
		$new_image = imagecreatetruecolor( $width, $height );
 
		/**
		 * Landscape Image
		 */
		if( $current_ratio > $desired_ratio_after )
		{
			$new_width = $old_width * $height / $old_height;
		}
 
		/**
		 * Nearly square ratio image.
		 */
		if( $current_ratio > $desired_ratio_before && $current_ratio < $desired_ratio_after )
		{
			if( $old_width > $old_height )
			{
				$new_height = max( $width, $height );
				$new_width = $old_width * $new_height / $old_height;
			}
			else
			{
				$new_height = $old_height * $width / $old_width;
			}
		}
 
		/**
		 * Portrait sized image
		 */
		if( $current_ratio < $desired_ratio_before  )
		{
			$new_height = $old_height * $width / $old_width;
		}
 
		/**
		 * Find out the ratio of the original photo to it's new, thumbnail-based size
		 * for both the width and the height. It's used to find out where to crop.
		 */
		$width_ratio = $old_width / $new_width;
		$height_ratio = $old_height / $new_height;
 
		/**
		 * Calculate where to crop based on the center of the image
		 */
		$src_x = floor( ( ( $new_width - $width ) / 2 ) * $width_ratio );
		$src_y = round( ( ( $new_height - $height ) / 2 ) * $height_ratio );
	}
	/**
	 * Don't crop the image, just resize it proportionally
	 */
	else
	{
		if( $old_width > $old_height )
		{
			$ratio = max( $old_width, $old_height ) / max( $width, $height );
		}else{
			$ratio = max( $old_width, $old_height ) / min( $width, $height );
		}
 
		$new_width = $old_width / $ratio;
		$new_height = $old_height / $ratio;
 
		$new_image = imagecreatetruecolor( $new_width, $new_height );
	}
 
	/**
	 * Where all the real magic happens
	 */
	imagecopyresampled( $new_image, $img_original, 0, 0, $src_x, $src_y, $new_width, $new_height, $old_width, $old_height );
 
	/**
	 * Save it as a JPG File with our $destination_filename param.
	 */
	imagejpeg( $new_image, $destination_filename, $quality  );
 
	/**
	 * Destroy the evidence!
	 */
	imagedestroy( $new_image );
	imagedestroy( $img_original );
 
	/**
	 * Return true because it worked and we're happy. Let the dancing commence!
	 */
	return true;
} 
//kép átméretezés, kivágással

//Véletlen kép egy könyvtárból
function randomimgtofldr($mappa){
	if (is_dir($mappa)) {
		$mappa= str_replace("//", "/", $mappa);
		$mappa= str_replace("//", "/", $mappa);
		$mappa= str_replace("//", "/", $mappa);
		$mappa= str_replace("//", "/", $mappa);
		$filesx = scandir($mappa);
		foreach ($filesx as $kep){
			$kiterjesztes=kierjeztes($kep);
			if (($kiterjesztes=="jpg")||($kiterjesztes=="gif")||($kiterjesztes=="png")||($kiterjesztes=="bmp"))
			{
				$fl[]=$kep;      
			}
		}
		if (count($fl)>0){
			return $fl[rand(0,count($fl)-1)];
		}
		else {return "none";}
	}
	else {return "none";}
}



//mappában levő állományok listája 
function imglist($mappa){
	global $homeurl;
	//ha létezik a könyvtár
	$mappa=$mappa;
	//echo $mappa."<br>";
	
	//$folders["uploads"]
	if (is_dir($mappa)) { 
		$files1 = scandir($mappa);
		foreach ($files1 as $kep){
			$filename2= $mappa."/".$kep;      
			$filename2= str_replace("//", "/", $filename2);
			$filename2= str_replace("//", "/", $filename2);
			$filename2= str_replace("//", "/", $filename2);
			$filename2= str_replace("//", "/", $filename2);
			//ha létezik a fájl
			if (is_file($filename2)){$folderimages[]=$kep;}
		} 
	}
return $folderimages;
}


						
function convert_to_jpeg($file)
{
	$img = $file;
	$dst =str_replace(array(".gif",".png",".bmp"),".jpg", strtolower ( $img));
	//$dst = $config['membersprofilepicdir']."/".$pid.'.jpg';
	
	if (($img_info = getimagesize($img)) === FALSE)
	  die("Image not found or not an image");
	
	$width = $img_info[0];
	$height = $img_info[1];
	
	switch ($img_info[2]) {
	  case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
	  case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
	  case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
	  default : die("Unknown filetype");
	}
	
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
	imagejpeg($tmp, $dst);
}					
	
//croppolás
function img_crop($img_url, $img_w, $img_h,$img_x,$img_y,$img_width ){

	$jpeg_quality = 92;
	$imgorig_id=(getimagesize($img_url));
	$img_ext=kierjeztes($img_url);

	$img_original_w=$imgorig_id[0];
	$img_original_h=$imgorig_id[1];	

	$aranya=($img_original_w/$img_width);
	
	$img_heigth=$img_original_h*$aranya;
	$crop_w=$img_w*$aranya;
	$crop_h=$img_h*$aranya;
	$crop_pos_w=$img_x*$aranya;
	$crop_pos_h=$img_y*$aranya;	
	if ($crop_h+$crop_pos_h > $img_original_h){
		$crop_pos_h=0;
		$crop_h=$img_original_h;
	}

	if ($crop_w+$crop_pos_w > $img_original_w){
		$crop_pos_w=0;
		$crop_w=$img_original_w;
	}	

// Resize and crop
$image = imagecreatefromx($img_url);
$filename = $img_url;


$thumb = imagecreatetruecolor( $crop_w, $crop_h);

imagecopyresampled($thumb,
                   $image,   
				   0,0,    
					($crop_pos_w),($crop_pos_h), 			                
                   $img_original_w, $img_original_h,
                   $img_original_w, $img_original_h
                   );

	switch (strtolower($img_ext)) {
			case 'gif' :
				imagegif($thumb, $filename);
				break;
			case 'jpg' :
				imagejpeg($thumb, $filename,  $jpeg_quality);
				break;
			case 'jpeg' :
				imagejpeg($thumb, $filename,  $jpeg_quality);
				break;
			case 'png' :
				imagepng($thumb, $filename, 0);
				break;  

		}
	}



function folderlist($getparams,$x,$y){
	global $folders,$homeurl;
	//echo $homeurl;
	//a menürendszert használja a könyvtárak azonosítására és egy elemhez tartozó képeket,állományokat listázza ki.
	//vissza adja az átméretezett képlet, a darkboxhoz szükséges js-t vagy ha egyéb állomány az állomány linkjét és kiterjesztéséhez tartozó képét
	//valamint a képekhez különböző méretű linkeket<br />
	//és a file teljes elérését, törléshez
	if ($x>0){$x="&x=".$x;}else $x="";
	if ($y>0){$y="&y=".$y;}else $y="";
	$id=decode ($getparams[2]);
	$data_folderpage2=$folders["uploads"].$getparams[0]."/".$id;
	//echo $data_folderpage2;
	$n=0;
	$leiras=array();
	$imglista=imglist("./uploads/".$data_folderpage2);
	//var_dump($imglista);
	if (count($imglista)>0){ 
	//$dblist='';
		foreach ($imglista as $egykep )
		{
		$fileleirasa=fileleirasa($data_folderpage2."/".$egykep);
		$kiterjesztes=kierjeztes($egykep);
		
		if (($kiterjesztes=="jpg")||($kiterjesztes=="jpeg")||($kiterjesztes=="gif")||($kiterjesztes=="png")||($kiterjesztes=="bmp"))
			{
				//echo $data_folderpage2."/".$egykep;
			$egyimg=$homeurl."/uploads/picture.php?picture=".encode($data_folderpage2."/".$egykep).$x.$y;
			$egyimgm=$homeurl."/uploads/picture.php?picture=".encode($data_folderpage2."/".$egykep)."&x=450&y=380";
			$egyimgf=$homeurl."/uploads/picture.php?picture=".encode($data_folderpage2."/".$egykep)."&x=640&y=480";
			
	   			if (($dblist!='')){$dblist.=',';}
			$dblist.='"'.$egyimgf.'"';
			$leiras[$n]=$egyfilex["text"];
			$egyfilex["url"]="";
			$egyfilex["screen"]=
			'<a href="'.$egyimgf.'&ext=.jpg" class="html5lightbox" title="'.$egyfilex["text"].'">
			<img alt="'.$egyfilex["text"].'" src="'.$egyimg.'" >
			</a>
			';
			$egyfilex["alternativurls"]=$egyimg."<br>".$egyimgm."<br>".$egyimgf;
			$n++;
		}
		
	 	else 
			if (($kiterjesztes=="mp3"))
			{
				$egyfilex["screen"]= '<audio src="./uploads/fdownload.php?file='.encode($data_folderpage2."/".$egykep).'" type="audio/mpeg" preload="auto" controls></audio>';	
				$egyurl="/uploads/fdownload.php?file=".encode($data_folderpage2."/".$egykep);
				$egyfilex["url"]=$egyurl;
				$egyimg="uploads/system/filegif/".$kiterjesztes.".gif";
				$egyfilex["screen"].='<a href="'.$egyurl.'"><img alt="'.$egyimg.'" src="'.$homeurl."/".$egyimg.'" width="30"></a>';
			}			

		
		else{
			$egyimg="./uploads/system/filegif/".$kiterjesztes.".gif";
			if (!file_exists($egyimg)){$egyimg=$homeurl."/uploads/system/filegif/q.gif";}
			$egyurl=$homeurl."/uploads/fdownload.php?file=".encode($data_folderpage2."/".$egykep);
			$egyfilex["url"]=$egyurl;
			$egyfilex["screen"]='<img alt="'.$egyimg.'" src="'.$homeurl."/".$egyimg.'" width="30">';	
		
			if ($kiterjesztes=="apk")
				{
					$egyimg=$homeurl."/scripts/phpqrcode/index2.php?data=http://".$_SERVER["SERVER_NAME"]."/uploads/".$data_folderpage2."/".$egykep;
									$egyfilex["screen"]='<img alt="'.$egyimg.'" src="'.$egyimg.'"  >';	
	
				}
				
				
			$egyfilex["alternativurls"]=$egyurl;
			}
					if ($fileleirasa!=""){$egyfilex["text"]=$fileleirasa;}
			else{ $egyfilex["text"]=$egykep;}

			$egyfilex["filepath"]=$data_folderpage2."/".$egykep;
			$egyfilex["filename"]=$egykep;
			$egyfilex["dellink"]="uploads/".$data_folderpage2."/".$egykep;

		$egyfile[]=$egyfilex;


	}		
/*	echo '<script language="javascript" type="text/javascript">
DarkBox.list = ['.$dblist.'];';
	for ($i = 0; $i <= count($leiras)-1; $i++) {
	 echo 'DarkBox.descriptions ['.$i.'] = "'.$leiras[$i].'";';
	}
	echo '</script>';*/
	return $egyfile;
	}
	
}
//

    
    
 // ------------------------------------------------------------

if (isset($_GET['delfile'])){
$Upload_Class->delfile(decode($_GET['delfile']));
	
}




function imgtobase64($path){	
	$type = pathinfo($path, PATHINFO_EXTENSION);
	//echo $path;
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	return $base64;
}

function is_http_file($file){
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}	
}

?>