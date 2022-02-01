<?php
require_once 'database.php';


if(isset($_POST['all']) && $_POST['all']=='all'){
    $sql = 'UPDATE abc.xyz_1 set deleted_at=NOW()';
} else {
    $sql = 'UPDATE abc.xyz_1 set deleted_at=NOW() where id='.(int)$_GET['id'];
}
query($sql);
header('Location: index.php');
die();