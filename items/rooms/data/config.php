<?php
$room_loc = 'uploads/rooms';
$tblmodulom = 'rooms';
$tbl[$tblmodulom] = $adatbazis["db1_db"] . "." . $prefix . "rooms";
$file_structuct = array();
$file_structuct["modules"] = "rooms";


/*admin menü*/

$file_structuct["name"] = "Szobák alatti szöveg";
$file_structuct["file"] = "sitesettingroomsundertext";
$adminmenu2[] = $file_structuct;
$file_structuctb["modules"] = "cat";
$file_structuctb["name"] = "Szobához ikonok";
$file_structuctb["file"] = "lista";
$file_structuctb["id"] = "szobahoztartozo";
$adminmenu2[] = $file_structuctb;

$file_structuct["name"] = "Szobalista";
$file_structuct["file"] = "lista";
$file_structuct["alatta"] = $adminmenu2;
$adminmenu[] = $file_structuct;

$file_structuct["name"] = "Szobalista";
$file_structuct["file"] = "list";
$modules[] = $file_structuct;
$file_structuct["name"] = "Egy szoba";
$file_structuct["file"] = "room";
$modules[] = $file_structuct;

include('rooms.class.php');

foreach ($avaibleLang as $alan){
    $RoomsClass->create_table_text($alan);
}
//mindenszobáhoztartozik
$szobahoztartozik[]='WIFI';
$szobahoztartozik[]='LCD-TV';
$szobahoztartozik[]='HAJSZARITO';
$szobahoztartozik[]='FRANCIAAGY';
$szobahoztartozik[]='SZEF';
$szobahoztartozik[]='MINIBAR';
$szobahoztartozik[]='MAGNES-AJTOZAR';



$icons_colors[]='fekete';
$icons_colors[]='feher';
$icons_colors[]='greyishbeige';

//ikonok
//Hotel ikonok css
function hotelcss_data($iconmpackname,$icons_width = '60')
{
    global $Upload_Class, $homeurl,$icons_colors;
//$iconmpackname='CSOMAGAJANLAT';
    $datas = array();
    $iconsfolder_true = 'uploads/icons/HD_icons_' . $iconmpackname . '/';
   // $iconsfolder_rel = '/icons/HD_icons_CSOMAGAJANLAT/';
//$icons_color='fekete','greyishbeige','feher';
    $iconpack = $iconmpackname;
    $mylist = $Upload_Class->folderlist($iconsfolder_true);

    foreach($icons_colors as $icon_color)
    if ($mylist) foreach ($mylist as $icon) {
        $data = array();
        $iconname = str_replace('.png', '', $icon["name"]);

        if ($icon_color!='' && strpos($iconname, ('_' . $icon_color))) {

            //$iconclassname = str_replace(array('HD_icon_', '_' . $icons_color), '', $iconname);
            $iconclassname = str_replace(array('HD_icon_'), '', $iconname);
            $data["name"] = str_replace(array('_' . $icon_color), '', $iconclassname);
            $data["name"] = str_replace(array('+'), '-', $data["name"]);

            $data["class"] = $iconclassname = str_replace(array('+', ' '), array('-', '_'), $iconclassname);
            $data["imgurl"] = $iconurl = $homeurl . '' . str_replace('&x=600', '&y=' . $icons_width, $icon["url"]);
            //echo $iconname." | ".$iconclassname." | ".$iconurl."<br>";

            $datas[$icon_color][] = $data;
        }

    }


    return $datas;
}

function hotelicon_print($class, $classize = 30,$color='fekete',$text='')
{
    if ($text==''){
        $text=lan($class);
    }
    return '<span class="icon' . $classize . '  ' . $class . ' '.$color.'" title="' . $text . '"></span>';
}

function hotelcss_print($myicons,$color='fekete')
{
    $back = '';
        foreach ($myicons as $mylistb) {
        foreach ($mylistb[$color] as $mlb) {
            $back .= '.' . $mlb["name"].'.' . $color. "{background:url('" . $mlb["imgurl"] . "');}";
        }
    }
    return $back;
}


function szobatags_json_from($data)
{
    $data["services"]=array();
    $data["wellnes"]=array();
    $data["foglalasinfok"]=array();
    /*  if(isset($data['connectedservices']) && $data['connectedservices']!=''){

     *  $serarray=explode(',',$data['connectedservices']);
         foreach ($serarray as $selem) {
             $data['services'][$selem]=1;
         }
    }*/
    return  json_decode($data['connectedservices'],true);
}
function szobatags_json_to($data){
    $data["connectedservices"]='';
    if ($data["services"])$back["services"]=$data["services"];
    if ($data["wellnes"])$back["wellnes"]=$data["wellnes"];
    if ($data["foglalasinfok"])$back["foglalasinfok"]=$data["foglalasinfok"];


   /*     foreach (
        $data["services"] as $sname=>$service){
        if ($data["connectedservices"]){$data["connectedservices"].=",";}
        $data["connectedservices"].=$sname;
    }*/

    return json_encode($back);
}

function szobatags_csv_from($data)
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
function szobatags_csv_to($data){
    $data["connectedservices"]='';
    if ($data["services"])foreach (
        $data["services"] as $sname=>$service){
        if ($data["connectedservices"]){$data["connectedservices"].=",";}
        $data["connectedservices"].=$sname;
    }
    return $data["connectedservices"];
}

$myicons['CSOMAGAJANLAT'] = hotelcss_data('CSOMAGAJANLAT');
$myicons['FOGLALAS-INFOK'] = hotelcss_data('FOGLALAS+INFOK');
$myicons['NYELV'] = hotelcss_data('NYELV');
$myicons['SZOBA'] = hotelcss_data('SZOBA');
$myicons['WELLNESS-KOZOSSEGI'] = hotelcss_data('WELLNESS+KOZOSSEGI');
$myicons['RENDEZVENY'] = hotelcss_data('RENDEZVENY');

//Ezeket lehet hozzáadni ami nem tartozik
foreach ($myicons['SZOBA']["fekete"] as $hat){
    $mehet=1;
    foreach ($szobahoztartozik as $zik){
        if ($zik == $hat["name"])$mehet=0;
    }
    if ($mehet==1);$szobahoztartozhat[]=$hat["name"];
}

//Ezeket lehet hozzáadni
foreach ($myicons['FOGLALAS-INFOK']["fekete"] as $hat){
    $szobahoztartozhatf[]=$hat["name"];
}

//Ezeket lehet hozzáadni
foreach ($myicons['WELLNESS-KOZOSSEGI']["fekete"] as $hat){
    $szobahoztartozhatw[]=$hat["name"];
}



$extrascript[] = '
<style>
.icon20
{
	display:inline-block;
	width:20px;
	height:20px;
    background-size: contain!important;
	background-repeat: no-repeat!important;
}' .hotelcss_print($myicons,'feher').hotelcss_print($myicons,'greyishbeige').hotelcss_print($myicons,'fekete') . '
.icon20.MOSDOK,
.icon20.OLTOZO-FERFI,
.icon20.OLTOZO-NOI,
.icon20.ZUHANYZO-FERFI,
.icon20.ZUHANYZO-NOI
{
	width:58px;
}
.icon30
{
	display:inline-block;
	width:30px;
	height:30px;
    background-size: contain!important;
	background-repeat: no-repeat!important;
}
.icon30.MOSDOK,
.icon30.OLTOZO-FERFI,
.icon30.OLTOZO-NOI,
.icon30.ZUHANYZO-FERFI,
.icon30.ZUHANYZO-NOI
{
	width:75px;
}

.icon50
{
	display:inline-block;
	width:50px;
	height:50px;
    background-size: contain!important;
	background-repeat: no-repeat!important;
}
.icon50.MOSDOK,
.icon50.OLTOZO-FERFI,
.icon50.OLTOZO-NOI,
.icon50.ZUHANYZO-FERFI,
.icon50.ZUHANYZO-NOI
{
	width:145px;
}

.icon10
{
	display:inline-block;
	width:10px;
	height:10px;
    background-size: cover!important;
	background-repeat: no-repeat!important;
}
.icon10.MOSDOK,
.icon10.OLTOZO-FERFI,
.icon10.OLTOZO-NOI,
.icon10.ZUHANYZO-FERFI,
.icon10.ZUHANYZO-NOI
{
	width:28px;
}
</style>
<script type = "text/javascript" language = "javascript">
//ikonok cserélgetése
    $(document).ready(function() {
        $("a.fekete").mouseover(
            function () {
                $(this).addClass("greyishbeige");
                $(this).removeClass("fekete");
            }
        );
        $("a.fekete").mouseleave(
            function () {
                $(this).addClass("fekete");
                $(this).removeClass("greyishbeige");
            }
        );

        $("a.feher").mouseover(
            function () {
                $(this).addClass("greyishbeige");
                $(this).removeClass("feher");
            }
        );
        $("a.feher").mouseleave(
            function () {
                $(this).addClass("feher");
                $(this).removeClass("greyishbeige");
            }
        );

        $("a.greyishbeige").mouseover(
            function () {
                $(this).addClass("fekete");
                $(this).removeClass("greyishbeige");
            }
        );
        $("a.greyishbeige").mouseleave(
            function () {
                $(this).addClass("greyishbeige");
                $(this).removeClass("fekete");
            }
        );
    });
</script>
	';


?>