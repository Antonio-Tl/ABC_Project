<?php
session_start();
if(!$_SESSION['eingeloggt'] == 1){
    header('Location: login.php');
}
$content = '<h3>Über uns: </h3>';

$content .= '<p>Wir Besuchen zur Zeit die 12. Klasse der IGS-Ernstbloch und lieben es in unserer Freizeit zu Coden.</p><p> Mit Freuden durften wir diese Anwendung programmieren.</p>';

$content .= '<h3>Wie Sie uns Erreichen können: </h3>';

$content .= '<p><u>Arlind Tairi:</u></p> <p>Arlindtairi89@gmail.com</p>';
$content .= '<p><u> J. Anotnio Tlusteck:</u></p> <p>J.Antonio.Tlusteck@gmx.de</p>';

$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Die Praktikanten', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;
