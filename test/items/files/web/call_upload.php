<style>
#holder { border: 10px dashed #ccc; width: 300px; min-height: 300px; margin: 20px auto;}
#holder.hover { border: 10px dashed #0c0; }
#holder img { display: block; margin: 10px auto; }
#holder p { margin: 10px; font-size: 14px; }
progress { width: 90%; }
progress:after { content: '%'; }
.fail { background: #c00; padding: 2px; color: #fff; }
.hidden { display: none !important;}
</style>
<script>
//selectfile and upload
function clicktoid(clickid){
   $('#'+clickid).click();	
}



</script>


<article class="filedrop">
  <div id="holder" onclick="clicktoid('new_image');">
    <br />
	<br />
	<?php echo $lan['feltolteshezhuzzabe'];?>!<br />
    (drag&drop)<br />
  <?php echo $lan['or'].' '.$lan['kattints'].' '.$lan['here']?></div> 
  <p id="upload" class="hidden"><label>Drag &amp; drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
</label>
  <p id="filereader">File API &amp; FileReader API not supported</p>
  <p id="formdata">XHR2's FormData is not supported</p>
  <p id="progress">XHR2's upload progress isn't supported</p>
  <p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>
</article>
<script>
var holder = document.getElementById('holder'),
    tests = {
      filereader: typeof FileReader != 'undefined',
      dnd: 'draggable' in document.createElement('span'),
      formdata: !!window.FormData,
      progress: "upload" in new XMLHttpRequest
    }, 
    support = {
      filereader: document.getElementById('filereader'),
      formdata: document.getElementById('formdata'),
      progress: document.getElementById('progress')
    },
    acceptedTypes = {
      'image/png': true,
      'image/jpeg': true,
      'image/gif': true
    },
    progress = document.getElementById('uploadprogress'),
    fileupload = document.getElementById('upload');

"filereader formdata progress".split(' ').forEach(function (apix) {
  if (tests[apix] === false) {
    support[apix].className = 'fail';
  } else {
    // FFS. I could have done el.hidden = true, but IE doesn't support
    // hidden, so I tried to create a polyfill that would extend the
    // Element.prototype, but then IE10 doesn't even give me access
    // to the Element object. Brilliant.
    support[apix].className = 'hidden';
  }
});

function previewfile(file) {
  if (tests.filereader === true && acceptedTypes[file.type] === true) {
    var reader = new FileReader();
    reader.onload = function (event) {
      var image = new Image();
      image.src = event.target.result;
      image.width = 250; // a fake resize
      holder.appendChild(image);
    };

    reader.readAsDataURL(file);
  }  else {
    holder.innerHTML += '<p>Uploaded ' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K' : '');
    console.log(file);
  }
}

function readfiles(files) {
    debugger;
    var formData = tests.formdata ? new FormData() : null;
	formData.append('file_location','<?php echo $data_folderpage2;?>');
    for (var i = 0; i < files.length; i++) {
      if (tests.formdata) formData.append('photo', files[i]);
      previewfile(files[i]);
    }

    // now post a new XHR request
    if (tests.formdata) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '<?php  print $homeurl;?>/upload.php');
      xhr.onload = function() {
        progress.value = progress.innerHTML = 100;
      };

      if (tests.progress) {
        xhr.upload.onprogress = function (event) {
          if (event.lengthComputable) {
            var complete = (event.loaded / event.total * 100 | 0);
            progress.value = progress.innerHTML = complete;
          }
        }
      }

      xhr.send(formData);
    }
}

if (tests.dnd) { 
  holder.ondragover = function () { this.className = 'hover'; return false; };
  holder.ondragend = function () { this.className = ''; return false; };
  holder.ondrop = function (e) {
    this.className = '';
    e.preventDefault();
    readfiles(e.dataTransfer.files);
  }
} else {
  fileupload.className = 'hidden';
  fileupload.querySelector('input').onchange = function () {
    readfiles(this.files);
  };
}

</script>
    <form action="<?php  print $homeurl;?>/upload.php" method="post" enctype="multipart/form-data" target="upload_target" id="hnd_upl" style="display:none;">
    <div id="f1_upload_form" align="center">
    <input name="file_location" type="hidden" value="<?php  print $data_folderpage2;?>" /><br />
    <label>File:</label><input name="photo"  id="new_image"  type="file" size="30" onchange="clicktoid('submitBtn');"/>
    <input type="submit" name="submitBtn" id="submitBtn" class="sbtn" value="Upload" />
    </div>
    <div id="varjal" align="center" style="display:none;">
    Kis turelmet, dolgozom.
    </div>
    <hr />
    </form>
    <a href="<?php echo $separator.$_GET["q"];?>"> <?php echo $lan['refresh'];?></a><br />
    <iframe id="upload_target" name="upload_target" src="includeajax.php" style="display:none;"></iframe>