<?php
//$menuadatok=menuadat2($menustart);
//$menustart=0;
$menuadatok=$MenuClass->get_menus_down($menuadmin,array("status"=>"all"),$order='sorrend,nev ASC') ;

//arraylist($menuadatok);
//0/1

function menuprint($menuadatok)
{
    global $menustatusarray;
	global $homeurl,$separator,$thisformjog,$auser,$buttons,$getparams,$lan;
	if (count($menuadatok))
	foreach ($menuadatok as $menuadat)
	{
		if ($menuadat["item"]==""){$menuadat["item"]=$menuadat["id"];}
	?>
        <div style="text-align:left;" class="statusclass_<?= $menuadat["status"]?>">
        <a href="<?php echo $homeurl.$separator.$menuadat["modul"]."/".$menuadat["file"]."/".$menuadat["item"] ?>">
        <?php echo $menuadat["nev"];?>
        </a>
        <?php
		if ($thisformjog["uj"]<=$auser["jogid"]){
		?>
       <a href="<?php echo $homeurl.$separator.$getparams[0]."/".$getparams[1]."_edit/".$menuadat["id"] ?>" class="actions-icons">
               <img src="<?php echo $homeurl;?>styl/admin/img/edit-icon.png" alt="edit" class="icons">
        </a>
		<?php
		}
        ?>
        (<?= $menustatusarray[$menuadat["status"]];?>)
               
        <?php
		if (count($menuadat["alatta"])>0){
			menuprint($menuadat["alatta"]);
		}
        ?>
        </div>
	<?php
	}

}


$thisformjog["ir"]='3';
$thisformjog["szerkeszt"]='3';
$thisformjog["uj"]='3';


?>
<div class="clear" ></div>
<section class="pagefull">
<style>
    .menulist div {
        margin-left:10px;
        border-left: 2px dotted black;
        position: relative;
        display: block;
        padding: 5px 10px 5px 0px;
        margin-right: -10px;
    }
    .menulist div div{
        border-left: 2px dotted #00b3ee;
        border-bottom: 1px dotted #00b3ee;
    }
    .menulist div div div{
        border-left: 2px dotted #ff5500;
        border-bottom: 1px dotted #ff5500;
     }
    .menulist div div div div{
        border-left: 2px dotted #00ff00;
        border-bottom: 1px dotted #00ff00;
    }
    .menulist div div div div div{
        border-left: 2px dotted #FF7E00;
        border-bottom: 1px dotted #FF7E00;
    }
    .menulist div a{
        color:#000000;
        font-size: 16px;
        margin: 5px 10px;
    }
    .menulist div div a{
    }
    .menulist div div div a{
    }
    .menulist div div div div a{
    }
    .menulist div div div div div a{
    }

    .menulist div a:hover{
        color:#FF7E00;
        background: #fffacd;
    }

    .statusclass_3{
        background-color: red;
    }
    .statusclass_2{
        background-color: rgba(179,123,44,0.6);
    }

</style>
<div class="container">
    <section class="col-sm-12">

<h1><?php echo $lan["sitemap"];?></h1><br />
<a href="<?php echo $homeurl.$getparams[0]."/".$getparams[1]."_edit"; ?>" class="btn btn-success">
    <?php echo $lan["uj"].' '.$lan["menu"];?>
</a>
<div class="menulist">
<?php
menuprint($menuadatok);
//arraylist($menuadatok)
?>
</div>
        </section>
</div>
