<?php
require_once 'database.php';
require 'config.php';

$file1 = 'temp';
//Saving QR-Code in Database
$data = base64_encode(file_get_contents($file1));
$sql = 'insert into '.$DB.'.qrcodes(id, title, url, created_at) 
        values(null, "' . $_POST['title'] . '", "' . $_POST['url'] . '", NOW())';
query($sql);

header('Location: qrcode-angelegt.php');
die();
