<?php

$facebook = new Facebook(array(
    'appId' => '464118993709707',
    'secret' => '20f793b4d8bfd05441cf47959e5cde81'
));


$params["access_token"]="CAANaVIM9IXYBAPt6oJhZBLiyT5V8BrYxiCW99681iNSiANgmzTZBGzp2tXWZAhTy5PuM72MVbUk4vgakP6Yn5UJDeIlX0xCRR81igsNiDUxf8GhzBMG1RL4n1aSlrMRWuZBlOcIJnb1E81DpoyJDbrkxI3dxCHH2pr3Xxr5gvW8vaBiSLVE3G8Q1m6DionnVH86k1J7pXKMG2MZBsDi9m";
$params["access_token"]="CAAGmHRZCA6osBAMirXZCA1YKQFDpUyQJOlOhR0IHr9jjsmchUSzsktlhRGBKz36ZBkm6oCwKUPKEZC7Q6BTWQpBHLcyX1XvWZBvIzuRcBdZBHVGWR3ClMia34FymKvhl9WDfe8PVghwnMnyKKgf5PZBTexVZBsZBGjnZBParPim3N55Qw5Yz6WtpjG";
//$params["message"]="messs";
$params["link"]="http://abrakahasba.hu";
//$params["picture"]="http://i.imgur.com/lHkOsiH.png";
//$params["name"]="my name";
//$params["caption"]="caption";
//$params["description"]="description";
/*
try {
$retm= $facebook->api('145181848905382/feed', 'POST', $params);
} catch(Exception $e) 
{
echo $e->getMessage();
}
*/

?>



<recipes>
<?php if ($auser["id"]>0){ ?>
<recipe class="col-lg-3 col-md-4 col-sm-6">
<a href="<?php echo $homeurl.$separator.$getparams[0]."/edit";?>">
    <div class="imgframe bgcolor0">
	    <img src="<?php echo ($homeurl."/uploads/".$defaultimg);?>" />
    </div>
    <h2><?php echo $lan['ujrecept'];?></h2>
    <div class="clear"></div>  
    <div class="text bgcolor1 border1">
        <?php echo $lan['ujreceptclick'];?>
    </div>
    <div class="tabla">
    </div>
     </a>
</recipe>
<?php }?>
<?php
//arraylist($dbadat);
//arraylist($dbadat[0]);
//echo $dbadat[0]['id'];

$current=$dbadat[0]['id'];
// Write the contents back to the file
if($current>0)file_put_contents($Utolsoelemfile, $current);


/*$expires = time() + 60 * 60 * 2;
$accessToken = new Facebook\Authentication\AccessToken('{example-access-token}', $expires);*/
//var_dump($facebook);



foreach ($dbadat as $recip){
//postolás FB csoportba
$params["access_token"]="CAAGmHRZCA6osBAMirXZCA1YKQFDpUyQJOlOhR0IHr9jjsmchUSzsktlhRGBKz36ZBkm6oCwKUPKEZC7Q6BTWQpBHLcyX1XvWZBvIzuRcBdZBHVGWR3ClMia34FymKvhl9WDfe8PVghwnMnyKKgf5PZBTexVZBsZBGjnZBParPim3N55Qw5Yz6WtpjG";
//$params["message"]="messs";
$params["link"]=$rec_class->recipe_url($recip);
//$params["picture"]="http://i.imgur.com/lHkOsiH.png";
//$params["name"]="my name";
//$params["caption"]="caption";
//$params["description"]="description";


//https://www.facebook.com/abrakahasba/photos/a.378803708898614.1073741826.378799825565669/417320631713588/?type=3
try {
$retm= $facebook->api('378799825565669/feed', 'POST', $params);
} catch(Exception $e) 
{
echo $e->getMessage();
}
//





	
include("recipe_box1.php");
}
?>
</recipes>

</section>   
 
</div>  
    <div class="clear"></div> 

 <section class="container">  
<?php
//$ADS_list=(random_ads_by_group('1,13',1));
if (count($ADS_list)>=1){
	foreach ($ADS_list as $elem){
		//print_ads($elem);		
	}
}
?>  
 
    <div class="attencion">
    A megjelenő értékek kalkulált értékek, melyek a hozzávalók összetétel minőségétől,gyártótól függően eltérhetnek az általunk tárolt adatoktól!<br />
    Ezért csak iránymutatónak haszálhatóak, ebből adodó esetleges károkért a felelőséget nem tudjuk vállani.
    </div>
</section>
</div> 

 