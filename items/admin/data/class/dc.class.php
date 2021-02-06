<?php
define("discordwebhookurl", "https://discord.com/api/webhooks/807617199379578891/okHM0Rbn0OGPy3V86cdDtGZqd65_mi83jKd4IH2NYXC1mgNZLUg2MzjurXREoJRw9Y_K");
class discord{

public function get_token()
{
    global $webhookurl;
//get webhook
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, discordwebhookurl);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
}
private function run_json($jsondata){
    global $webhookurl;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, discordwebhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsondata);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);

}
public function sendmessage($username,$message)
{
    $dcsenddata["username"] = $username;
    $dcsenddata["content"] = $message;
    $dcsenddata["avatar_url"] = "http://hunmod.eu/picture.php?picture=dXBsb2Fkcy9faG5tZC8vZmlsZXMvMTcvMjAxNzA0MjcxMzI1MDguanBn&x=100?ext=.jpg";


    $this->run_json(json_encode($dcsenddata));
}
}
$discord=new discord();

//$discord->sendmessage("server","bbg") );

?>







