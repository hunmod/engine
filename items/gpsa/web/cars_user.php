<?php

$UserClass=new user();

//cardata
$filters["szerzszam"]=$getparams[2];
$selecteduserdatas=$gpsacars_class->get_cars($filters,$order='',$page='all');
$selectedcar=$selecteduserdatas["datas"][0];
//$Usercars
//arraylist($selectedcar);


//actions
if ($_GET["d"]){
    $ddatas["uid"]=$_GET["d"];
    $ddatas["cid"]=$selectedcar["szerzszam"];
    $gpsacars_class-> del_user_car($ddatas);
}

if ($_GET["a"]){
    $ddatas["uid"]=$_GET["a"];
    $ddatas["cid"]=$selectedcar["szerzszam"];
    $gpsacars_class-> save_user_car($ddatas);
    //arraylist($ddatas);

}



//user cars
$ficcar["cid"]=$selectedcar["szerzszam"];
$Thusercars=$gpsacars_class->get_usercar($ficcar);
//arraylist($Thusercars);

foreach ($Thusercars["datas"] as $thcar ){
    if ($usersid!="")$usersid.=',';
    $usersid.=$thcar['uid'];
}
if ($usersid=="")$usersid='-1';
$ufilter['inid']=$usersid;
$conusers=$UserClass->get_users($ufilter);
//arraylist($conusers);


//összes user
$carfilter['notid']=$usersid;
if ($_GET['name']){
    $carfilter['name']=$_GET['name'];
}
$allusers=$UserClass->get_users($carfilter);
?>

<div class="col-xs-12">
    <H1><?= $selectedcar["vrendszam"] ?> cars</H1>
</div>


<div class="col-xs-6">
<?php
//echo $carsid."<hr>";
//arraylist($Thusercars["datas"]);
foreach ($conusers["datas"] as $cl){
    ?>
    <div class="col-xs-8"><?= $cl["unev"]; ?></div>
    <div class="col-xs-4"><a href="<?= $homeurl.'/'.$_GET['q']."?d=".$cl["id"]."&name=".$_GET["name"]; ?>">>></a></div>
    <?php
}
?>
</div>

<div class="col-xs-6">
    <form method="get">
        <input type="text" name="name" value="<?= $_GET["name"];?>">
        <input type="submit" value="Search">
    </form>
    <?php
   // arraylist($allcars);
    foreach ($allusers["datas"] as $cl){
        ?>
        <div class="col-xs-4"><a href="<?= $homeurl."/".$_GET['q']."?a=".$cl["id"]."&name=".$_GET["name"]; ?>"><<</a></div>
        <div class="col-xs-8"><?= $cl["unev"]; ?></div>
        <?php
    }
    ?>


</div>
