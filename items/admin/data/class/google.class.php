<?php
//
class gmap{

public function get_google_geocoding($address,$kv=null)
{
	global $google_api_key;
	if ($kv){
		$optparams='&name='.str_replace(" ", "+", $kv);
	}
	$address=str_replace(" ", "+", $address);
	$curl="https://maps.googleapis.com/maps/api/geocode/json?address=hungary,".$address.$optparams."&key=".$google_api_key;
	$ch = curl_init($curl);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false); 
		curl_setopt($ch,CURLOPT_PORT,443); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
	//var_dump($output);
	if(curl_exec($ch) === false)
	{
	    echo 'Curl error: ' . curl_error($ch);
		$retval["error"]=curl_error($ch);
	}
	else
	{
	//    echo 'Operation completed without any errors';
		//echo $output;
		$mydata=(json_decode($output, TRUE));
		if (count($mydata["results"]>0))
		{
			$retval=($mydata["results"]);
		}
		else
		{
			$retval=($mydata);
		}
	}
	$retval['uri']=$curl;

	// Close handle
	curl_close($ch);
	return $retval;
}
	public function get_google_place($lognglat,$kw=null)
{
	global $google_api_key;
	if ($kw){
		$optparams='&name='.str_replace(" ", "%20", $kw);
	}

	//$curl="https://maps.googleapis.com/maps/api/place/nearbysearch/output?address=hungary,".$address.$optparams."&key=".$google_api_key;
	$curl="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$lognglat.'&radius=10000'.$optparams."&key=".$google_api_key;
	//https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&type=restaurant&keyword=cruise&key=YOUR_API_KEY

	$ch = curl_init($curl);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_PORT,443);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
	//var_dump($output);
	if(curl_exec($ch) === false)
	{
	    echo 'Curl error: ' . curl_error($ch);
		$retval["error"]=curl_error($ch);
	}
	else
	{
	//    echo 'Operation completed without any errors';
		//echo $output;
		$mydata=(json_decode($output, TRUE));
		if (count($mydata["results"]>0))
		{
			$retval=($mydata["results"]);
		}
		else
		{
			$retval=($mydata);
		}
	}
	$retval['uri']=$curl;

	// Close handle
	curl_close($ch);
	return $retval;
}
public function get_google_geocdata($lat,$long)
{
	global $google_api_key;
	$address="latlng=".$long.",".$lat."&sensor=false";
	$curl="https://maps.googleapis.com/maps/api/geocode/json?".$address."&key=".$google_api_key;
	//echo $curl;
	$ch = curl_init($curl);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_PORT,443);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);

	if(curl_exec($ch) === false)
	{
	//    echo 'Curl error: ' . curl_error($ch);
		$retval["error"]=curl_error($ch);
	}
	else
	{
	   // echo 'Operation completed without any errors';
		//echo $output;
		$mydata=(json_decode($output, TRUE));
		if (count($mydata["results"]>0))
		{
			$retval=($mydata["results"]);
		}
		else
		{
			$retval=($mydata);
		}
	}
	// Close handle
	curl_close($ch);
	return $retval;
}


    public   function distance($lat1, $lon1, $lat2, $lon2, $unit='K')
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad( $lat1 )) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K")
        {
            return ($miles * 1.609344);
        }
        else
            if ($unit == "N")
            {
                return ($miles * 0.8684);
            }
            else
            {
                return $miles;
            }

    }


    function latlngmaxmin($lat,$lon,$distance){

        /*$lat = 50.223137; //latitude
        $lon = 18.679558; //longitude
        $distance = 50; //your distance in KM*/
        $R = 6371; //constant earth radius. You can add precision here if you wish

        $ret['maxlat'] = $lat + rad2deg($distance/$R);
        $ret['minlat'] = $lat - rad2deg($distance/$R);
        $ret['maxlon']  = $lon + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
        $ret['minlon']  = $lon - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));

     return $ret;
    }


}
$Google_Class = new gmap();

?>