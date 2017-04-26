<?php
ini_set('max_execution_time', 300);

function bflistxlstoarray($inputFileName)
{
//  Read your Excel workbook
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

//  Get worksheet dimensions
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
    for ($row = 1; $row <= $highestRow; $row++){
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL,
            TRUE,
            FALSE);
        $rowDatas[]=$rowData[0];

        //  Insert row data array into your database of choice here
    }
return $rowDatas;
}

$googlemapreq=new gmap();


$inputFileName = 'uploads/bf/NEKED_ADATBAZISOK.xlsx';
$bfdatas = bflistxlstoarray($inputFileName);

foreach ($bfdatas as $bdata){

    $rdata['nev']=$bdata[4];
    $rdata['tipus_eredeti']=$bdata[0];
    $tipusoktxt=str_replace(" & ", "/", $rdata['tipus_eredeti']);
    $tipusoktxt=str_replace("-", "", $tipusoktxt);
    $tipusoktxt=str_replace("-", "", $tipusoktxt);
    $tipusokarray=explode('/',$tipusoktxt);
    $rdata['cat']='';
    foreach($tipusokarray as $mtip){

    if ($mtip){
        $rdata['cat'].=$ctdatas["id"]= $tipusoktxt=str_replace("-", "",strtolower( $TextClass->to_link($mtip)));
        $rdata['cat'].=',';
        $ctdatas["status"]=2;
        $ctdatas["sorrend"]=5;
        $ctdatas["kat"]='bfcat';
        $ctdatas["nev"]=$mtip;
        $category_class->savetext('hu',$ctdatas);
        $category_class->save($ctdatas);
    }
    }
  //  var_dump($tipusokarray);
   // echo "<br>";
    //$rdata['tipus_W']=




    $rdata['varos_nev']=$bdata[2];


    if ($rdata['varos_nev']) {
        $cfilters['city_name_like'] = $rdata['varos_nev'];
        $citysarray = $location_class->get_city($cfilters, ' LIMIT 0,5');

        $rdata['varos_nev_db'] = $citysarray["datas"][0]['city_name'];

        $rdata['varos'] = $citysarray["datas"][0]['city_id'];
        if ($bdata[1]) {
            $zip = $bdata[1];
        } else {
            $zip = $citysarray["datas"][0]['zip'];
        }
    }
    $rdata['zip']=$zip;
    $rdata['street']=$TextClass->htmltochars($bdata[3]);
    $rdata['megjegyzes']=$TextClass->htmltochars($bdata[12]);
/*
    if ($bdata[14])$rdata['wifi']=$bdata[14];
    if ($bdata[16])$rdata['pos']=$bdata[16];
    if ($bdata[26])$rdata['szepkartya']=$bdata[26];
    if ($bdata[26])$rdata['erzsebetkartya']=$bdata[26];
    if ($bdata[15])$rdata['bringa']=$bdata[15];
    if ($bdata[19])$rdata['allat']=$bdata[19];
    if ($bdata[18])$rdata['dohanyzo']=$bdata[18];
    if ($bdata[25])$rdata['balatonltav']=$bdata[25];
    if ($bdata[22])$rdata['medence']=$bdata[22];
    if ($bdata[27])$rdata['telen']=$bdata[27];
    if ($bdata[24])$rdata['specdieta']=$bdata[24];
    if ($bdata[17])$rdata['sport']=$bdata[17];
    if ($bdata[20])$rdata['roki']=$bdata[20];
    if ($bdata[21])$rdata['konyha']=$bdata[21];
    if ($bdata[23])$rdata['gyerek']=$bdata[23];
*/
    if ($bdata[14]=='x')$rdata['wifi']=1;
    if ($bdata[16]=='x')$rdata['pos']=1;
    if ($bdata[26]=='x')$rdata['szepkartya']=1;
    if ($bdata[26]=='x')$rdata['erzsebetkartya']=1;
    if ($bdata[15]=='x')$rdata['bringa']=1;
    if ($bdata[19]=='x')$rdata['allat']=1;
    if ($bdata[18]=='x')$rdata['dohanyzo']=1;
    if ($bdata[25]=='x')$rdata['balatonltav']=1;
    if ($bdata[22]=='x')$rdata['medence']=1;
    if ($bdata[27]=='x')$rdata['telen']=1;
    if ($bdata[24]=='x')$rdata['specdieta']=1;
    if ($bdata[17]=='x')$rdata['sport']=1;
    if ($bdata[20]=='x')$rdata['roki']=1;
    if ($bdata[21]=='x')$rdata['konyha']=1;
    if ($bdata[23]=='x')$rdata['gyerek']=1;
    if ($bdata[28]=='x')$rdata['support']=1;

    $rdata['facebook']=$bdata[10];
    $rdata['web']=$bdata[8];
    $rdata['email']=$bdata[7];
    $rdata['telefon']=$bdata[5];
    $rdata['telefon2']=$bdata[6];
    $rdata['status']=2;
    $rdata['sorrend']=2;


    if($rdata['facebook']!=''){
        $rdata['facebook']= str_replace(array("www.","facebook.com/","https://","hu-hu."), "", $rdata['facebook']);
    }

    if($rdata['telefon']!='')$rdata['telefon']=$TextClass->telnumber_hu($rdata['telefon']);
    if($rdata['telefon2']!='')$rdata['telefon2']=$TextClass->telnumber_hu($rdata['telefon2']);


    $rdatas[]=$rdata;
    $bfclass->save($rdata);
}
/*
for ($i = 3; $i <= 5; $i++)
{

    $rdatas[$i]['g_s']=$rdatas[$i]['zip'].','.$rdatas[$i]['varos_nev'];

    $cfilters['id'] = $rdata['varos'];
    $citysarray = $location_class->get_city($cfilters, ' LIMIT 0,5');

    arraylist($citysarray['datas'][0]['lati']);

    //$rdatas[$i]['g_b']=$googlemapreq->get_google_geocoding($rdatas[$i]['g_s'],$rdatas[$i]['nev']);
    $googleback=$rdatas[$i]['g_b']=$googlemapreq->get_google_place($citysarray['datas'][0]['lati'].','.$citysarray['datas'][0]['longi'],$rdatas[$i]['nev']);
   // echo($googleback[0]['name']);
   // echo($googleback[0]['vicinity']);
    $rdatas[$i]['lati']=$googleback[0]["geometry"]["location"]["lat"];
    $rdatas[$i]['longi']=$googleback[0]["geometry"]["location"]["lng"];
    $rdatas[$i]['cim']=$googleback[0]['vicinity'];

    //arraylist($rdatas[$i]);
    arraylist($googleback);

}
*/
//arraylist($rdatas);

?>