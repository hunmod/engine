<?php

function download_image1($image_url, $image_file){
    $fp = fopen ($image_file, 'w+');
    $ch = curl_init($image_url);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
    curl_setopt($ch, CURLOPT_FILE, $fp); // output to file
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000); // some large value to allow curl to run for a long time
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    // curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable this line to see debug prints
    curl_exec($ch);
    curl_close($ch); // closing curl handle
    fclose($fp); // closing file handle
}
function get_furl($url)
{
    $furl = false;
    // First check response headers
    $headers = get_headers($url);
    // Test for 301 or 302
    if(preg_match('/^HTTP\/\d\.\d\s+(301|302)/',$headers[0]))
    {
        foreach($headers as $value)
        {
            if(substr(strtolower($value), 0, 9) == "location:")
            {
                $furl = trim(substr($value, 9, strlen($value)));
            }
        }
    }
    // Set final URL
    $furl = ($furl) ? $furl : $url;
    return $furl;
}

$googlemapreq=new gmap();


if ($_GET["name"]){
    $filters['cim']=$_GET["name"];
}
if ($_GET["s"]){
    $filters['s']=$_GET["s"];
}

$filters['notaddr']=1;
$filters['maxegyoldalon']=1;
$qhir=$bf_class->get($filters,'',$_GET["page"]) ;
$hirekelemek=($qhir['datas']);

//arraylist($qhir);


if ($hirekelemek){
    foreach($hirekelemek as $elem) {
        $citydata = $Location_Class->get_city(array('id' => $elem["varos"]));
        $elem["varos_nev"] = $citydata['datas'][0]["city_name"];
        // $elem['g_s']=$elem['zip'].','.$elem['varos_nev'];
        //$rdatas[$i]['g_b']=$googlemapreq->get_google_geocoding($rdatas[$i]['g_s'],$rdatas[$i]['nev']);
        $googleback = $googlemapreq->get_google_place($citydata['datas'][0]['lati'] . ',' . $citydata['datas'][0]['longi'], $elem['nev']);
        // echo($googleback[0]['name']);
        // echo($googleback[0]['vicinity']);
        $elem['lati'] = $googleback[0]["geometry"]["location"]["lat"];
        $elem['longi'] = $googleback[0]["geometry"]["location"]["lng"];
        $elem['cim'] = $googleback[0]['vicinity'];
        $cimarray = explode(',', $elem['cim']);
        if (count($cimarray) == 2)
        {
            $elem['street'] = $TextClass->htmltochars($cimarray[1]);

        }else{
            $elem['street'] = $TextClass->htmltochars( $elem['cim']);
        }
        if ( $elem['street']==""){ $elem['street']='XX';}
        $id=$bfclass->save($elem);
        arraylist($elem);
        arraylist($googleback);
        echo $id;
        $targetfldr='uploads/bf/'.$id;

        if (count($googleback[0]["photos"])) {
            $UploadClass->createdir($targetfldr);

            $gimg="https://maps.googleapis.com/maps/api/place/photo?maxwidth=".$googleback[0]["photos"][0]["width"]."&photoreference=".$googleback[0]["photos"][0]["photo_reference"]."&key=".$google_api_key;
            download_image1($gimg, $targetfldr.'.jpg');
            foreach ($googleback[0]["photos"] as $gph){
                $fn=rand(1203,9999);
                $gimg="https://maps.googleapis.com/maps/api/place/photo?maxwidth=".$gph["width"]."&photoreference=".$gph["photo_reference"]."&key=".$google_api_key;
                download_image1($gimg, $targetfldr.'/'.$fn.'.jpg');


            }
           ?>

        <?php     }

        sleep(1);
    }}


?>

<script>
    $( document ).ready(function() {
        setTimeout("location.reload(true);",10000);
    });

</script>
