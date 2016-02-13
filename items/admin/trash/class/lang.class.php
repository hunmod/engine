<?php
ini_set('include_path', ini_get('include_path').';./class/');

/** PHPExcel */
include './class/PHPExcel.php';
/** PHPExcel_Writer_Excel2007 */
include './class/PHPExcel/Writer/Excel2007.php';
// Create new PHPExcel object
include './class/PHPExcel/Reader/Excel2007.php';
include './class/PHPExcel/Reader/Excel5.php';
include './class/PHPExcel/IOFactory.php';



PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

$inputFileName = 'lang.xls';
function xlstoarray($inputFileName)
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

return $langarray=array_convert($rowDatas);

}

function array_convert($array,$type=array("value"=>"0","name"=>"1"))
{
$ret=array();
	if (count($array))foreach ($array as $name=>$val){
		$ret[$val[$type['value']]]=$val[$type['name']];
	}

return $ret;
}


$langarray=xlstoarray($inputFileName);


arraylist($langarray);

?>