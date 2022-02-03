<?php
session_start();
if(!$_SESSION['eingeloggt'] == 1){
    header('Location: login.php');
}
require_once 'database.php';
require_once 'php-qrcode-master/lib/full/qrlib.php';
require 'config.php';

$content =
    '    
       <table class="table table-hover">
        <tr class="table-info">
            <th scope="row">Titel</th>
            <th scope="row">Url</th>
            <th scope="row">Angelegt am</th>
            <th scope="row">Link auf SVG</th>
            <th scope="row">Views</th>
        </tr>';


$sql = 'select * from '.$DB.'.qrcodes';
$QRCodes = query($sql);

foreach($QRCodes as $code){
    $path = 'images/';
    $file1 = $path.$code['id']."-".preg_replace('/[\x00-\x1F\x7F]/', '', $code['title']).".svg";
    $url='http://'.$SERVERIP.'/?id='.$code['id'];
    $svgCode = QRcode::svg($url, false, $file1, 3, 1080, false, 0);

    $text1 = $code['url'];
    $sql = 'SELECT count(1) as summe FROM '.$DB.'.visits WHERE q_id = '.$code['id'];
    $counter = query($sql);


    $content .= '<tr>';
    $content .= '<td >';
    $content .=  $code['title'];
    $content .= '</td>';

    $content .= '<td>';
    $content .=  $code['url'];
    $content .= '</td>';

    $content .= '<td>';
    $content .=  $code['created_at'];
    $content .= '</td>';

    $content .= '<td>';
    $content .= '<button onclick="showmd('.$code['id'].')" type="button" class="btn btn-secondary">QR Code</button>';
    $content .= '</td>';

    $content .= '<td>';
    $content .=  '<center><a href="details.php?id='.$code['id'].'">'.$counter[0]['summe'].'x</a></center>';
    $content .= '</td>';
    $content .= '</tr>';

    $content .= '<div id="md'.$code['id'].'" class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">QR Code</h5>
                    <button onclick="hide('.$code['id'].')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">'
                    .'<h3><center>'.$code['title'].'</center></h3>'
                    .'<img width="100%" src="'.$file1.'">'.

                '</div>
            </div>
        </div>
    </div>
    ';
}

$content .= '</table>';
$content .= '<img src="chart.php">';
$content .= '    <script>
    
    function showmd(id){
        // Get the modal
        var modal = document.getElementById("md"+id);
            modal.style.display = "block";
    }
        function hide(id){
        // Get the modal
        var modal = document.getElementById("md"+id);
            modal.style.display = "none";
    }
    </script>';
$content .= '<button onclick="window.location.href=\'formular.php\'"  class="btn btn-info">QR-Code eintragen</button>';


$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Liste aller QR-Codes', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;
