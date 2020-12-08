<style >
    lframe{
        border: 1px solid #0D0A0A;
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }

    buyer,seller {
        padding: 1em;
/*        border: 1px solid #0D0A0A;*/
        display: block;
        position: absolute;
        font-size: 1.3em;

    }
    buyer{
        right: 0;
        bottom: 0;
        width: 40%;
        height: 40%;
    }
    seller{
        left: 4%;
        top: 3%;
        width: 40%;
        height: 40%;

    }

    .c6{
        width: 162mm;
        height: 114mm;
    }
    .a11{
        width: 176mm;
        height: 118mm;
    }
    .c13{
        width: 226mm;
        height: 172mm;
    }


    @media print {
        lframe{
           /* border: none;*/
        }

        support{
            display: none;
        }

    }


</style>

<?php
if($getparams[2]>1){
$filtersxx["id"]=$getparams[2];
$filtersxx["status"]="all";
$datas=$ShopClass->get_shop_order($filtersxx);
$orderdatas=$datas["datas"][0];
}
if($_GET["s"]==""){
    $_GET["s"]="c13";
}


?>
<lframe class="<?= $_GET["s"]?>">
    <seller>
        <strong>
                 <span style="background-color:#8e44ad;color:#ff66ff;font-size:24px;font-family:Comic Sans MS,cursive;margin-right: -5px;padding-right: 3px;">O</span>
            <span style="font-size:22px;font-family:Times New Roman,Times,serif">
                    <span style="color:#3498db">k</span>
                <span style="color:#ff33ff">o</span>
                <span style="color:#ff0033">s</span>
                <span style="color:#f39c12">f</span>
                <span style="color:#f1c40f">ű</span>
                <span style="color:#9b59b6">z</span>
                <span style="color:#16a085">ő&nbsp;</span>
            </span>
                        </strong>

        <br />
        Nagy Péter<br />
        Ócsa<br />
        Kálvin u. 26.<br />
        2364
    </seller>
        <buyer>
            <?php echo $orderdatas['name'];?><br />
            <?php echo $orderdatas['city'];?><br />
            <?php echo $orderdatas['address'];?><br />
            <b><?php echo $orderdatas['zip'];?></b><br />
        </buyer>



</lframe>
<support>
<a href="<?= $serverurl?>/includeajax.php?q=shop/print_leter/<?= $getparams[2]?>&s=c6"><?= lan('c6')?></a>
<a href="<?= $serverurl?>/includeajax.php?q=shop/print_leter/<?= $getparams[2]?>&s=a11"><?= lan('A11 (kis pukis)')?></a>
<a href="<?= $serverurl?>/includeajax.php?q=shop/print_leter/<?= $getparams[2]?>&s=c13"><?= lan('C13 (Közepes pukis)')?></a>
</support>