<?php
function isissetvarval($val){
    if ($val){
        return $val;
    }
    else return '0';

}
$extrascript[]="<script>var gyerekkedevezmenyek=JSON.parse('".json_encode($gyerekkedvezmenyek)."');</script>";
?>

