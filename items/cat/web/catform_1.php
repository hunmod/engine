<?php
$filterssubcat["lang"]=$filtersrootcat["lang"]=$_SESSION["lang"];
if (!$filtersextcat){
$filtersrootcat["kat"]="root";
}else{
$filtersrootcat["id"]=	$filtersextcat;
}
//if (!$adminv)$filters['ido']=$date;
$qrootcat=$category_class->get($filtersrootcat,'',$_GET["page"]) ;
//arraylist($qrootcat);
if ($qrootcat['datas'])
    foreach ($qrootcat['datas'] as $rcat){
    ?>
        <div class="<?= $rcat['id']?>">
        <b><?= $rcat['nev']?></b><br>
<?php
$filterssubcat["kat"]=$rcat['id'];
$qsubroot=$category_class->get($filterssubcat,'',$_GET["page"]) ;
        if ($qsubroot['datas'])
            foreach ($qsubroot['datas'] as $scat){
                $value=0;
                if($adat['services'][$rcat['id']][$scat['id']])$value=1;
                $caption=hotelicon_print($scat['class'], 50, 'fekete',$scat['nev']);
                //$caption=lan($hat);
                $FormClass->checkbox('services['.$rcat['id'].']['.$scat['id'].']',$value,$caption,$class="checkbox-addonservice");
?><?= $scat['nev']?>

            <?php } ?>
        </div>
    <?php } ?>