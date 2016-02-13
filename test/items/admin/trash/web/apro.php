<?php
if ($getparams[2]!=''){
	if(file_exists("./items/admin/web/apro/".$getparams[2].".php")){
		include_once("./items/admin/web/apro/".$getparams[2].".php");
	}
	else{
		$hiba[]="Nincs ilyen elem!";
		}	
	}

?>