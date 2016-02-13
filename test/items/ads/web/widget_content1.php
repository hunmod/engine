<ads>
<?php
$adsfilter["adid"]= $class_ads->get_sizes_id(1024,320,320,0);
//arraylist($_SESSION);
		$adsfilter["lang"]=$_SESSION["country_code"];
                $adsfilter["status"]='1';
				//$adsfilter["adid"]='2';
		$ADS_list=$class_ads->get($adsfilter);
		if (!($ADS_list)){
			unset($adsfilter["lang"]);
			$ADS_list=$class_ads->get($adsfilter);
		}
		if (!($ADS_list)){
			unset($adsfilter["pos"]);
			$ADS_list=$class_ads->get($adsfilter);
		}
		
		$thads=$ADS_list[rand(0,count($ADS_list)-1)];
		$class_ads->print_ads($thads);		
		if ($thads['id']>0){
			$adsfilter["nid"].=$Sys_Class->comasupport($filters["nid"]);	
			$adsfilter["nid"].=$thads['id'];
		}
?>
</ads>