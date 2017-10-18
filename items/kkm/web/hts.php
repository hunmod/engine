<?php
$mytext='';
$myfile = fopen("./items/kkm/web/".$storryid."/ht1-intro.html", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
    $mytext.= fgets($myfile);
}

if ($_COOKIE["mese"][$_SESSION['storry']]['oldal']>1){
   header("Location: ".$homeurl.'/kkm/ht/'.$_COOKIE["mese"][$_SESSION['storry']]['oldal']);


}


$elem2['text2']= striptextkkm1($mytext);
//oldalak cseréje
preg_match_all("|<+[lnum>]+>(.*)</[lnum>]+>|U",$elem2['text2'], $out);
unset($outcc);


//$out[0]=array("17","30");
//  var_dump($out[0]);

foreach ($out[0] as $oel){
    //$oel2=intval($oel);
    //$oel2=$oel;
    $oel2=(int)str_replace(' ', '', $oel);
    $oel2 = urlencode($oel);
    $oel2=str_replace('%3Clnum%3E', '', $oel2);
    $oel2=str_replace('%3C%2Flnum%3E', '', $oel2);
    $oel2=str_replace('+', '', $oel2);
    $oel2=$oel2*1;
    /* var_dump($oel);
     echo "<br>";
     var_dump($oel2);
     echo "<hr>";*/

    //$oel=str_replace(' ','',convert_cyr_string($oel));
    $hrefurl=$homeurl.'/kkm/ht/'.$oel2;

    $elem2['text2']= str_replace('<lnum>'.$oel2.'</lnum>','<a href="'.$hrefurl.'"\>'.$oel2.'</a>',$elem2['text2']);
    $elem2['text2']= str_replace('<lnum> '.$oel2.'</lnum>','<a href="'.$hrefurl.'"\>'.$oel2.'</a>',$elem2['text2']);
    // $outcc[]='<a href="'.$hrefurl.'">'.$oel.'</a>'.' X {lnum}'.$oel.'{/lnum}';

    $outcc[]=$oel2;

}

$elem2['text2_out']=$outcc;
$elem2['oldal']=$elemideglenes[0];

$newarray[] = $elem2;

fclose($myfile);


?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.match-height').matchHeight();
      });
</script>
    <div class="col-sm-7">
<?php
if ($getparams[2]-1>=0){
    echo ($newarray[$getparams[2]-1]["text2"]);
}

echo($elem2['text2']);


?>
  </div>
<div class="col-sm-5">
    <?php include('csata.php'); ?>
    <?php include('szerencsepanel.php'); ?>

    <?php include('karakterlap.php'); ?>
    <?php include('info.php'); ?>
</div>