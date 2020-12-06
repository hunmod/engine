<?php

$iptcHeaderArray = array
(
    '2#005'=>'DocumentTitle',
    '2#010'=>'Urgency',
    '2#015'=>'Category',
    '2#020'=>'Subcategories',
    '2#040'=>'SpecialInstructions',
    '2#055'=>'CreationDate',
    '2#080'=>'AuthorByline',
    '2#085'=>'AuthorTitle',
    '2#090'=>'City',
    '2#095'=>'State',
    '2#101'=>'Country',
    '2#103'=>'OTR',
    '2#105'=>'Headline',
    '2#110'=>'Source',
    '2#115'=>'PhotoSource',
    '2#116'=>'Copyright',
    '2#120'=>'Caption',
    '2#122'=>'CaptionWriter'
);
//


$size = GetImageSize ("$image_name",&$info);
$iptc = iptcparse ($info["APP13"]);
if (isset($info["APP13"]))
{
$iptc = iptcparse($info["APP13"]);
        if (is_array($iptc)) {
            $caption = $iptc["2#120"][0];
            $graphic_name = $iptc["2#005"][0];
            $urgency = $iptc["2#010"][0];
            $category = $iptc["2#015"][0];
            // note that sometimes supp_categories contans multiple entries
            $supp_categories = $iptc["2#020"][0];
            $spec_instr = $iptc["2#040"][0];
            $creation_date = $iptc["2#055"][0];
            $photog = $iptc["2#080"][0];
            $credit_byline_title = $iptc["2#085"][0];
            $city = $iptc["2#090"][0];
            $state = $iptc["2#095"][0];
            $country = $iptc["2#101"][0];
            $otr = $iptc["2#103"][0];
            $headline = $iptc["2#105"][0];
            $source = $iptc["2#110"][0];
            $photo_source = $iptc["2#115"][0];
            $caption = $iptc["2#120"][0];    }}


//
function output_iptc_data( $image_path ) {
    $size = getimagesize ( $image_path, $info);
    if(is_array($info)) {
        $iptc = iptcparse($info["APP13"]);
        foreach (array_keys($iptc) as $s) {
            $c = count ($iptc[$s]);
            for ($i=0; $i <$c; $i++)
            {
                echo $s.' = '.$iptc[$s][$i].'<br>';
            }
        }
    }
}

//
function transferIptcExif2File($srcfile, $destfile) {
    // Function transfers EXIF (APP1) and IPTC (APP13) from $srcfile and adds it to $destfile
    // JPEG file has format 0xFFD8 + [APP0] + [APP1] + ... [APP15] + <image data> where [APPi] are optional
    // Segment APPi (where i=0x0 to 0xF) has format 0xFFEi + 0xMM + 0xLL + <data> (where 0xMM is
    //   most significant 8 bits of (strlen(<data>) + 2) and 0xLL is the least significant 8 bits
    //   of (strlen(<data>) + 2)

    if (file_exists($srcfile) && file_exists($destfile)) {
        $srcsize = @getimagesize($srcfile, $imageinfo);
        // Prepare EXIF data bytes from source file
        $exifdata = (is_array($imageinfo) && key_exists("APP1", $imageinfo)) ? $imageinfo['APP1'] : null;
        if ($exifdata) {
            $exiflength = strlen($exifdata) + 2;
            if ($exiflength > 0xFFFF) return false;
            // Construct EXIF segment
            $exifdata = chr(0xFF) . chr(0xE1) . chr(($exiflength >> 8) & 0xFF) . chr($exiflength & 0xFF) . $exifdata;
        }
        // Prepare IPTC data bytes from source file
        $iptcdata = (is_array($imageinfo) && key_exists("APP13", $imageinfo)) ? $imageinfo['APP13'] : null;
        if ($iptcdata) {
            $iptclength = strlen($iptcdata) + 2;
            if ($iptclength > 0xFFFF) return false;
            // Construct IPTC segment
            $iptcdata = chr(0xFF) . chr(0xED) . chr(($iptclength >> 8) & 0xFF) . chr($iptclength & 0xFF) . $iptcdata;
        }
        $destfilecontent = @file_get_contents($destfile);
        if (!$destfilecontent) return false;
        if (strlen($destfilecontent) > 0) {
            $destfilecontent = substr($destfilecontent, 2);
            $portiontoadd = chr(0xFF) . chr(0xD8);          // Variable accumulates new & original IPTC application segments
            $exifadded = !$exifdata;
            $iptcadded = !$iptcdata;

            while ((substr($destfilecontent, 0, 2) & 0xFFF0) === 0xFFE0) {
                $segmentlen = (substr($destfilecontent, 2, 2) & 0xFFFF);
                $iptcsegmentnumber = (substr($destfilecontent, 1, 1) & 0x0F);   // Last 4 bits of second byte is IPTC segment #
                if ($segmentlen <= 2) return false;
                $thisexistingsegment = substr($destfilecontent, 0, $segmentlen + 2);
                if ((1 <= $iptcsegmentnumber) && (!$exifadded)) {
                    $portiontoadd .= $exifdata;
                    $exifadded = true;
                    if (1 === $iptcsegmentnumber) $thisexistingsegment = '';
                }
                if ((13 <= $iptcsegmentnumber) && (!$iptcadded)) {
                    $portiontoadd .= $iptcdata;
                    $iptcadded = true;
                    if (13 === $iptcsegmentnumber) $thisexistingsegment = '';
                }
                $portiontoadd .= $thisexistingsegment;
                $destfilecontent = substr($destfilecontent, $segmentlen + 2);
            }
            if (!$exifadded) $portiontoadd .= $exifdata;  //  Add EXIF data if not added already
            if (!$iptcadded) $portiontoadd .= $iptcdata;  //  Add IPTC data if not added already
            $outputfile = fopen($destfile, 'w');
            if ($outputfile) return fwrite($outputfile, $portiontoadd . $destfilecontent); else return false;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


// iptc_make_tag() function by Thies C. Arntzen
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

// Path to jpeg file
$path = './phplogo.jpg';

// Set the IPTC tags
$iptc = array(
    '2#120' => 'Test image',
    '2#116' => 'Copyright 2008-2009, The PHP Group'
);

// Convert the IPTC tags into binary code
$data = '';

foreach($iptc as $tag => $string)
{
    $tag = substr($tag, 2);
    $data .= iptc_make_tag(2, $tag, $string);
}

// Embed the IPTC data
$content = iptcembed($data, $path);

// Write the new image data out to the file.
$fp = fopen($path, "wb");
fwrite($fp, $content);
fclose($fp);



////
///
///
///
///
?>
