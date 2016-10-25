
<div class="container">
    <h1><?= lan('regioimport') ?></h1>
    <div class="col-sm-12">

<?php
$importer = new CsvImporter("./items/locations/web/AT.txt",true);
$datas2 = $importer->get();
//print_r($data);
$colsm='2';
?>


<?php foreach ($datas2 as $row){
    $regiofilter['regio_namep']=$row["country"];
    $regiodatas=$location_class->get_region($regiofilter);

    if (!$regiodatas["datas"][0]["regio_id"]) {
        $regiodata = $regiodatas["datas"][0]["regio_id"];
    }else{
        $datas["country_id"] = "2";
        $datas["regio_name"] = $row["reg1"];
        $regiodata = $location_class->save_region($datas);
    }
//`regio_name` = ''
?>
<div class="row">
   <div class="col-sm-<?=$colsm ?>"> <?php echo $row["zip"];?></div>
   <div class="col-sm-<?=$colsm ?>"> <?php echo ($regiodata);?></div>
   <div class="col-sm-<?=$colsm ?>"> <?php echo $row["reg1"];?></div>
   <div class="col-sm-<?=$colsm ?>"> <?php echo $row["reg2"];?></div>
   <div class="col-sm-<?=$colsm ?>"> <?php echo $row["reg3"];?></div>
   <div class="col-sm-<?=$colsm ?>"> <?php echo $row["country"];?></div>

    <?php
    //arraylist($row);
    ?>


</div>
<?php

}

?>

<?php
        /*$row = 1;
if (($handle = fopen("./items/locations/web/AT.txt", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, "/n/r")) !== FALSE) {
        $num = count($data);
        $row++;
        $data+=$iarr=explode('	',$data[0]);
        //$data+=explode('.',$data[0]);
        //$data['d']="ds";
        $datas2[]=$data;

    }
    fclose($handle);
}
*/
//arraylist($datas2);
?>    </div>
</div>
