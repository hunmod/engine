<style >
    lframe{
        border: 1px solid #0D0A0A;
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }
    page{
        display: block;
        width: 212mm;
        position: relative;
        float: left;

       /* border: 1px solid #0D0A0A;*/

    }
    etiket{
        position: relative;
        display: block;
        float: left;
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

.e40{
    font-size: 16px;
    height: 29.7mm;
    width: 52.5mm;
    padding: 1em;
}.e24{
        text-align: center;
        vertical-align: center;
    font-size: 16px;
    padding-bottom:0 ;
    padding-top:3mm ;
    padding-left: 5mm;
     padding-right: 5mm;
    height: 34mm;
    width: 60mm;

   /* border: 1px solid #0D0A0A;*/

 }

zip{
    display: block;
    text-align: center;
    font-size: 23px;
    font-weight: 2em;
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
<page>
<?php if ($_GET["p"]>=1){
    $blcell=$_GET["p"]*2;
    for ($i = 1; $i <= $blcell; $i++) {
    ?>
    <etiket class="e24">
    <?php ?>
    </etiket>
    <?php     }   ?>
<?php ?>
<?php }?>
    <etiket class="e24">
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
        <zip>2364</zip>
    </etiket>
        <etiket class="e24">
            <?php echo $orderdatas['name'];?><br />
            <?php echo $orderdatas['city'];?><br />
            <?php echo $orderdatas['address'];?><br />
            <zip><?php echo $orderdatas['zip'];?></zip><br />
        </etiket>
    </page>

<support class="e24">
    <a href="<?= $serverurl?>/includeajax.php?q=shop/print_etiket/<?= $getparams[2]?>&p=<?= $_GET["p"]+1 ?>">+2 etikett</a>
    <a href="<?= $serverurl?>/includeajax.php?q=shop/print_etiket/<?= $getparams[2]?>&p=<?= $_GET["p"]-1 ?>">-2 etikett</a>

</support>






