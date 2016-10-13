<?php
if ($_GET['picture'] != "") {
    echo $theimage = base64_decode($_GET['picture']);
}
?>