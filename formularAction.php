<?php
require_once 'database.php';
require 'config.php';

$sql = 'insert into '.$DB.'.qrcodes(id, title, url, created_at) 
        values(null, "' . $_POST['title'] . '", "' . $_POST['url'] . '", NOW())';
query($sql);

header('Location: qrcode-angelegt.php');
die();
