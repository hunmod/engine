$(window).load(function () {


    //console.log(getselectedfilelock());
    getjsonfrom();

});

var getJSON = function(url) {
    return new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open('get', url, true);
        xhr.responseType = 'json';
        xhr.onload = function() {
            var status = xhr.status;
            if (status == 200) {
                resolve(xhr.response);
            } else {
                reject(status);
            }
        };
        xhr.send();
    });
};


function loadelements_type1(data) {
   // console.log(data);
     data2 = data.replace(/([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})|./g, "$1");
      menudatas = jQuery.parseJSON(data2);
     // console.log(menudatas);
    ideglenes=$("#item").val();
    $("#item").remove();
    $("#itemcontainer").html('<select id="item" name="item" value="'+ideglenes+'" class="form-control"></select>');
    var midsel = document.getElementById('item');
          $.each(menudatas, function (key, value) {
              console.log(value["title"]);
              var opt = document.createElement('option');
              opt.innerHTML = value["title"];
              opt.value = value["id"];
              midsel.appendChild(opt);
          });

    $("#item").val(ideglenes);
}


function getjsonfrom() {
    selectbox = getselectedfilelock();
    //ide jönnek amikről kell adat a legördülő midhez.
    if ((selectbox['modul'] == "csomag" && selectbox['file'] == "csomag")
        || (selectbox['modul'] == "site" && selectbox['file'] == "site")
        || (selectbox['modul'] == "shop" && selectbox['file'] == "shop")
    )
    {
    $.ajax({
        type: "GET",
        url: server_url + "service.php?q=" + selectbox['modul']+'/'+ selectbox['file']+'_data',
        success: function (data) {
            loadelements_type1(data);
        }
    });
    }else {
        ideglenes=$("#item").val();
        $("#item").remove();
        $("#itemcontainer").html('<input id="item" name="item" placeholder="elem" value="'+ideglenes+'" class="form-control"></input>');

}


}



function getselectedfilelock() {
    var fileloc = new Array();
    fileloc['modul'] = document.getElementById('modul').value;
    fileloc['file'] = document.getElementById('file').value;
    return fileloc;

}

function menu_admin_select(modul, filename) {
    document.getElementById('modul').value = modul;
    document.getElementById('file').value = filename;
    $('span').removeClass(' selected').addClass('');
    $('#' + filename + modul).addClass(" selected");
   // console.log(getselectedfilelock());
    getjsonfrom();
}