 <script>
 
 var disabledDays = ["2016-5-21","2016-5-24","2016-5-27","2016-5-28"];

  $(function() {
	$( "#from" ).datepicker({
		dateFormat: "yy-mm-dd",
		altFormat: "yy-mm-dd",
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
		},
		beforeShowDay: function(date) {
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
            for (i = 0; i < disabledDays.length; i++) {
                if($.inArray(y + '-' + (m+1) + '-' + d,disabledDays) != -1) {
                    //return [false];
                    return [true, 'ui-state-disabled', ''];
                }
            }
            return [true];
		}
    });
    $( "#to" ).datepicker({
		dateFormat: "yy-mm-dd",
		altFormat: "yy-mm-dd",
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		},		
		beforeShowDay: function(date) {
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
            for (i = 0; i < disabledDays.length; i++) {
                if($.inArray(y + '-' + (m+1) + '-' + d,disabledDays) != -1) {
                    //return [false];
                    return [true, 'ui-state-disabled', ''];
                }
            }
            return [true];
		}
    });
  });

 function SetSession(name,val,get)
 {
var datas={'name':name,'val':val};
     $.ajax({
         type: "POST",
         url: server_url+"service.php?q="+'start/setsession',
         data: datas,
         success: function(data)
         {
         }
     });
 }
 function GetSession(name)
 {
     var datas={'name':name};
     $.ajax({
         type: "POST",
         url: server_url+"service.php?q="+'start/getsession',
         data: datas,
         success: function(data)
         {
             return data;
         }
     });
 }
 </script>
<label for="from">From</label>
<input type="text" id="from" name="from" value="<?= $_SESSION["from"];?>">
<label for="to">to</label>
<input type="text" id="to" name="to" value="<?= $_SESSION["to"];?>">
<script>
    $('#to').on('change', function (a) {
        SetSession('to',$('#to').val(),'start/setsession');
        //alert('ch');
    });
    $('#from').on('change', function (a) {
        SetSession('from',$('#from').val(),'start/setsession');
        //alert('ch');
    });
</script>