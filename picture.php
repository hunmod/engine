<?php
/*
 * Image processor written by hunmod
 * https://hunmod.eu
 *
 *Use example: picture.php?picture=picture.jpg&x=900&y=900&c=0&t=0
 * picture-image relativ location
 * x-image width
 * y-image heigth
 * c-crop
 * t-make watermark
 *

	watermark positions:
	l-t,c-t,r-t
	l-c,c-c,r-c
	l-b,c-b,r-b
*/

$watermarkarray["wm_image"]="uploads/logo.png";
$watermarkarray["ratio"]=0.8;
$watermarkarray["pos"]="c-c";
$watermarkarray["opacity"]=10;
if ($_GET['c']=='0'){$crop=0;}else $crop=1;
//$crop=0;
if ($_GET['t']=='0'){$watermark=0;} else $watermark=1;
if ($_GET['x']){$final_width=$_GET['x'];}else $final_width=320;
if ($_GET['y']){$final_height=$_GET['y'];}
$create_temp=1;
$picfolder='uploads/';
$tempfolder='img_temp/';
//return image extension
$ret_ex = 'png';
$user_agent = $_SERVER['HTTP_USER_AGENT'];
// if (stripos( $user_agent, 'Chrome') !== false)
if (stripos( $user_agent, 'Safari') !== true)
{ $ret_ex='webp';}
else{$ret_ex='jpeg';}
function createdir($dir){

    $dirs = explode("/", $dir);
    $dirlist="";
    //arraylist($dirs);
    foreach ($dirs as $mappa){
        if ($dirlist==''){$dirlist=$mappa;}
        else {$dirlist.='/'.$mappa;}
        //echo $dirlist;
        if (!is_dir($dirlist)&& $dirlist!='') {
            //echo $mappa;
            mkdir($dirlist,0777,true);
            //mkdir($dirlist);
            //chgrp($dirlist, "samba_users");
            chmod($dirlist, 0777);
        };

    };
}
function iptc_make_tag($rec, $data, $value)
{
    $length = strlen($value);
    $retval = chr(0x1C) . chr($rec) . chr($data);

    if($length < 0x8000)
    {
        $retval .= chr($length >> 8) .  chr($length & 0xFF);
    }
    else
    {
        $retval .= chr(0x80) .
            chr(0x04) .
            chr(($length >> 24) & 0xFF) .
            chr(($length >> 16) & 0xFF) .
            chr(($length >> 8) & 0xFF) .
            chr($length & 0xFF);
    }

    return $retval . $value;
}
function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){ 
	if(!isset($pct)){
		return false;
	}
	$pct /= 100;
	// Get image width and height
	$w = imagesx( $src_im );
	$h = imagesy( $src_im );
	// Turn alpha blending off
	imagealphablending( $src_im, false );
	// Find the most opaque pixel in the image (the one with the smallest alpha value)
	$minalpha = 127;
	for( $x = 0; $x < $w; $x++ )
	for( $y = 0; $y < $h; $y++ ){
		$alpha = ( imagecolorat( $src_im, $x, $y ) >> 24 ) & 0xFF;
		if( $alpha < $minalpha ){
			$minalpha = $alpha;
		}
	}
	//loop through image pixels and modify alpha for each
	for( $x = 0; $x < $w; $x++ ){
		for( $y = 0; $y < $h; $y++ ){
			//get current alpha value (represents the TANSPARENCY!)
			$colorxy = imagecolorat( $src_im, $x, $y );
			$alpha = ( $colorxy >> 24 ) & 0xFF;
			//calculate new alpha
			if( $minalpha !== 127 ){
				$alpha = 127 + 127 * $pct * ( $alpha - 127 ) / ( 127 - $minalpha );
			} else {
				$alpha += 127 * $pct;
			}
			//get the color index with new alpha
			$alphacolorxy = imagecolorallocatealpha( $src_im, ( $colorxy >> 16 ) & 0xFF, ( $colorxy >> 8 ) & 0xFF, $colorxy & 0xFF, $alpha );
			//set pixel with the new color + opacity
			if( !imagesetpixel( $src_im, $x, $y, $alphacolorxy ) ){
				return false;
			}
		}
	}
	// The image copy
	imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
} 
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
function watermark($image,$watermark_url='logo.png',$ratio='7',$position='c-c',$opacity=70){
$image_out=$image['image'];
$x=$image['w'];
$y=$image['h'];
if (file_exists($watermark_url)){
	list($width, $height) = getimagesize($watermark_url);
	$ratio1=$x/$width*$ratio;
	$ratio2=$height/$width*$ratio;
	$ratio=($ratio1+$ratio2)/2;
	$newwidth = $width * $ratio;
	$newheight = $height * $ratio;

	// Load
	$watermark = imagecreatetruecolor($newwidth, $newheight);
	imagealphablending($watermark, false);
	imagesavealpha($watermark, true);	
	$source = imagecreatefrompng($watermark_url);
	imagealphablending($watermark, false);
	imagesavealpha($watermark, true);	
	// Resize
	imagecopyresized($watermark, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagealphablending($watermark, true);
	imagesavealpha($watermark, true);	
	imagedestroy ( $source );
	//get watermark width
	$watermark_width = imagesx($watermark);
	//get watermark height 
	$watermark_height = imagesy($watermark);
	$pos=explode('-',$position);
	switch($pos[0]){
		//X center
		case "c":
		$wmposx=($x-$watermark_width)/2;
		break;
		//X left
		case "l":
		$wmposx=0;
		break;
		//X rigth
		case "r":
		$wmposx=($x-$watermark_width);
		break;
	}
	switch($pos[1]){
		//Y center
		case "c":
		$wmposy=($y-$watermark_height)/2;
		break;
		//Y top
		case "t":
		$wmposy=0;
		break;
		//Y bottom
		case "b":
		$wmposy=($y-$watermark_height);
		break;
	}
	imagecopymerge_alpha($image_out, $watermark, $wmposx, $wmposy, 0, 0, imagesx($watermark), imagesy($watermark),$opacity);
	imagedestroy ( $watermark );
	imagealphablending($image_out, false);
	imagesavealpha($image_out, true);	

}	
return $image_out;
}
if ($_GET['picture'] != "")
{
    //if get file parameters failed.... :D
   if( file_exists($picfolder.base64_decode($_GET['picture']))){$theimage=$picfolder.base64_decode($_GET['picture']);}
   if( file_exists(base64_decode($_GET['picture']))){$theimage=base64_decode($_GET['picture']);}
   if( file_exists($picfolder.$_GET['picture'])){$theimage=$picfolder.$_GET['picture'];}
   if( file_exists($_GET['picture'])){$theimage=$_GET['picture'];}

    // $theimage=($_GET['picture']);
    $kiterjeszteshez= explode("/",$theimage);
    $kiterjeszteshez2=explode(".",$kiterjeszteshez[count($kiterjeszteshez)-1]);
    $kiterjesztes=strtolower($kiterjeszteshez2[count($kiterjeszteshez2)-1]);
    $filename="";
    for ($i = 0; $i < count($kiterjeszteshez2); $i++) {
        $filename.=strtolower($kiterjeszteshez2[$i]);
    }
    $newfileloc='';
    for ($i = 0; $i < count($kiterjeszteshez)-1; $i++) {
        $newfileloc.=$kiterjeszteshez[$i].'/';
    }
    //create chache
    $newdir=$tempfolder.$newfileloc;
    $newfilename=$filename.'-x'.$_GET['x'].'-y'.$_GET['y'].'-c'.$_GET['c'].'-t'.$_GET['t'].'.'.$ret_ex;
    createdir($newdir);
    if (file_exists($newdir.$newfilename)&&filemtime($newdir.$newfilename)>filemtime($theimage)) {
        switch ($ret_ex) {
            case "jpg":
                $image_exist = imagecreatefromjpeg($newdir.$newfilename);
                $Contenttype = 'image/jpeg';
                header('Content-type: '.$Contenttype);
                imagejpeg($image_exist, NULL, 100);

                break;
            case "jpeg":
                $image_exist = imagecreatefromjpeg($newdir.$newfilename);
                $Contenttype = 'image/jpeg';
                header('Content-type: '.$Contenttype);
                imagejpeg($image_exist, NULL, 70);

                break;
            case "gif":
                $image_exist = imagecreatefromgif($newdir.$newfilename);
                $Contenttype = 'image/gif';
                header('Content-type: '.$Contenttype);
                imagegif($image_exist);
                break;
            case "png":
                $image_exist = imagecreatefrompng($newdir.$newfilename);
                $Contenttype = 'image/png';
                imagealphablending($image_exist, false);
                imagesavealpha($image_exist, true);
                header('Content-type: '.$Contenttype);
                imagepng($image_exist);
                break;
            case "bmp":
                $image_exist = imagecreatefrombmp($newdir.$newfilename);
                $Contenttype = 'image/bmp';
                header('Content-type: '.$Contenttype);
                imagebmp($image_exist);
                break;

            case "webp":
                $image_exist = imagecreatefromwebp($newdir.$newfilename);
                $Contenttype = 'image/webp';
                header('Content-type: '.$Contenttype);
                imagewebp($image_exist, NULL, 100);
                break;
        }
    }
    else
    if (file_exists($theimage)) {
            list($width, $height, $type, $attr)= getimagesize($theimage, $info);
            list($width, $height, $type, $attr)= getimagesize($theimage, $info);
            if (($final_width == "")&&($final_height == "")) {
                $y=$x/$width*$height;
            }
            if (($final_width != "")&&($final_height == "")) {
                $x = $final_width;
                $y=$x/$width*$height;
            }
            if (($final_height != "")&&($final_width == "")) {
                $y = $final_height;
                $x=$width*$y/$height;
            }
            if (($final_width != "")&&($final_height != "")){
                $x = $final_width;
                $y = $final_height;
                if ($width<$height){
                    $y=($x/$width)*$height*2/3;
                    $x=$x*2/3;
                }
                else{
                    $x=($y/$height)*$width;
                    $y=$y;
                }
            }
            $ximg=$x; $yimg=$y;
            if (($final_width != "")&&($final_height != "")&&($crop == 1)){

                if (($final_width/$width)<($final_height/$height) )
                {
                    $ximg=($final_height/$height)*$width;
                    $yimg=$final_height;
                }
                else{
                    $ximg=$final_width;
                    $yimg=($final_width/$width)*$height;
                }
                $posx=($ximg-$final_width)/2;
                $posy=($yimg-$final_height)/2;
                $x = $final_width;
                $y = $final_height;
            }
            $image_out = imagecreatetruecolor($x, $y);

            switch ($kiterjesztes) {
                case "jpg":
                    $image_in = imagecreatefromjpeg($theimage);
                    $Contenttype = 'image/jpeg';
                    break;
                case "jpeg":
                    $image_in = imagecreatefromjpeg($theimage);
                    $Contenttype = 'image/jpeg';
                    break;
                case "gif":
                    $image_in = imagecreatefromgif($theimage);
                    $Contenttype = 'image/gif';
                    break;
                case "png":
                    $image_in = imagecreatefrompng($theimage);
                    $Contenttype = 'image/png';
                    imagealphablending($image_out, false);
                    imagesavealpha($image_out, true);
                    break;
                case "bmp":
                    $image_in = imagecreatefrombmp($theimage);
                    $Contenttype = 'image/bmp';
                    break;

                case "webp":
                    $image_in = imagecreatefromwebp($theimage);
                    $Contenttype = 'image/webp';
                    break;
            }
            imagecopyresized($image_out, $image_in, 0, 0, $posx, $posy, $ximg, $yimg, imagesx($image_in), imagesy($image_in)) or die("CopyResized error");
            if ($watermark==1){
                $image['w']=$x;
                $image['h']=$y;
                $image['image']=$image_out;
                $image_out=watermark($image,$watermarkarray["wm_image"],$watermarkarray["ratio"],$watermarkarray["pos"],$watermarkarray["opacity"]);
            }


            //return image
            switch ($ret_ex) {
                case "jpg":
                   if($create_temp) imagejpeg($image_out, $newdir.$newfilename, 100);
                    $Contenttype = 'image/jpeg';
                    header('Content-type: '.$Contenttype);
                    imagejpeg($image_out, NULL, 100);
                    break;
                case "jpeg":
                    //saveimg
                    if($create_temp) imagejpeg($image_out, $newdir.$newfilename, 70);
                    //showimg
                    $Contenttype = 'image/jpeg';
                    header('Content-type: '.$Contenttype);
                    imagejpeg($image_out, NULL, 70);

                    break;
                case "gif":
                    if($create_temp) imagegif($image_out, $newdir.$newfilename);
                    $Contenttype = 'image/gif';
                    header('Content-type: '.$Contenttype);
                    imagegif($image_out);

                    break;
                case "png":
                    if($create_temp) imagepng($image_out, $newdir.$newfilename);
                    $Contenttype = 'image/png';
                    header('Content-type: '.$Contenttype);
                    imagepng($image_out);
                    break;
                case "bmp":
                   // if($create_temp) imagebmp($image_out, $newdir.$newfilename);
                    $Contenttype = 'image/bmp';
                    header('Content-type: '.$Contenttype);
                    imagebmp($image_out);
                    break;
                case "webp":
                    if($create_temp) imagewebp($image_out, $newdir.$newfilename, 100);
                    $Contenttype = 'image/webp';
                    header('Content-type: '.$Contenttype);
                    imagewebp($image_out, NULL, 100);
                    break;
            }
            imagedestroy($image_in);
            imagedestroy($image_out);
        }
    else echo 'invalid image!';
}
?>