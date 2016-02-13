    <script> 
function ajaxpostfileform(formname){
	            $('#'+formname).ajaxForm(function(result) { 				
				var backdata=jQuery.parseJSON(result);
				if (backdata.script!=""){
					$('#wrkstat').html('');
					window[backdata.script](backdata.endfile);
				}
	$('#wrkstat').html('');

            }); 
	
	}	

function kill(what){

		$('#cropping').html('');

	}

function rotate_left(){
	phpopenf('wrkstat','imageproc','');
	}


	function cropper(img){
		var default_width=900;
		$('#wrkstat').html('');
		$('#wrkstat').after('<div id="cropping"><img src="'+img+'" id="targetx" width="'+default_width+'px" />');
		$('#targetx').after('<form action="imageproc.php" method="post" name="crop_make" id="crop_make"  onsubmit="return checkCoords();">'+
			'<input type="hidden" id="x" name="x" />'+
			'<input type="hidden" id="y" name="y" />'+
			'<input type="hidden" id="w" name="w" />'+
			'<input type="hidden" id="h" name="h" />'+
			'<input type="hidden" id="fnct" name="fnct" value="crop" />'+
			'<input type="text" id="img_width" name="img_width" value="'+default_width+'"/>'+
			'<input type="text" id="url" name="url" value="'+img+'"/>'+
			'<span onclick="javascript:postform(\'wrkstat\',\'imageproc\',\'crop_make\',\'?xx=33\');"> save </span>'+
			'</form>'+'</div>');
				var default_height = targetx.height;

        $('#targetx').Jcrop({
			setSelect:[ default_width*2/6 , 100, default_width*2/3, default_height ],      
			onSelect: updateCoords

        });
      jcrop_api.focus();
	  
	}
	
	
	function addx(dat){
		$('#status').after('<p>'+dat+'</p>');
		alert("'"+dat+"'"); 

		}
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
			ajaxpostfileform('form1');
				$('#wrkstat').html('');

        }); 
		
function click_sendfile()
{
	$('#wrkstat').html('Töltök');
	$(save).click();	
}





  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

		
		
    </script>
<form id="form1" enctype="multipart/formdata" action="upload.php">
<input type="file" id="photo" name="photo" onchange="click_sendfile();" />
<input type="text" id="q" name="q" value="<?php echo $_GET['q'];?>/" />
<input type="text" id="script" name="script" value="cropper" />
<input type="text" id="param" name="param" value="1,2,3" />


<input type="submit" id="save" name="save" value="Upload" style="display:none;" />
</form>
    <div class="progress" id="wrkstat"></div>
