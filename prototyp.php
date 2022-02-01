<?php

require_once('php-qrcode-master/lib/full/qrlib.php');

// SVG file format support

if(isset($_GET['id'])){
    $db= unserialize(file_get_contents('database.php'));
    $db[$_GET['id']]['count']++;
    file_put_contents('database.php', serialize($db));
    header('Location: '.$db[$_GET['id']]['url']);
    die();
}

$db= unserialize(file_get_contents('database.php'));
if(isset($_POST['url'])){
    $db[]=array('url'=>$_POST['url']);
    file_put_contents('database.php', serialize($db));
}

foreach($db as $id => $arr){
    $url = 'http://localhost/prototyp.php/?id='.$id;
    echo 'ID: '.$id.': '. $arr['count'].'x '.$arr['url']."<br>";
    $svgCode = QRcode::svg($url);
    file_put_contents('qr-'.$id.'.svg', $svgCode);
    echo '<img src="qr-'.$id.'.svg"><hr>';
}

?>
<form method="POST">
    URL: <input name="url"><br>
    <button>Eintragen</button>
</form>
