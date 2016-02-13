<?php
//header("Content-Type: text/html; charset=utf-8");
//https://datamarket.azure.com/developer
$Binguser["clientID"]="Abr4k4h4sb4";
$Binguser["clientSecret"]="gGHoUgqHAbqIxIuMyCHePiDvdjxjKn27TzppGIoe5kk=";
?>
<?php
/*
 * Class:BingTranslator
 *
 * Bing translator class
 https://datamarket.azure.com/developer
 $Binguser["clientID"]="yourid";
 $Binguser["clientSecret"]="secret key";
 */
Class BingTranslator {
    /*
     * Get the access token.
     *
     * @param string $grantType    Grant type.
     * @param string $scopeUrl     Application Scope URL.
     * @param string $clientID     Application client ID.
     * @param string $clientSecret Application client ID.
     * @param string $authUrl      Oauth Url.
     *
     * @return string.
     */    
	 private function getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl){
        try {
            //Initialize the Curl Session.
            $ch = curl_init();
            //Create the request Array.
            $paramArr = array (
                 'grant_type'    => $grantType,
                 'scope'         => $scopeUrl,
                 'client_id'     => $clientID,
                 'client_secret' => $clientSecret
            );
            //Create an Http Query.//
            $paramArr = http_build_query($paramArr);
            //Set the Curl URL.
            curl_setopt($ch, CURLOPT_URL, $authUrl);
            //Set HTTP POST Request.
            curl_setopt($ch, CURLOPT_POST, TRUE);
            //Set data to POST in HTTP "POST" Operation.
            curl_setopt($ch, CURLOPT_POSTFIELDS, $paramArr);
            //CURLOPT_RETURNTRANSFER- TRUE to return the transfer as a string of the return value of curl_exec().
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
            //CURLOPT_SSL_VERIFYPEER- Set FALSE to stop cURL from verifying the peer's certificate.
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //Execute the  cURL session.
            $strResponse = curl_exec($ch);
            //Get the Error Code returned by Curl.
            $curlErrno = curl_errno($ch);
            if($curlErrno){
                $curlError = curl_error($ch);
                throw new Exception($curlError);
            }
            //Close the Curl Session.
            curl_close($ch);
            //Decode the returned JSON string.
            $objResponse = json_decode($strResponse);
            if ($objResponse->error){
                throw new Exception($objResponse->error_description);
            }
            return $objResponse->access_token;
        } catch (Exception $e) {
            echo "Exception-".$e->getMessage();
        }
    }
	
	
    /*
     * Create and execute the HTTP CURL request.
     *
     * @param string $url        HTTP Url.
     * @param string $authHeader Authorization Header string.
     * @param string $postData   Data to post.
     *
     * @return string.
     *
     */
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
	global $Binguser;
	if($inputStr)
	{
		try {
			//Client ID of the application.
			$clientID       = $Binguser["clientID"];
			//Client Secret key of the application.
			$clientSecret = $Binguser["clientSecret"];
			//OAuth Url.
			$authUrl      = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
			//Application Scope Url
			$scopeUrl     = "http://api.microsofttranslator.com";
			//Application grant type
			$grantType    = "client_credentials";
	
			//Create the AccessTokenAuthentication object.
			//$authObj      = new AccessTokenAuthentication();
			//Get the Access token.
			$accessToken  = $this->getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl);
			//Create the authorization Header string.
			$authHeader = "Authorization: Bearer ". $accessToken;
			$contentType  = 'text/plain';
			$category     = 'general';
			$params = "text=".urlencode($inputStr);
			$translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Detect?$params";
			//https://api.datamarket.azure.com/Bing/MicrosoftTranslator/v1/Detect
			//Get the curlResponse.
			$curlResponse = $this->curlRequest($translateUrl, $authHeader);
			//Interprets a string of XML into an object.
			$xmlObj = simplexml_load_string($curlResponse);
			foreach((array)$xmlObj[0] as $val){
				$translatedStr = $val;
			}
			//var_dump($xmlObj);
			return $translatedStr;
		} catch (Exception $e) {
			echo "Exception: " . $e->getMessage() . PHP_EOL;
		}
	}
	}
	
	public function translate($fromLanguage,$toLanguage,$inputStr){
		global $Binguser;
	if($inputStr)
	{
	
		try {
			//Client ID of the application.
			$clientID       = $Binguser["clientID"];
			//Client Secret key of the application.
			$clientSecret = $Binguser["clientSecret"];
			//OAuth Url.
			$authUrl      = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
			//Application Scope Url
			$scopeUrl     = "http://api.microsofttranslator.com";
			//Application grant type
			$grantType    = "client_credentials";
	
			//Create the AccessTokenAuthentication object.
			//$authObj      = new AccessTokenAuthentication();
			//Get the Access token.
			$accessToken  = $this->getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl);
			//Create the authorization Header string.
			$authHeader = "Authorization: Bearer ". $accessToken;
			$contentType  = 'text/plain';
			$category     = 'general';
			$params = "text=".urlencode($inputStr)."&to=".$toLanguage."&from=".$fromLanguage;
			$translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
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




<?php
//$inputStr= ('<div>	It may be a form of Vajaz (pie oven, but my cake form I created.</div>');
//$trnslate = new BingTranslator();
//echo $trnslate->detect($inputStr);
//echo $trnslate->translate($fromLanguage="en",$toLanguage="hu",$inputStr);
?>