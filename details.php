<?php
session_start();
if(!$_SESSION['eingeloggt'] == 1){
    header('Location: login.php');
}
require_once 'database.php';
require_once 'php-qrcode-master/lib/full/qrlib.php';
require 'config.php';


$content = '<img src="chart2.php?id='.(int)$_GET['id'].'">';



$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Einzelheiten zum QR-Code', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;
