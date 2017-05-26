<?php
/**
 * Created by PhpStorm.
 * User: karstenschutz
 * Date: 13.12.16
 * Time: 20:06
 */

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['imageUpload']['name']);

if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $uploadfile)) {
    
} else {
    var_dump("Upload failed");
}