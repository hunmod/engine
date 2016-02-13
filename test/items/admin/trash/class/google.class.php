<?php
//
class gmap{

public function get_google_geocoding($address)
{
	global $google_api_key;
	$address=str_replace(" ", "+", $address);
	$curl="https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=".$google_api_key;
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
	//    echo 'Operation completed without any errors';
	//	echo $output;
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


} 
?>