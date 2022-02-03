<?php
session_start();
if(!$_SESSION['eingeloggt'] == 1){
    header('Location: login.php');
}
require_once 'database.php';
require_once 'php-qrcode-master/lib/full/qrlib.php';
require 'config.php';

$sql = 'select * from '.$DB.'.qrcodes WHERE id ='.(int)$_GET['id'];
$code = query($sql)[0];
$path = 'images/';
$file1 = $path.$code['id']."-".preg_replace('/[\x00-\x1F\x7F]/', '', $code['title']).".svg";
$gesamtaufrufe = query('select count(id) AS summe from '.$DB.'.visits WHERE q_id='.(int)$_GET['id'])[0]['summe'];

$content = '<div align="center">
            <h2>Infos zum QR-Code von: '.$code['title'].'</h2>
            <img src="chart2.php?id='.(int)$_GET['id'].'"> </br>
            </br><p>Insgesamt aufgerufen: '.$gesamtaufrufe.'</p>
            <p>Der QR-Code:</p>
            <img width="300" src="'.$file1.'">';



$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Einzelheiten zum QR-Code', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;
