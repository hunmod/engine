<?php
$ADS_list=(random_ads_by_group('4,5,6,7,8,9',2));
if (count($ADS_list)>=1){
	foreach ($ADS_list as $elem){
		print_ads($elem);		
	}
}
?>