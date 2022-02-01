<?php
require_once 'database.php';
require_once('php-qrcode-master/lib/full/qrlib.php');



if(isset($_GET['id'])){
    $sql = 'SELECT * FROM abc_project.qrcodes WHERE id = '.(int)$_GET['id'];
    $qrs = query($sql);
    if(!sizeof($qrs) ){
        die('ungültige id');
    }
    $sql = 'INSERT INTO abc_project.visits VALUES (null, NOW(),'.(int)$_GET['id'].', "'.mysqli_real_escape_string($dbh, serialize($_SERVER)).'")';
    query($sql);
    header('Location: '.$qrs[0]['url']);
    die();
}



?>

<button onclick="window.location.href='formular.php'">QR-Code eintragen</button>
