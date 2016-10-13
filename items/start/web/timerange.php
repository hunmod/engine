<style>
#ui-datepicker-div {
    z-index: 1101!important;
    width: 250px;
}
    .timeselectframe{
        position: fixed;
        height: 100%;
        width: 0px;
        top: 0;
        right:0;
        padding-top: 103px;
        z-index: 900;
        background-color: #fff;
        box-shadow: 0 0 20px 0px rgba(0,0,0,0.8);
        transition: all 1s ease-in-out;
        opacity: 0;
    }
.timeselectframe.showdiv{
    width: 320px!important;opacity: 1;
}
</style>
<script>
    <?php
        if (!$_SESSION["from"])$_SESSION["from"]=$onlydateprint;
        if (!$_SESSION["to"])$_SESSION["to"]=$onlydateprint;
        if (!$_SESSION["felnott"])$_SESSION["felnott"]='0';
        if (!$_SESSION["gyerek"])$_SESSION["gyerek"]='0';
    ?>
    $('#opentimesector').click(function() {

        $( ".timeselectframe" ).toggleClass( "showdiv" );

    });
    //var disabledDays = ["2016-5-21","2016-5-24","2016-5-27","2016-5-28"];
    var disabledDays = [];
    jQuery(function ($) {
        $.datepicker.regional['hu'] = {
            closeText: 'bezárás',
            prevText: '&laquo;&nbsp;vissza',
            nextText: 'előre&nbsp;&raquo;',
            currentText: 'ma',
            monthNames: ['Január', 'Február', 'Március', 'Április', 'Május', 'Június',
                'Július', 'Augusztus', 'Szeptember', 'Október', 'November', 'December'],
            monthNamesShort: ['Jan', 'Feb', 'Már', 'Ápr', 'Máj', 'Jún',
                'Júl', 'Aug', 'Szep', 'Okt', 'Nov', 'Dec'],
            dayNames: ['Vasárnap', 'Hétfö', 'Kedd', 'Szerda', 'Csütörtök', 'Péntek', 'Szombat'],
            dayNamesShort: ['Vas', 'Hét', 'Ked', 'Sze', 'Csü', 'Pén', 'Szo'],
            dayNamesMin: ['V', 'H', 'K', 'Sze', 'Cs', 'P', 'Szo'],
            weekHeader: 'Hé',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: '',
            buttonImage:homeurl+'/scripts/images/calendar.gif',
            beforeShow: function ( inst) {
                setTimeout(function () {
                    var p = $( ".timeselectframe:first" );
                    var k = $( ".timeselecthead:first" );
                    var kb = $( ".timeselecttext:first" );
                    var position = p.offset();
                    var positionk = k.position();
                    var positionb = kb.position();
                   // $('#ui-datepicker-div').css({ top: position.top+positionk.height+positionb.height, left:  position.left });
                    console.log(position);
                    console.log(positionk);
                    console.log(positionb);
                    $('#ui-datepicker-div').css({ top: positionk.top+90, left:  position.left+10,width:300 });
                }, 10);
            }
            };
        $.datepicker.setDefaults($.datepicker.regional['hu']);
    });

    $(function () {
        $("#from").datepicker({
            altFormat: "yy-mm-dd",
            changeMonth: true,
            minDate: "<?= $onlydateprint?>",
            showOn: "button",
            numberOfMonths: 1,

            onClose: function (selectedDate) {
                $("#to").datepicker("option", "minDate", selectedDate);
                $("#fromtext").html(datestring(selectedDate));
            },
            beforeShowDay: function (date) {
                var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                for (i = 0; i < disabledDays.length; i++) {
                    if ($.inArray(y + '-' + (m + 1) + '-' + d, disabledDays) != -1) {
                        //return [false];
                        return [true, 'ui-state-disabled', ''];
                    }
                }
                return [true];
            }
        });


        $("#to").datepicker({
            altFormat: "yy-mm-dd",
            defaultDate: "+1w",
            changeMonth: true,
            showOn: "button",
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                $("#from").datepicker("option", "maxDate", selectedDate);
                $("#totext").html(datestring(selectedDate));
            },
            beforeShowDay: function (date) {
                var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                for (i = 0; i < disabledDays.length; i++) {
                    if ($.inArray(y + '-' + (m + 1) + '-' + d, disabledDays) != -1) {
                        //return [false];
                        return [true, 'ui-state-disabled', ''];
                    }
                }
                return [true];
            }
        });
    });

    function datestring(selectedDate) {
        var dateString = new Date(selectedDate);
        return dateString.getFullYear() + '.' + dateString.getUTCMonth() + '<br><b>' + dateString.getUTCDate() + '</b>';
    }
    function valboxplus(mit){
        var mynum=parseInt($('#'+mit).val())+1;
        $('#'+mit).val(mynum);
       return mynum ;
    }
    function valboxminus(mit){
        var mynum=parseInt($('#'+mit).val())-1;
        if (mynum<1){mynum=0;}
        $('#'+mit).val(mynum);
      return mynum ;
    }

    function SetSession(name, val, get) {
        var datas = {'name': name, 'val': val};
        $.ajax({
            type: "POST",
            url: server_url + "service.php?q=" + 'start/setsession',
            data: datas,
            success: function (data) {
            }
        });
    }
    function GetSession(name) {
        var datas = {'name': name};
        $.ajax({
            type: "POST",
            url: server_url + "service.php?q=" + 'start/getsession',
            data: datas,
            success: function (data) {
                return data;
            }
        });
    }
    $(window).load(function () {
      /*  $(".timeselecthead").on('click', function (a) {
            $(".timeselectcontent").slideToggle('slow');
        });*/
        $("#fromtext").html(datestring('<?= $_SESSION["from"]?>'));
        $("#totext").html(datestring('<?= $_SESSION["to"]?>'));
        $('#to').on('change', function (a) {
            SetSession('to', $('#to').val(), 'start/setsession');
            // alert('ch');
        });
        $('#from').on('change', function (a) {
            SetSession('from', $('#from').val(), 'start/setsession');
            //alert('ch');
        });
        $('#felnott').on('change', function (a) {
            SetSession('felnott', $('#felnott').val(), 'start/setsession');
            //alert('ch');
        });
        $('#felnottplus').on('click', function (a) {
            SetSession('felnott', valboxplus('felnott'), 'start/setsession');
            //alert('ch');
        });
        $('#gyerekplus').on('click', function (a) {
            SetSession('gyerek', valboxplus('gyerek'), 'start/setsession');
            //alert('ch');
        });
        $('#felnottminus').on('click', function (a) {
            SetSession('felnott', valboxminus('felnott'), 'start/setsession');
            //alert('ch');
        });
        $('#gyerekminus').on('click', function (a) {
            SetSession('gyerek', valboxminus('gyerek'), 'start/setsession');
            //alert('ch');
        });

    });

</script>


<div class="timeselectframe">
    <div class="timeselecthead"><?= lan('idopont') ?></div>
    <div class="timeselectzone">
        <form method="post">
            <div class="col-xs-6 timeselectblock">
                <div><?= lan('erkezes'); ?></div>
                <div id="fromtext" class="timeselecttext"></div>
                <input type="text" id="from" name="from" value="<?= $_SESSION["from"]; ?>">
            </div>
            <div class="col-xs-6 timeselectblock">
                <div><?= lan('tavozas'); ?></div>
                <div id="totext" class="timeselecttext"></div>
                <input type="text" id="to" name="to" value="<?= $_SESSION["to"]; ?>">
            </div>
            <div class="col-xs-6">
                <div><?= lan('felnott'); ?></div>
                <span class="plus" id="felnottminus">-</span> <input type="text" id="felnott" name="felnott" value="<?= $_SESSION["felnott"]; ?>"  maxlength="3"> <span class="plus" id="felnottplus">+</span>
            </div>
            <div class="col-xs-6">
                <div><?= lan('gyerek'); ?></div>
                <span class="plus" id="gyerekminus">-</span>  <input type="text" id="gyerek" name="gyerek" value="<?= $_SESSION["gyerek"]; ?>"> <span class="plus" id="gyerekplus">+</span>
            </div>
            <div class="text-center">
            <input type="submit" class="btn btn-creme-inv"></input>
            </div>
        </form>
    </div>
</div>

