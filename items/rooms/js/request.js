var childnum = '0';
var felnottnum = '0';
var roomneedval = '0';
var babynum = 0;
var babynum1 = 0;
var babynum2 = 0;
var babynum3 = 0;
var roomheave = [];

function loadchildrens(data) {
    if (data) {
        data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
        mysession = jQuery.parseJSON(data2);
        //  console.log(mysession);

        for (i = 0; i < childnum; i++) {
            sessoinvarname1 = 'child[' + i + '][birth]';
            sessoinvarname2 = 'child[' + i + '][age]';
            $.each(mysession, function (key, value) {
                if (key == sessoinvarname1) if (document.getElementById(sessoinvarname1))document.getElementById(sessoinvarname1).value = value;
                if (key == sessoinvarname2) if (document.getElementById(sessoinvarname2))document.getElementById(sessoinvarname2).value = value;
            });
        }
    }
    roomneed();

}
function countbabys(minage,maxage) {
    //kor sztrint összeszámolja
    mycount = 0;
    childs = $('.childgroup .maskdatebox');
    childs.each(function () {
        if ($(this).val()) {
            age = agecalc($(this).val(),null);
            if (age < maxage && age>=minage) {
                mycount++
            }
        }
    });
    return mycount;
}
function countbabys1(reqage) {
    mycount = 0;
    childs = $('.childgroup .maskdatebox');
    childs.each(function () {
        if ($(this).val()) {
            age = agecalc($(this).val(),null);
            //console.log(age);
            if (age < reqage) {
                mycount++
            }
        }
    });
    return mycount;
}
function roomneed() {
    babynum = countbabys(0,3);
    babynum1 = countbabys(3,10);
    babynum2 = countbabys(10,14);
    babynum3 = countbabys(14,18);
    //console.log(babynum);

    var personas = parseInt(childnum) + parseInt(felnottnum)- parseInt(babynum);
    var htmltext='';
    htmltext+=Math.ceil(personas / 2)+'<br>';

    htmltext+=' <b>gyerek </b>'+childnum+'<br>';
    htmltext+=' <b>felnott </b>'+felnottnum+'<br>';


    htmltext+=' <b>0-3: </b>'+babynum+'<br>';
    htmltext+=' <b>3-10: </b>'+babynum1+'<br>';
    htmltext+=' <b>10-14: </b>:'+babynum2+'<br>';
    htmltext+=' <b>14-18: </b>:'+babynum3+'<br>';
    $('#roomneed').html(htmltext);
}

function nigthwrite() {
    firstdate = $('#erkezes').val();
    seconddate = $('#tavozas').val();
    days = daycalc(firstdate, seconddate);
    if (days >= 1) {
        nigthst = days;
    }
    else nigthst = 0;
    document.getElementById("ejszam").value = nigthst;
    $('#ejszam').val(nigthst);
   // console.log(nigthst);

}
function sleep(ms) {
   // return new Promise(resolve = > setTimeout(resolve, ms));
}
function countgyerekek() {
    return $('.childgroup').length;
    //console.log($('.childgroup').length);
}
function removegyerek() {
    $('.childgroup').last().remove();
    childnum--;
}

function gyerekkedvezmeny(tip,mertek,osszeg){
    retvar=0;
    if (tip==1){
        retvar=osszeg-mertek;
    }
    else if (tip==2){
        retvar=osszeg-osszeg*mertek/100;
    }
    return retvar;
}


$(window).load(function () {
    var mychild = ($('#gyereknum').val());
    for (i = 0; i < mychild; i++) {
        addgyerek();
    }
    felnottnum = $('#felnottnum').val();
    //ejaszakak kiszamolas
    nigthwrite();
    $('#felnottnum').on('change', function (a) {
        SetSession('felnott', $('#felnottnum').val(), 'start/setsession');
        //alert('ch');
    });
    $('#gyereknum').on('change', function (a) {
        SetSession('gyerek', $('#gyereknum').val(), 'start/setsession');
        var mnum = $('#gyereknum').val();
        if (mnum > childnum) {
            for (i = childnum; i < mnum; i++) {
                addgyerek();
            }
        }
        if (mnum < childnum) {
            for (i = mnum; i < childnum + 1; i++) {
                removegyerek();
                sleep(10000);
            }
            //console.log(childnum);

        }
       // console.log(mnum);
        //alert('ch');
    });

    $('#felnottplusf').on('click', function (a) {
        if (isNaN(felnottnum))felnottnum=0;
        SetSession('felnott', valboxplus('felnottnum'), 'start/setsession');
        felnottnum++;
        roomneed();
        //alert('ch');
    });
    $('#gyerekplusf').on('click', function (a) {
        SetSession('gyerek', valboxplus('gyereknum'), 'start/setsession');
        addgyerek();
        roomneed();
        //alert('ch');
    });
    $('#felnottminusf').on('click', function (a) {
        SetSession('felnott', valboxminus('felnottnum'), 'start/setsession');
        felnottnum--;
        roomneed();
        //alert('ch');
    });
    $('#gyerekminusf').on('click', function (a) {
        SetSession('gyerek', valboxminus('gyereknum'), 'start/setsession');
        removegyerek();
        roomneed();
        //alert('ch');
    });


    $('.childgroup .maskdatebox').blur(function (event) {
        name = $(this).attr('id');
        mydate = $(this).val();
        name2 = name.replace('birth', "age");

        if (mydate) {
            myage = agecalc(mydate,null);
            if (myage<18) {
                agelement = document.getElementById(name2).value = myage;
                SetSession(name, mydate, 'start/setsession');
                SetSession(name2, myage, 'start/setsession');
            }else{
                $(this).val('');
                agelement = document.getElementById(name2).value = '';
                $('#gyerekminusf').click();
                $('#felnottplusf').click();
                alert('18 éven aluli számít gyereknek!');
                //  SetSession(name, '', 'start/setsession');
                //   SetSession(name2, '', 'start/setsession');
            }
        }
        roomneed();


    });
    $('.maskdatebox').mask("9999-99-99", {placeholder: 'yyyy-mm-dd'});

    $('.plusmnum').click(function(){
        thmyelement=document.getElementById($(this).attr("conn"));
        ismynum=parseInt(thmyelement.value);
        if (isNaN(ismynum)){
            ismynum=0;
        }
        ismynum++;
        thmyelement.value=ismynum;
      // console.log( $('#'+$(this).attr("conn")).val());
        roomneed();

    });

    $('.minusmnum').click(function(){
        thmyelement=document.getElementById($(this).attr("conn"));
        ismynum=parseInt(thmyelement.value);
        if (isNaN(ismynum)){
            ismynum=0;
        }
        ismynum--;
        if (ismynum<0)ismynum=0;
        thmyelement.value=ismynum;
        roomneed();

        //thmyelement.change();
    });
/*
    $('#erkezes').blur(function (event) {
        nigthwrite()
    });
    $('#tavozas').blur(function (event) {
        nigthwrite()
    });
*/
    $('#erkezes').on('change',function (event) {
        nigthwrite();
        SetSession('from', $('#erkezes').val(), 'start/setsession');

    });
    $('#tavozas').on('change',function (event) {
        nigthwrite()
        SetSession('to', $('#tavozas').val(), 'start/setsession');

    });


    $("#erkezes").datepicker({
        altFormat: "yyyy-mm-dd",
        defaultDate: "+1w",
        changeMonth: true,
        showOn: "button",
        numberOfMonths: 1,
        onClose: function (selectedDate) {
            $("#tavozas").datepicker("option", "minDate", selectedDate);
        },
        onSelect: function(date) {
            nigthwrite();
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

    $("#tavozas").datepicker({
        altFormat: "yyyy-mm-dd",
        defaultDate: "+1w",
        changeMonth: true,
        showOn: "button",
        numberOfMonths: 1,
        onClose: function (selectedDate) {
            $("#erkezes").datepicker("option", "maxDate", selectedDate);
            nigthwrite();

        },
        onSelect: function(date) {
            nigthwrite();
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


    //gyerekadatok visszatöltése sessionből, ez elég fapad, de nem tudtam jobbat..:(
    $.ajax({
        type: "GET",
        url: server_url + "service.php?q=" + 'start/getsessionarray',
        success: function (data) {
            loadchildrens(data);
        }
    });
    nigthwrite();
    roomneed();
});