<style>
.egykep input,
.egykep a:first-child img{
max-height:210px;
width:96%;
}

.egykep{
	text-align:center;
	position:relative;
	float:left;
}
.egykep .filedrop #holder{
margin:0;
min-height:0;
overflow:hidden;
position:relative;
width:100%;
}
.egykep .filedrop #holder img{
	position:absolute;
	bottom:0;
	margin-left:20px;
}
.uplbox{
opacity:1;
margin:0;
padding:0;
}
.uplbox img{
height:120px;
}
.thumbnail img{
	height:auto;
	width:100%
}

</style>
<script>
$(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;

        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});
</script>

<?php
if (($_GET["imgforgat"]!="") && ($_GET["i"]!="") ){kepforgat(decode($_GET["imgforgat"]),$_GET["i"]);}

//nem csak kép, bármilyen állomány feltöltésére alkalmas, a menürendszert használja és autómatikusan létrehozza a könyvtárstruktúrát.
$id=($getparams[2]);
$menu=$MenuClass->get_one_menu($id);
//a modulneve és a megnyitott elem id-ja a célkönyvtár
$data_folderpage2='/'.$folders["uploads"].'/'.$getparams[0]."/".$id.'/';
//echo $data_folderpage2;

	$mappa='uploads/'.$folders["uploads"]."/".$getparams[0]."/".$id.'/';
	//echo $mappa;
	$mylist=$Upload_Class->folderlist($mappa);

?>

<!--div id="breadCrumb">
                <a href="<?php echo $homeurl;?>">Home</a> /  Files / <a href="<?php echo $homeurl.'/'.$separator;?><?php echo shorturl_get("m/".$menu[0]["id"]);?>"><?php echo $menu[0]["nev"];?> </a> 
                        / <span><?php echo "". ($Text_Class->htmlfromchars($aprodata["cim"]));?></span>
               
                
            </div-->
<div class="clear" ></div>
<files>

<?php //$getparams[2]=decode($getparams[2]);?>

<?php if($auser["jogid"]>=3){?>
    <article class="col-sm-3 egykep">
    <?php
        include("call_upload.php");
    ?>
    </article>
<?php } ?>

    <?php
	if(count($mylist))foreach ($mylist as $egyelem){
		 include("list_element_paralax.php");
	?>
	<?php 
	}
    ?>
</files>
    <iframe name="upload_targetx" id="upload_targetx" src="includeajax.php?q=m/1" style="display:none;"></iframe>

<div style="clear:both"></div>