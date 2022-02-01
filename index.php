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

$sql = 'select * from abc_project.qrcodes';
$QRCodes = query($sql);

foreach($QRCodes as $code){
    $path = 'images/';
    $file1 = $path.$code['id'].".svg";
    $url='http://192.168.0.4/?id='.$code['id'];
    $svgCode = QRcode::svg($url);

    $text1 = $code['url'];
    $sql = 'SELECT count(1) as summe FROM abc_project.visits WHERE q_id = '.$code['id'];
    $counter = query($sql);

    file_put_contents($file1, $svgCode);

    echo $counter[0]['summe'].'x '.$code['title']."<br>";
    echo "<img src='".$file1."'><br>";

}

?>

<button onclick="window.location.href='formular.php'">QR-Code eintragen</button>
