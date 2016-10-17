var childnum = 0;
var felnottnum = 0;
var roomneedval = 0;
var babynum = 0;
var babyage = 3;

function loadchildrens(data) {
    data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
    mysession = jQuery.parseJSON(data2);
    console.log(mysession);

    for (i = 0; i < childnum; i++) {
        sessoinvarname1 = 'child[' + i + '][birth]';
        sessoinvarname2 = 'child[' + i + '][age]';
        $.each(mysession, function (key, value) {
            if (key == sessoinvarname1) if (document.getElementById(sessoinvarname1))document.getElementById(sessoinvarname1).value = value;
            if (key == sessoinvarname2) if (document.getElementById(sessoinvarname2))document.getElementById(sessoinvarname2).value = value;
        });

    }

}
function countbabys(reqage) {
    mycount = 0;
    childs = $('.childgroup .maskdatebox');
    childs.each(function () {
        if ($(this).val()) {
            age = agecalc($(this).val());
            if (age < reqage) {
                mycount++
            }
        }
    });
    return mycount;
}
function roomneed() {
    var personas = parseInt(childnum) + parseInt(felnottnum) - parseInt(babynum);

    $('#roomneed').html(Math.ceil(personas / 2));
}
function agecalc(birthdate, nowdate) {
    if (nowdate) {
        datum1 = new Date(nowdate);
    } else {
        datum1 = new Date();
    }
    datum2 = new Date(birthdate);
    kul = datum1.getTime() - datum2.getTime();
    kor = Math.floor(kul / (1000 * 60 * 60 * 24) / 365);
    return (kor);
}
function daycalc(firstdate, seconddate) {
    datum1 = new Date(seconddate);
    datum2 = new Date(firstdate);
    kul = datum1.getTime() - datum2.getTime();
    kor = Math.floor(kul / (1000 * 60 * 60 * 24));
    return (kor);
}
function nigthwrite() {
    firstdate = $('#erkezes').val();
    seconddate = $('#tavozas').val();
    console.log(firstdate);
    console.log(seconddate);
    days = daycalc(firstdate, seconddate);
    if (days > 1) {
        nigthst = days - 1;
    }
    else nigthst = 0;
    document.getElementById("ejszam").value = nigthst;
    $('#ejszam').val(nigthst);
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
        console.log(mnum);
        //alert('ch');
    });
    $('#felnottplusf').on('click', function (a) {
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
        if (mydate) {
            myage = agecalc(mydate);
            name2 = name.replace('birth', "age");
            agelement = document.getElementById(name2).value = myage;
            SetSession(name, mydate, 'start/setsession');
            SetSession(name2, myage, 'start/setsession');

        }
        babynum = countbabys(babyage);
        roomneed();


    });
    $('.maskdatebox').mask("9999.99.99", {placeholder: 'yyyy.mm.dd'});


    $('#erkezes').blur(function (event) {
        nigthwrite()
    });
    $('#tavozas').blur(function (event) {
        nigthwrite()
    });


    $("#erkezes").datepicker({
        altFormat: "yyyy.mm.dd",
        defaultDate: "+1w",
        changeMonth: true,
        showOn: "button",
        numberOfMonths: 1,
        onClose: function (selectedDate) {
            $("#tavozas").datepicker("option", "minDate", selectedDate);
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
        altFormat: "yyyy.mm.dd",
        defaultDate: "+1w",
        changeMonth: true,
        showOn: "button",
        numberOfMonths: 1,
        onClose: function (selectedDate) {
            $("#erkezes").datepicker("option", "maxDate", selectedDate);
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
    //nigthwrite();
    roomneed();

});