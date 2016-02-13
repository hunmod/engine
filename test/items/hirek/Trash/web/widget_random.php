<?php
//arraylist($nemkell);
if (count($nemkell))foreach ($nemkell as $nk){
	$filtersw['notid'].=$Sys_Class->comasupport($filtersw['notid']);
	$filtersw['notid'].=$nk;
}

	$menualatta22=$MenuClass->get_menus_down(15,array());
	//arraylist($menualatta);
	//arraylist($menufelette);
	$wherein.=$Sys_Class->comasupport($wherein);
	$wherein.=15;

if (count($menualatta22))
{
	foreach($menualatta22 as $mea)
{
	$wherein.=$Sys_Class->comasupport($wherein);
	$wherein.=$mea["id"];
}
}
$filtersw['mid']=$wherein;
$filtersw['mid']=$wherein;
if (!$adminv)$filtersw['ido']=$date;	

$qhirw=$hir_class->get($filtersw,' RAND()','all') ;
$hirekelemekw=($qhirw['datas']);

?>
<div class="box matchHeight piros boxMenu" >
                            <h2>More Editions</h2>
                            <ul>
 <?php $countw=1; foreach($hirekelemekw as $randh){$countw++;
 if ($countw>6)break;
 $randh["url"]=$kezdooldal.$separator.$getparams[0]."/hir/".($randh["id"]);
$randh["url"]=$kezdooldal.$separator."magazine/".$Text_Class->to_link($randh["menu_name"])."/".$Text_Class->to_link($randh["cim"])."/".($randh["id"]);

 ?>                           
                                <li><a href="<?php echo $randh["url"]; ?>"><?php echo $randh['cim']; ?></a></li>
<?php } ?>                                
                                
                            </ul>
</div><br />
                        <div class="clear"></div>
                        <div class="clear"></div>