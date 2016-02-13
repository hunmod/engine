<?php

$Q="Select * FROM ".$tbl["site_text"]." WHERE `lang_id` ='1'";
$lista=db_Query($Q, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],'', "select");




//arraylist($lista);
?>

<?php
foreach ($lista as $egy){ ?>

<? echo $egy["id"]; ?>  
<a href="<?php echo $separator.$getparams[0]."/sitetext_edit/".encode($egy["id"]); ?>">szerkeszt</a><br />

<?php } ?>