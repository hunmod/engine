<?php
$UserClass=new user();

//userdata
$filters["id"]=$getparams[2];
$selecteduserdatas=$UserClass->get_users($filters,$order='',$page='all');
$selecteduser=$selecteduserdatas["datas"][0];
//$Usercars
//arraylist($selecteduser);


//actions
if ($_GET["d"]){
    $ddatas["uid"]=$filters["id"];
    $ddatas["cid"]=$_GET["d"];
    $gpsacars_class-> del_user_car($ddatas);
}

if ($_GET["a"]){
    $ddatas["uid"]=$filters["id"];
    $ddatas["cid"]=$_GET["a"];
    $gpsacars_class-> save_user_car($ddatas);
}



//user cars
$ficar["uid"]=$filters["id"];
$Thusercars=$gpsacars_class->get_usercar($ficar);

foreach ($Thusercars["datas"] as $thcar ){
    if ($carsid!="")$carsid.=',';
    $carsid.=$thcar['cid'];
}

//összes auto
$carfilter['notid']=$carsid;
if ($_GET['s']){
    $carfilter['s']=$_GET['s'];
}
$allcars=$gpsacars_class->get_cars($carfilter);
?>

<div class="col-xs-12">
    <H1><?= $selecteduser["unev"] ?> cars</H1>
</div>


<div class="col-xs-6">
<?php
//echo $carsid."<hr>";
//arraylist($Thusercars["datas"]);
foreach ($Thusercars["datas"] as $cl){
    ?>
    <div class="col-xs-8"><?= $cl["vrendszam"]; ?></div>
    <div class="col-xs-4"><a href="<?= $homeurl.'/'.$_GET['q']."?d=".$cl["cid"]."&s=".$_GET["s"]; ?>">>></a></div>
    <?php
}
?>
</div>

<div class="col-xs-6">
    <form method="get">
        <input type="text" name="s" value="<?= $_GET["s"];?>">
        <input type="submit" value="Search">
    </form>
    <?php
   // arraylist($allcars);
    foreach ($allcars["datas"] as $cl){
        ?>
        <div class="col-xs-4"><a href="<?= $homeurl."/".$_GET['q']."?a=".$cl["szerzszam"]."&s=".$_GET["s"]; ?>"><<</a></div>

        <div class="col-xs-8"><?= $cl["vrendszam"]; ?></div>
        <?php
    }
    ?>


</div>
