<?php
//
class formobjects{
	
	
	
	
public function save_form($datas,$mezokarray) 
{
	global $adatbazis;
	
	//tábla adatai
	//$SD=$mezokarray;
	//$this->service_table_fields();	
	
//Alapértemlezett érték definiálás, jobb lenne a tábla strukturából megoldani ezeket
//	if (!isset($datas['active']))$datas['active']='1';
//arraylist($datas);
	if ($datas["id"]<1)
	{
		//insert		
		foreach ($mezokarray["mezok"] as $mezoe)
		{
			$mezok.=comasupport($mezok);	
			$mezok.=$mezoe;	
			$datasb.=comasupport($datasb);	
			$datasb.="'".$datas[$mezoe]."'";
		}
		$query="INSERT INTO  ".$mezokarray["table"]." (".$mezok.")VALUES (".$datasb.")";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "INSERT");
		//echo $query.'<br>';
		//echo $error;		
		$res=mysql_insert_id();
	}
	else
	{
		$res=$datas["id"];
		//update		
		foreach ($mezokarray["mezok"] as $mezoe)
		{
			if (isset($datas[$mezoe])){
			$datasb.=comasupport($datasb);	
			$datasb.="".$mezoe." =  '".$datas[$mezoe]."'";
			}
		}
		$query="UPDATE  ".$SD["table"]." SET  ".$datasb."   WHERE  `id` =".$datas["id"]." LIMIT 1 ;";
		$result =db_Query($query, $error, $adatbazis["db1_user"], $adatbazis["db1_pass"],$adatbazis["db1_srv"],$adatbazis["db1_db"], "UPDATE");
		//echo $query;
		//echo $error;

	}
return($res);//csak id-t ad vissza
}
	
	
public function create_form($mezokarray,$data=array()){
foreach($mezokarray['mezok'] as $felement){

	if ($felement['display']==0){
		$this->hiddenbox($felement['id'],$data[$felement['id']]);	
	} else
	if ($felement['type']=='int'){
		$this->textbox($felement['id'],$data[$felement['id']],$felement['name']);
	}else
	if ($felement['type']=='varchar'){
		$this->textbox($felement['id'],$data[$felement['id']],$felement['name']);
	}else	
	if ($felement['type']=='text'){
		$this->textaera($felement['id'],$data[$felement['id']],$felement['name']);
	}else		
	if ($felement['type']=='array'){
		if ($felement['values_type']=='0'){
			$this->selectboxeasy($felement['id'],$felement['values'],$data[$felement['id']],$felement['name']);
		}
	}
	unset($felement);
} 	
	
	
}	
	
	
	
	
public function hiddenbox($name,$value){
echo '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'" />';
}	
	
public function textbox($name,$value,$caption="",$class="control-label",$requied=0)
{
	if ($requied==1){$reqval=' required="required"';}
     echo'<label class="'.$class.'" for="inputDefault">'.$caption.'</label>'.
     '<input type="text" class="form-control" name="'.$name.'" id="'.$name.'" placeholder="'.$caption.'" value="'.$value.'"'.$reqval.'>';
}

public function textaera($name,$value,$caption="",$class="form-control",$requied=0){
	if ($requied==1){$reqval=' required="required"';}
echo '<label for="inputHelptext">'.$caption.'</label>'.
'<textarea class="'.$class.'" name="'.$name.'" id="'.$name.'" rows="5" placeholder="'.$caption.'" '.$reqval.'>'.$value.'</textarea>';

}

public function checkbox($name,$value,$caption="",$class="checkbox-inline"){
	if ($value>0)$status=' checked';
	
	echo '<label class="'.$class.'" title="'.$caption.'"><input type="checkbox" name="'.$name.'" value="1" '.$status.'>'.$caption.'</label>';

}

public function kcebox($name,$value,$caption="",$param=""){
global $editorcolor,$homeurl,$Text_Class;
echo '<label for="inputHelptext">'.$caption.'</label>'.'<textarea cols="80" id="'.$name.'" name="'.$name.'">
        '.$Text_Class->htmlfromchars($value).'
        </textarea>
			<script type="text/javascript">
			'."CKEDITOR.replace('".$name."', {

toolbar : [ ";

if ($param==""){
	echo "
	['Source','-','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SelectAll','RemoveFormat'],
	['Undo','Redo','-','Find','Replace'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Maximize','ShowBlocks'],
	'/',
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Format','Font','FontSize'],['TextColor','BGColor'],  
	['Link','Unlink','Anchor'],['NumberedList','BulletedList']
";
}
if ($param=="minimal"){
echo "
	['Source'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SelectAll','RemoveFormat'],
	['Bold','Italic','Underline','Format','Font','FontSize'],['TextColor','BGColor'],  

";
}
echo "],language: 'hu',uiColor: '". $editorcolor."',filebrowserImageBrowseUrl : '".$homeurl."/scripts/ckfinder/ckfinder.html'
				});
			</script>

";
}


public function numbox($name,$value,$caption="",$class="control-label",$requied=0,$min=NULL,$max=NULL)
{
	if ($requied==1){$reqval=' required="required"';}

echo '<label for="inputHelptext">'.$caption.'</label>'.'<input type="number" name="'.$name.'" id="'.$name.'" value="'.$value.'" onKeyUp="numericFilter('."'".$name."'".');"  placeholder="'.$caption.'"'.$reqval.' class="'.$class.'" />';
//echo '<input type="text" name="'.$name.'" id="'.$name.'" value="'.$value.'" onchange="$("#'.$name.'").ForceNumericOnly();" />';


}
public function passbox($name,$value,$caption=""){
echo '<input type="password" name="'.$name.'" id="'.$name.'" value="'.$value.'" placeholder="'.$caption.'" />';
}

public function selectboxeasy($name,$values,$default,$caption="",$class="form-control"){
global $selected;
echo '<label for="inputHelptext">'.$caption.'</label>'.'<select class="'.$class.'" name="'.$name.'" id="'.$name.'">';
		 foreach ($values as $id=>$liste1)
		 {
		  if ($id==$default )
		  {$sel= $selected;}
		  else {$sel= "";}

		  echo '<option value="'.$id.'" '.$sel.'>'.$liste1.'</option>';
		 }
echo'</select>';	
}

public function selectboxeasy2($name,$values,$default,$caption="",$class="form-control"){
global $selected;
echo '<select class="'.$class.'" name="'.$name.'" id="'.$name.'">';
		  echo '<option value="all" '.$sel.'>'.$caption.'</option>';
		 foreach ($values as $id=>$liste1)
		 {
		  if ($id==$default )
		  {$sel= $selected;}
		  else {$sel= "";}
		  echo '<option value="'.$id.'" '.$sel.'>'.$liste1.'</option>';
		 }
echo'</select>';	
}	
public function selectbox($name,$values,$typ=array('value'=>'id','name'=>'text'),$default,$caption=""){
global $selected;
	echo '<label for="inputHelptext">'.$caption.'</label>'
	.'<select name="'.$name.'" id="'.$name.'" class="form-control">';
		 foreach ($values as $liste1)
		 {
		  $value=$typ["value"];
		  $name=$typ["name"];
		  if ($liste1[$value]==$default )
		  {$sel= $selected;}
		  else {$sel= "";}

		  echo '<option value="'.$liste1[$value].'" '.$sel.'>'.$liste1[$name].'</option>';
		 }
	echo '</select>';	 
}	

public function selectbox2($name,$values,$typ=array('value'=>'id','name'=>'text'),$default,$caption=""){
global $selected;
	echo '<select name="'.$name.'" id="'.$name.'" class="form-control">';
		  echo '<option value="all" '.$sel.'>'.$caption.'</option>';
	
		 foreach ($values as $liste1)
		 {
		  $value=$typ["value"];
		  $name=$typ["name"];
		  if ($liste1[$value]==$default )
		  {$sel= $selected;}
		  else {$sel= "";}

		  echo '<option value="'.$liste1[$value].'" '.$sel.'>'.$liste1[$name].'</option>';
		 }
	echo '</select>';	 
}


public function selectbox_roll($name,$values,$typ,$default,$caption=''){
global $selected;
	echo '<select name="'.$name.'" id="'.$name.'" style="display:none;">';
		 foreach ($values as $liste1)
		 {
		  $value=$typ["value"];
		  $namex=$typ["name"];
		  if ($liste1[$value]==$default )
		  {$sel= $selected;}
		  else {$sel= "";}

		  echo '<option value="'.$liste1[$value].'" '.$sel.'>'.$liste1[$namex].'</option>';
		 }
	echo '</select>';
	echo '
    <div class="pager">'
	.'<div class="select_pager_label">'.$caption.'</div>'
	.'<div class="select_pager">
        <span onclick="listbox_pager(\''.$name.'\',\''.$name.'_ltx\',\'-\');" class="left_arrow bgcolor3 border2"> < </span>
        <div id="'.$name.'_ltx" class="textb1 bgcolor3">&nbsp;</div>
        <span onclick="listbox_pager(\''.$name.'\',\''.$name.'_ltx\',\'+\');" class="right_arrow bgcolor3 border8"> > </span>
    </div>
</div>

<script>
listbox_pager(\''.$name.'\',\''.$name.'_ltx\',\'\');
</script>
';	
		 
}

public function datetimebox($name,$value,$format='yy-mm-dd',$caption=''){
$ertek= explode( ' ', $value );

//if ($_GET["ip"]){echo $_GET["ip"];} //else {echo dateprintshort($date);}
       $ret='<input type="text" name="'.$name.'" id="'.$name.'"  value="'.$ertek[0].'" />';
       $ret.='<input type="text" name="'.$name.'_time" id="'.$name.'_time"  value="'.$ertek[1].'" style="width:4em;" />';
	  $ret.=' <script>
  $(function() {
    $( "#'.$name.'" ).datepicker();
	$("#'.$name.'").datepicker( "option", "dateFormat", "'.$format.'" );
    $( "#'.$name.'" ).datepicker( "option", "showAnim", "slideDown");
	$( "#'.$name.'" ).datepicker( "option", "firstDay", 1 );
	$( "#'.$name.'" ).datepicker( "option", "autoSize", true );	
	//$( "#'.$name.'" ).datepicker( "option", "showButtonPanel", true );
	$( "#'.$name.'" ).datepicker( "option", "changeYear", true );
	$( "#'.$name.'" ).datepicker( "option", "changeMonth", true );
	$( "#'.$name.'" ).datepicker( "option", "monthNames", [ "Január", "Február", "Március", "Április", "Május", "Junius", "Julius", "Agusztus", "Szeptember", "Október", "November", "December" ] );
	$( "#'.$name.'" ).datepicker( "option", "monthNamesMin", [ "Jan", "Feb", "Márc", "Ápr", "Máj", "Jun", "Jul", "Aguszt", "Szept", "Okt", "Nov", "Dec" ] );	
	$( "#'.$name.'" ).datepicker( "option", "dayNames", [ "Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat" ] );
	$( "#'.$name.'" ).datepicker( "option", "dayNamesMin", [ "Vas", "Hé", "Ke", "Sze", "Csü", "Pé", "Szo" ] );
	$( "#'.$name.'" ).datepicker( "setDate", "'.$ertek[0].'" );
  });
	$("#'.$name.'_time").timepicker({
    showPeriodLabels: false,
	showOn: "focus",
	hourText: "Óra",
    minuteText: "Perc"
});
  </script>';

	  echo $ret;
}



////////////////////


public function array_convert($array,$type){
$ret=array();
	if (count($array))foreach ($array as $name=>$val){
		$ret[$val[$type['value']]]=$val[$type['name']];
	}

return $ret;
}

public function array_convert_rev($array,$type){
$ret=array();
	if (count($array))
	foreach ($array as $name=>$val){
		$ret1[$type['name']]=$name;
		$ret1[$type['value']]=$val;		
		$ret[]=$ret1;
	}

return $ret;
}	
	
}



?>