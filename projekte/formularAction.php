<?php
require_once 'database.php';
$sql = 'INSERT INTO abc.xyz_1 (fahrer, auto, preis) 
        VALUES ("' . $_POST['driver'] . '", "' . $_POST['car'] . '", "' . $_POST['price'] . '")';
query($sql);

header('Location: index.php');
die();