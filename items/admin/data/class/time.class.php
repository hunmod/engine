<?php
//
class time{



public function get_time_difference( $start, $end )
{
    $uts['start']      =    strtotime( $start );
    $uts['end']        =    strtotime( $end );
    if( $uts['start']!==-1 && $uts['end']!==-1 )
    {
        if( $uts['end'] >= $uts['start'] )
        {
            $diff    =    $uts['end'] - $uts['start'];
            if( $years=intval((floor($diff/(86400*360)))) )
                $diff = $diff % (86400*360);              
			if( $months=intval((floor($diff/(86400*30)))) )
                $diff = $diff % (86400*30);            
			if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('years'=>$years,'months'=>$months,'days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
        }
        else
        {
            trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
        }
    }
    else
    {
        trigger_error( "Invalid date/time data detected", E_USER_WARNING );
    }
    return( false );
}



public function dayname($date)
{
echo date("l", strtotime($date));
}



public function dates_from_week($week, $year)
{
    $time = strtotime("1 January $year", time());
    $day = date('w', $time);
    $time += ((7*$week)+1-$day)*24*3600;
    $return[0] = date('Y-n-j', $time);
    $time += 24*3600;
    $return[] = date('Y-n-j', $time);
    $time += 24*3600;
    $return[] = date('Y-n-j', $time);
    $time += 24*3600;
    $return[] = date('Y-n-j', $time);
    $time += 24*3600;
    $return[] = date('Y-n-j', $time);
    $time += 24*3600;
    $return[] = date('Y-n-j', $time);
    $time += 24*3600;
    $return[] = date('Y-n-j', $time);
    return $return;
}




//kálmán csodája
public  function week_from_monday($date)
{
	$date= date("Y-m-d", strtotime($date));
    list($year, $month, $day) = explode("-", $date);

    $wkday = date('l', mktime('0','0','0', $month, $day, $year));

    switch($wkday) {
        case 'Monday': $numDaysToMon = 0; break;
        case 'Tuesday': $numDaysToMon = 1; break;
        case 'Wednesday': $numDaysToMon = 2; break;
        case 'Thursday': $numDaysToMon = 3; break;
        case 'Friday': $numDaysToMon = 4; break;
        case 'Saturday': $numDaysToMon = 5; break;
        case 'Sunday': $numDaysToMon = 6; break;   
    }

    $monday = mktime('0','0','0', $month, $day - $numDaysToMon, $year);

    $seconds_in_a_day = 86400;
    
    for($i=0; $i<7; $i++)
    {
        $dates[$i]['day']['day'] = date('Y-m-d', $monday + ($seconds_in_a_day * $i));
        $dayName = date('D', strtotime($dates[$i]['day']['day']));
    }

    return $dates;
}


function dateprintip($date){
	//$ret=datedata($date);
$ret=date('YmdHi',strtotime($date));	
$c=0;$ret2='';
for ($i = 0; $i <= (strlen($ret)-1); $i++) {
	$c++;
	$ret2.=$ret[$i];
if ($c==3){
	$ret2.=".";
	$c=0;
	}
   // echo $i;
}
	return($ret2);
	}		
	
function dateprint($date){
	$ret=date('Y-m-d H:i:s',strtotime($date));
	return($ret);
	}		

function dateprintshort($date){
	$ret=date('Y-m-d',strtotime($date));
	return($ret);
}

function datedata($date){
	$ret=date('YmdHis',strtotime($date));
	return($ret);
}		


function ifdate($input)
{
    if(strlen($input)<10)
    {
        return 0;
    }
    else 
    {
        $igen=checkdate(substr($input,5,2), substr($input,8,2), substr($input,0,4));
        return $igen;
    }
}

function date_strip($date){
	$ret["al"]=date('YmdHis',strtotime($date));
	$ret["y"]=date('Y',strtotime($date));
	$ret["m"]=date('m',strtotime($date));
	$ret["d"]=date('d',strtotime($date));		
	$ret["h"]=date('H',strtotime($date));
	$ret["i"]=date('i',strtotime($date));
	$ret["s"]=date('s',strtotime($date));	
	return($ret);
}	


	
}
$ClassTime=new time();
?>