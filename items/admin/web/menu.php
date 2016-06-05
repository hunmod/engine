<div class="clear" ></div>
<section class="pagefull">
<style>
div div{
margin-left:10px;	
}
</style>
<div class="container">
    <section class="col-sm-12">

<h1><?php echo $lan["sitemap"];?></h1><br />
       <a href="<?php echo $kezdooldal.$separator.$getparams[0]."/".$getparams[1]."_edit"; ?>">
        <?php echo $lan["uj"].' '.$lan["menu"];?>
        </a>
<?php
//$menuadatok=menuadat2($menustart);
//$menustart=0;
$menuadatok=$MenuClass->get_menus_down($menuadmin,array("status"=>"all"),$order='sorrend,nev ASC') ;

//arraylist($menuadatok);
//0/1

function menuprint($menuadatok)
{
	global $homeurl,$separator,$thisformjog,$auser,$buttons,$getparams,$lan;
	if (count($menuadatok))
	foreach ($menuadatok as $menuadat)
	{
		if ($menuadat["item"]==""){$menuadat["item"]=$menuadat["id"];}
	?>
        <div style="text-align:left;">
        <a href="<?php echo $homeurl.$separator.$menuadat["modul"]."/".$menuadat["file"]."/".$menuadat["item"] ?>">
        <?php echo $menuadat["nev"];?>
        </a>
 
         <?php
		if ($thisformjog["uj"]<=$auser["jogid"]){
		?>
       <a href="<?php echo $homeurl.$separator.$getparams[0]."/".$getparams[1]."_edit/".$menuadat["id"] ?>">
        <?php echo $buttons["edit"];?>
        </a>
		<?php
		}
        ?>
        <?php echo $menuadat["status"];?>
               
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


menuprint($menuadatok);
//arraylist($menuadatok)
?>
        </section>
</div>
