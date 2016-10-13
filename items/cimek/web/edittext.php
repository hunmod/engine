<script>
    var savecomplete = 0;

</script>
<style>
    #blog_tagsshow span {
        padding: 0 5px;
        margin-right: 5px;
        background: #CCC;
        cursor: pointer;

    }
    .lerningfield {
        position: relative;
    }
    .lerningfield div {
        position: absolute;
        background-color: #FFF;
        border: solid 1px #000000;
        padding-top: 10px;
    }
    .lerningfield div span {
        display: block;
        cursor: pointer;
    }
    .lerningfield div span:hover {
        background-color: #CCC;
    }
    .jobform .col1 .inner, .jobform .col2 .inner, .jobform .col2 {
        overflow: visible;
    }
    #blogtag {
        margin-left: 10px;
        width: 65%;
    }
    #blogtagsl {
        margin-top: 10px;
        max-height: 200px;
        overflow: auto;
        display: none;
        padding: 10px;
        min-width: 250px;
        padding: 3px 10px 5px 10px;
        height: auto;
        line-height: 30px;
        font-size: 18px;
        color: #7c7c7c;
        font-family: 'robotolight';
    }
    .aclist {
        display: block;
        position: absolute;
        background: #FFF;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.7);
        width: 150px;
    }
    .aclist span {
        display: block;
    }
    .aclist span:hover {
        cursor: pointer;
        background: #CCC;
    }
</style>
<div class="container">
    <div class="col-sm-12">
	
	
	<H1>Ócsa ELMÜ hiba által keletkezett károk</H1>
	
	
	2016.09.14. keletkezett káresemények összegyüjtése egy független szerelő számára.<br>
	Holnap felhívok 2 egymástől független nagyobb elektromos céget, akik tudnak hiteles kárlapot írni.
	És átadom nekik a címlistát. mivel sok címről van szó, kedvezményt szeretnék kialkudni.<br>
	Holnapután este törlöm a teljes listát.<br>
	Köszönettel: 
	Nagy Péter. Kálvin 26.
	
        <form id="uploadForm" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            <?php $Form_Class->hiddenbox('hirsave', '1') ;?>
            <br/>
            <input name="id" id="id" type="hidden" value="<?php echo decode($getparams[2]); ?>"/>
			<?php $form->textbox("nev", $adat["nev"], "Név");?><br/>
            <br/>             
			<?php $form->textbox("cim", $adat["cim"], "Cím");?><br/>
            <br/>            
			<?php $form->textbox("tel", $adat["tel"], "Telefonszám");?>
            <br/>			
				<?php $form->textbox("mikor", $adat["mikor"], "mikor jöhetnek (dátum idő tól-ig)");?>
            <br/>
			<?php $form->textaera("szar", $adat["szar"], "Röviden mi ment tönkre");?>
            <br/>            <?php echo $lan['status']; ?>:
			<?php
			
            $form->selectbox2("status", $status, array('value' => 'id', 'name' => 'nev'),  $adat["status"], "status");
            ?>
            <br/>
            <p>
                <button type="submit" class="button enterButton"><?php echo $lan['save']; ?> <i
                        class="fa fa-arrow-right"></i></button>
            </p>
        </form>

        <?php
        if ($hirid > 0) {
            $getparams[2] = $hirid;
            include('items/files/web/list.php');

            ?>
            <a href="<?php echo str_replace('admin.', "", $homeurl) . "hirek/lista/" . $hirid . "?forcelook=1"; ?>"
               target="_blank">
                <div class="col-sm-4">
                    Page preview
                </div>
            </a>

        <?php } ?>

    </div>
</div>