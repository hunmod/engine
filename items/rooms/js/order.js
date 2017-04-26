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
    roomorder();
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

function roomorder()
{
    nigthwrite();

    htmltext='';
    roomheave['db']=0;
    roomheave['babynum']=0;
    roomheave['gyerek']=0;
    felnott=roomheave['felnott']=0;
    roomheave['gyerekedvezmeny1']=0;
    roomheave['gyerekedvezmeny2']=0;
    roomheave['gyerekedvezmeny3']=0;
    $( ".ordertable" ).each(function( index  ) {
        aratext = '';
        roomdatas = [];
        roomelementid = this.id;
        roomid = roomelementid.replace("selectedroom", "");

        gyerekedvezmeny0input = gyerekagyinput = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny0]');
        childbad = document.getElementById('rooms[' + roomid + '][childbad]');
        gyerekedvezmeny1input = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny1]');
        gyerekedvezmeny2input = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny2]');
        gyerekedvezmeny3input = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny3]');
        felnottinput = document.getElementById('rooms[' + roomid + '][felnott]');
        ejinput = document.getElementById('ejszam');
        // gyerekinput = document.getElementById('rooms[' + roomid + '][gyerek]');


        szobaboldb = parseInt(document.getElementById('rooms[' + roomid + '][ordernum]').value);
        szobabomaxfelnott = parseInt(document.getElementById('rooms[' + roomid + '][person]').value)*szobaboldb;
        szobabomaxgyerek = parseInt(document.getElementById('rooms[' + roomid + '][person]').value)*szobaboldb;

        szobabomaxgyerekagy = parseInt(childbad.value)*szobaboldb;
        gyerekedvezmeny0 = parseInt(gyerekedvezmeny0input.value);
        gyerekedvezmeny1 = parseInt(gyerekedvezmeny1input.value);
        gyerekedvezmeny2 = parseInt(gyerekedvezmeny2input.value);
        gyerekedvezmeny3 = parseInt(gyerekedvezmeny3input.value);
        felnott = parseInt(felnottinput.value);
        ej = parseInt(ejinput.value);

        if (isNaN(ej))ej=0;
        if (isNaN(gyerekedvezmeny0))gyerekedvezmeny0=0;
        if (isNaN(gyerekedvezmeny1))gyerekedvezmeny1=0;
        if (isNaN(gyerekedvezmeny2))gyerekedvezmeny2=0;
        if (isNaN(gyerekedvezmeny3))gyerekedvezmeny3=0;

        gyerekekkedevezmenynum=gyerekedvezmeny1+gyerekedvezmeny2+gyerekedvezmeny3;

        szobabomaxfelnott=szobabomaxfelnott-gyerekekkedevezmenynum;

        if (!isNaN(felnott)) {
            szobabomaxgyerek = szobabomaxgyerek - felnott;
        }else felnott=0;

            /*if (parseInt(gyerekinput.value)) {
            szobabomaxfelnott = szobabomaxfelnott * szobaboldb - parseInt(gyerekinput.value);
        }*/
       // console.log(parseInt(gyerekagyinput.value));
        if (parseInt(gyerekedvezmeny0) > 0) {
            roomheave['babynum']+=parseInt(gyerekedvezmeny0);
        }
        if (parseInt(felnott) > 0) {
            roomheave['felnott']+=parseInt(felnott);
        }
        if (parseInt(gyerekedvezmeny1) > 0) {
            roomheave['gyerekedvezmeny1']+=gyerekedvezmeny1;
        }
        if (parseInt(gyerekedvezmeny2) > 0) {
            roomheave['gyerekedvezmeny2']+=gyerekedvezmeny2;
        }
        if (parseInt(gyerekedvezmeny3) > 0) {
            roomheave['gyerekedvezmeny3']+=gyerekedvezmeny3;
        }
        roomheave['gyerek']+=parseInt(gyerekedvezmeny0input.value)+parseInt(gyerekedvezmeny1input.value)+parseInt(gyerekedvezmeny2input.value)+parseInt(gyerekedvezmeny3input.value);

        if (szobaboldb>0){
         //ha rendel szobat
        roomheave['db']+=szobaboldb;
            if (szobaboldb>=1){
                //max inputs

                if(szobabomaxfelnott>felnottnum){
                    szobabomaxfelnott=felnottnum;
                }
                if (szobabomaxfelnott<felnott){
                    felnottinput.value=(szobabomaxfelnott);
                }

                if (felnottnum-roomheave['felnott']==0){
                    szobabomaxfelnott= felnott;
                }
                felnottinput.setAttribute("max",szobabomaxfelnott);


                //gyerekinput.setAttribute("max",szobabomaxgyerek);
                szobabomaxkedvezmeny1=szobabomaxgyerek-gyerekedvezmeny2-gyerekedvezmeny3;
                szobabomaxkedvezmeny2=szobabomaxgyerek-gyerekedvezmeny1-gyerekedvezmeny3;
                szobabomaxkedvezmeny3=szobabomaxgyerek-gyerekedvezmeny1-gyerekedvezmeny2;

                if(szobabomaxgyerekagy>babynum){
                    szobabomaxgyerekagy=babynum;
                }

                if(szobabomaxkedvezmeny1>babynum1){
                    szobabomaxkedvezmeny1=babynum1;
                }
                if (babynum1-roomheave['gyerekedvezmeny1']==0){
                    szobabomaxkedvezmeny1= gyerekedvezmeny1;
                }
                if(szobabomaxkedvezmeny2>babynum2){
                    szobabomaxkedvezmeny2=babynum2;
                }
                if (szobabomaxkedvezmeny2<gyerekedvezmeny2){
                    gyerekedvezmeny2input.value=(szobabomaxkedvezmeny2);
                }
                if (babynum2-roomheave['gyerekedvezmeny2']==0){
                    szobabomaxkedvezmeny2= gyerekedvezmeny2;
                }
                if (szobabomaxkedvezmeny3<gyerekedvezmeny3){
                    gyerekedvezmeny3input.val(szobabomaxkedvezmeny3);
                }
                if(szobabomaxkedvezmeny3>babynum3){
                    szobabomaxkedvezmeny3=babynum3;
                }

                if (babynum3-roomheave['gyerekedvezmeny3']==0){
                    szobabomaxkedvezmeny3= gyerekedvezmeny3;
                }

                /*
                if(szobabomaxkedvezmeny3>babynum3-roomheave['gyerekedvezmeny3']){
                    szobabomaxkedvezmeny3=babynum3-roomheave['gyerekedvezmeny3']
                }
*/
                gyerekedvezmeny1input.setAttribute("max",szobabomaxkedvezmeny1);
                gyerekedvezmeny2input.setAttribute("max",szobabomaxkedvezmeny2);
                gyerekedvezmeny3input.setAttribute("max",szobabomaxkedvezmeny3);
                gyerekedvezmeny0input.setAttribute("max",szobabomaxgyerekagy);
            }
            roomdatas['ar1']=parseInt($('#'+roomelementid+' ar1').html());
            roomdatas['ar2']=parseInt($('#'+roomelementid+' ar2').html());
            roomdatas['artipusid']=parseInt($('#'+roomelementid+' artipusid').html());
            //aratext+='tip:'+roomdatas['artipusid']+' ';

            roomdatas['vegosszeg']=0;
           // mindenkicounter=mindenki=gyerekedvezmeny0+gyerekedvezmeny1+gyerekedvezmeny2+gyerekedvezmeny3+felnott;
            mindenkicounter=mindenki=gyerekedvezmeny1+gyerekedvezmeny2+gyerekedvezmeny3+felnott;
            //aratext+='ö:'+ mindenki+' Fő ';

            if (!isNaN(mindenki)){
                //innen számolunk
                parosmaradek=mindenki % 2;
                switch(roomdatas['artipusid']) {
                    case 1:{
                        ejszorzo=ej;
                        // fo/ej

                if (!isNaN(felnott)&& felnott>0){
                    for (i = 0; i < felnott; i++) {
                        if (mindenkicounter==parosmaradek){
                            roomdatas['vegosszeg'] += roomdatas['ar1']*ejszorzo;
                        }else {
                            roomdatas['vegosszeg'] += roomdatas['ar2']*ejszorzo;
                        }
                        mindenkicounter--;
                    }
                }
               // aratext+='felnott:'+ roomdatas['vegosszeg']+'  ';

                if (!isNaN(gyerekedvezmeny1)&& gyerekedvezmeny1>0){
                    for (i = 0; i < gyerekedvezmeny1; i++) {
                        if (mindenkicounter==parosmaradek){
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny1']['tip'],gyerekkedevezmenyek['gyerekedvezmeny1']['val'],roomdatas['ar1']*ejszorzo);
                        }else {
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny1']['tip'],gyerekkedevezmenyek['gyerekedvezmeny1']['val'],roomdatas['ar2']*ejszorzo);
                        }
                        mindenkicounter--;
                    }
                }
               // aratext+='gyerekedvezmeny1:'+ roomdatas['vegosszeg']+'  ';

                if (!isNaN(gyerekedvezmeny2)&& gyerekedvezmeny2>0){
                    for (i = 0; i < gyerekedvezmeny2; i++) {
                        if (mindenkicounter==parosmaradek){
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny2']['tip'],gyerekkedevezmenyek['gyerekedvezmeny2']['val'],roomdatas['ar1']*ejszorzo);
                        }else {
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny2']['tip'],gyerekkedevezmenyek['gyerekedvezmeny2']['val'],roomdatas['ar2']*ejszorzo);
                        }
                        mindenkicounter--;
                    }
                }
               // aratext+='gyerekedvezmeny2:'+ roomdatas['vegosszeg']+'  ';

                if (!isNaN(gyerekedvezmeny3)&& gyerekedvezmeny3>0){
                    for (i = 0; i < gyerekedvezmeny3; i++) {
                        if (mindenkicounter==parosmaradek){
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny3']['tip'],gyerekkedevezmenyek['gyerekedvezmeny3']['val'],roomdatas['ar1']*ejszorzo);
                        }else {
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny3']['tip'],gyerekkedevezmenyek['gyerekedvezmeny3']['val'],roomdatas['ar2']*ejszorzo);
                        }
                        mindenkicounter--;
                    }
                }
               // aratext+='gyerekedvezmeny3:'+ roomdatas['vegosszeg']+'  ';

                if (!isNaN(gyerekedvezmeny0)&& gyerekedvezmeny0>0){
                    for (i = 0; i < gyerekedvezmeny0; i++) {
                        if (mindenkicounter==parosmaradek){
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny0']['tip'],gyerekkedevezmenyek['gyerekedvezmeny0']['val'],roomdatas['ar1']*ejszorzo);
                        }else {
                            roomdatas['vegosszeg'] += gyerekkedvezmeny(gyerekkedevezmenyek['gyerekedvezmeny0']['tip'],gyerekkedevezmenyek['gyerekedvezmeny0']['val'],roomdatas['ar2']*ejszorzo);
                        }
                        mindenkicounter--;
                    }
                }
                break;
                    }
            case 2:{
                // szoba/ej
                ejszorzo=ej;
                if(parosmaradek>0){
                    roomdatas['vegosszeg']+=(szobaboldb-parosmaradek)*ej*roomdatas['ar2'];
                    roomdatas['vegosszeg']+=(parosmaradek)*ej*roomdatas['ar1'];
                  //  aratext+='szobaboldb:'+ szobaboldb+'* '+ej+ '* '+roomdatas['ar2'];


                }
                else {
                    roomdatas['vegosszeg'] += szobaboldb * ej * roomdatas['ar2'];
                  //  aratext+='szobaboldb:'+ szobaboldb+'* '+ej+ '* '+roomdatas['ar2'];

                }
                //roomdatas['vegosszeg'] = szobaboldb * ej * roomdatas['ar2'];




                break;
                }
            default:
                ejszorzo=1;
            }

        }


            aratext+='<szobara>'+ roomdatas['vegosszeg']+'</szobara>';






            // roomdatas['gyerek']=parseInt(document.getElementById('rooms['+roomid+'][gyerek]').value);
            roomdatas['ar1']=parseInt($('#'+roomelementid+' ar1').html());
           // aratext+=roomdatas['gyerek'];
            if ((roomdatas['felnott']+roomdatas['gyerek'])==1){

            }

            $('.rooms'+roomid+'ara').html(aratext);
        }



       // console.log( roomheave );

        //ami kell a szobákhoz csak azt lássuk

       // console.log(babynum1);



    });

    $( ".ordertable" ).each(function( index  ) {
        aratext = '';
        roomdatas = [];
        roomelementid = this.id;
        roomdatas['id']=roomid = roomelementid.replace("selectedroom", "");
        orderroomnumberinput  = document.getElementById('rooms[' + roomid + '][ordernum]');
        gyerekedvezmeny0input =  gyerekagyinput = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny0]');
        gyerekedvezmeny1input = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny1]');
        gyerekedvezmeny2input = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny2]');
        gyerekedvezmeny3input = document.getElementById('rooms[' + roomid + '][gyerekedvezmeny3]');
        felnottinput = document.getElementById('rooms[' + roomid + '][felnott]');

        orderroomnumber = parseInt(orderroomnumberinput.value);
        gyerekedvezmeny0 = parseInt(gyerekedvezmeny0input.value);
        gyerekedvezmeny1 = parseInt(gyerekedvezmeny1input.value);
        gyerekedvezmeny2 = parseInt(gyerekedvezmeny2input.value);
        gyerekedvezmeny3 = parseInt(gyerekedvezmeny3input.value);
        felnott = parseInt(felnottinput.value);
        //console.log(orderroomnumber+' | '+felnottnum+' | '+roomheave['felnott']+' | '+felnott+' | '+'#'+'rooms_' + roomid + '_felnott_div');

        if (orderroomnumber==0 || orderroomnumber=='NaN' || orderroomnumber==''|| orderroomnumber==null || isNaN(orderroomnumber)){
            $('.'+'rooms' + roomid + 'rendelesadatok').addClass('hidden');
        }
        else{
            $('.'+'rooms' + roomid + 'rendelesadatok').removeClass('hidden');
        }

        if (felnottnum==0 || (roomheave['felnott']>=felnottnum && !felnott )){
            $('#'+'rooms_' + roomid + '_felnott_div').addClass('hidden');
        }
        else{
            $('#'+'rooms_' + roomid + '_felnott_div').removeClass('hidden');
        }

        if (babynum==0 || (roomheave['babynum']==babynum && gyerekedvezmeny0==0 )){
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny0_div').addClass('hidden');
        }
        else{
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny0_div').removeClass('hidden');
        }
        if (babynum1==0 || (roomheave['gyerekedvezmeny1']==babynum1 && gyerekedvezmeny1==0 )){

            $('#'+'rooms_' + roomid + '_gyerekedvezmeny1_div').addClass('hidden');
        }
        else{
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny1_div').removeClass('hidden');
        }
        if (babynum2==0 || (roomheave['gyerekedvezmeny2']==babynum2 && gyerekedvezmeny2==0 )){
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny2_div').addClass('hidden');
        }
        else{
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny2_div').removeClass('hidden');
        }
        if (babynum3==0 || (roomheave['gyerekedvezmeny3']==babynum3 && gyerekedvezmeny3==0 )){
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny3_div').addClass('hidden');
        }
        else{
            $('#'+'rooms_' + roomid + '_gyerekedvezmeny3_div').removeClass('hidden');
        }
        orderroomnumberinput=null;
});




    htmltext+=roomheave['db']+'<br>';
    htmltext+=' <b>gyerek: </b>'+roomheave['gyerek']+'<br>';
    htmltext+=' <b>felnott: </b>'+roomheave['felnott']+'<br>';

    htmltext+=' <b>0-3: </b>'+roomheave['babynum']+'<br>';
    htmltext+=' <b>3-10: </b>'+roomheave['gyerekedvezmeny1']+'<br>';
    htmltext+=' <b>10-14: </b>:'+roomheave['gyerekedvezmeny2']+'<br>';
    htmltext+=' <b>14-18: </b>:'+roomheave['gyerekedvezmeny3']+'<br>';
    $('#roomheave').html(htmltext);

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

    $('.ordertable input').on('change', function (a) {
        roomorder();
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
                //  SetSession(name, '', 'start/setsession');
                //   SetSession(name2, '', 'start/setsession');
            }
        }
        roomneed();


    });
    $('.maskdatebox').mask("9999.99.99", {placeholder: 'yyyy.mm.dd'});

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
        nigthwrite()
        SetSession('from', $('#erkezes').val(), 'start/setsession');

    });
    $('#tavozas').on('change',function (event) {
        nigthwrite()
        SetSession('to', $('#tavozas').val(), 'start/setsession');

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
    roomorder();
});