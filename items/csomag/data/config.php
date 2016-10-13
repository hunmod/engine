<?php
$csomag_loc = 'uploads/csomag';
$tblmodulom = 'csomag';
$tbl[$tblmodulom] = $adatbazis["db1_db"] . "." . $prefix . "csomag";
$file_structuct = array();
$file_structuct["modules"] = "csomag";


/*admin menü*/

/*$file_structuct["name"] = "Szobák alatti szöveg";
$file_structuct["file"] = "sitesettingroomsundertext";
$adminmenu2[] = $file_structuct;*/
$file_structuctb["modules"] = "cat";
$file_structuctb["name"] = "Csomag kategóriák";
$file_structuctb["file"] = "lista";
$file_structuctb["id"] = "csomagkategoria";
$adminmenu2[] = $file_structuctb;

$file_structuct["name"] = "Csomagok";
$file_structuct["file"] = "lista";
$file_structuct["alatta"] = $adminmenu2;
$adminmenu[] = $file_structuct;

$file_structuct["name"] = "Csomagok";
$file_structuct["file"] = "list";
$modules[] = $file_structuct;
$file_structuct["name"] = "Egy csomag";
$file_structuct["file"] = "csomag";
$modules[] = $file_structuct;

include('csomag.class.php');

foreach ($avaibleLang as $alan){
    $CsomagClass->create_table_text($alan);
}

function csomagtags_json_from($data)
{
    $data["services"]=array();
    $data["wellnes"]=array();
    $data["foglalasinfok"]=array();
    return  json_decode($data['connectedservices'],true);
}

function csomagtags_json_to($data){
    $data["connectedservices"]='';
    if ($data["services"])$back["services"]=$data["services"];
   // if ($data["wellnes"])$back["wellnes"]=$data["wellnes"];
    //if ($data["foglalasinfok"])$back["foglalasinfok"]=$data["foglalasinfok"];
    return json_encode($back);
}

function csomagtags_csv_from($data)
{
    $data["services"]=array();
    if(isset($data['connectedservices']) && $data['connectedservices']!=''){
        $serarray=explode(',',$data['connectedservices']);
        foreach ($serarray as $selem) {
            $data['services'][$selem]=1;
        }
    }
    return $data["services"];
}
function csomagtags_csv_to($data){
    $data["connectedservices"]='';
    if ($data["services"])foreach (
        $data["services"] as $sname=>$service){
        if ($data["connectedservices"]){$data["connectedservices"].=",";}
        $data["connectedservices"].=$sname;
    }
    return $data["connectedservices"];
}
?>