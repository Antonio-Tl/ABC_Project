<?php
session_start();
if(!$_SESSION['eingeloggt'] == 1){
    die;
}
require 'config.php';
require_once 'database.php';

$sql = "select * from " . $DB . ".qrcodes order by id";

$result = query($sql);

$textStart = 10;
$barStart = 152;

$lineHeight = 30;
$yStart = 34;
$yStartBar = 20;

$maxWidth = 400;
$labels = array();
$numbers = array();
$bars = array();
foreach ($result as $i => $row) {
    // new QR code
    $sql = "select count(1) as cnt from " . $DB . ".visits where q_id=" . (int)$row['id'];
    $visits = query($sql);
    $value = $visits[0]['cnt'];
    $labels[] = '<text x="' . $textStart . '" y="' . (($i * $lineHeight) + $yStart) . '" font-size="12" font-family="Arial" fill="#404040">' . $row['title'] . '</text>';
    $numbers[] = '<text x="' . ($barStart+50) . '" y="' . (($i * $lineHeight) + $yStart) . '" font-size="12" font-family="Arial" fill="#000000">' . $value . '</text>';
    $bars[] = '<rect x="' . $barStart . '" y="' . (($i * $lineHeight) + $yStartBar) . '" width="' . $value . '" height="20" rx="3" ry="3" fill="#2A7BB4" />';
    $maxWidth = max(200 + $value, $maxWidth);
}
$height = $i * $lineHeight + 50;


$svg = '
<svg id="statSvg" xmlns="http://www.w3.org/2000/svg" width="' . $maxWidth . '" height="' . $height . '">
    <line x1="151" y1="10" x2="151" y2="' . ($height) . '" stroke-width="2" stroke="#808080" />';
foreach ($labels as $label) {
    $svg .= "\n" . $label . "\n";
}
foreach ($bars as $bar) {
    $svg .= "\n" . $bar . "\n";
}
foreach ($numbers as $number) {
    $svg .= "\n" . $number . "\n";
}
$svg .= '</svg>';
header('Content-type: image/svg+xml');
echo $svg;