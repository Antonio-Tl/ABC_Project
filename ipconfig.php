<?php
require_once 'database.php';
require_once 'php-qrcode-master/lib/full/qrlib.php';
require 'config.php';




$sql = 'INSERT INTO '.$DB.'.ip VALUE (null, '.$ip.')';
