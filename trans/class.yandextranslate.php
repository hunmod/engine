<?php
$yandexapikey="trnsl.1.1.20151125T222440Z.fb12bf351e69a167.013217e33c219bb1c258065186c240625753038a";
class yandextranslate{
	
   private function curlRequest($url, $authHeader) {
        //Initialize the Curl Session.
        $ch = curl_init();
		curl_setopt($ch,CURLOPT_HEADER,0);
        //Set the Curl url.
        curl_setopt ($ch, CURLOPT_URL, $url);
        //Set the HTTP HEADER Fields.
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array($authHeader,"Content-Type: text/xml"));
        //CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, False);
        //Execute the  cURL session.
        $curlResponse = curl_exec($ch);
        //Get the Error Code returned by Curl.
        $curlErrno = curl_errno($ch);
        if ($curlErrno) {
            $curlError = curl_error($ch);
            throw new Exception($curlError);
        }
        //Close a cURL session.
        curl_close($ch);
        return $curlResponse;
    }	
	public function detect($inputStr)
	{
	global $yandexapikey;
	if($inputStr)
	{
		try {
			$params="key=".$yandexapikey."&text=".urlencode($inputStr)."&lang=".$fromLanguage."-".$toLanguage."";
		
			
			$translateUrl = "https://translate.yandex.net/api/v1.5/tr/detect?".$params;
			//Get the curlResponse.
			$curlResponse = $this->curlRequest($translateUrl, $authHeader);
			//Interprets a string of XML into an object.
			$xmlObj = simplexml_load_string($curlResponse);
			foreach((array)$xmlObj[0] as $val){
				$translatedStr = $val;
			}
			return $translatedStr;
		} catch (Exception $e) {
			echo "Exception: " . $e->getMessage() . PHP_EOL;
		}
	}

	}

	public function translate($fromLanguage,$toLanguage,$inputStr){
		global $yandexapikey;
	if($inputStr)
	{
		try {
			$params="key=".$yandexapikey."&text=".urlencode($inputStr)."&lang=".$fromLanguage."-".$toLanguage."";
		
			
			$translateUrl = "https://translate.yandex.net/api/v1.5/tr/translate?".$params;
			//Get the curlResponse.
			$curlResponse = $this->curlRequest($translateUrl, $authHeader);
			//Interprets a string of XML into an object.
			$xmlObj = simplexml_load_string($curlResponse);
			foreach((array)$xmlObj[0] as $val){
				$translatedStr = $val;
			}
			return $translatedStr;
		} catch (Exception $e) {
			echo "Exception: " . $e->getMessage() . PHP_EOL;
		}
	}
	}
	
	
	
	
}






?>