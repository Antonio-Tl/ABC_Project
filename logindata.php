<?php
session_start();
require 'config.php';

$name = $_POST['name'];
$pass = $_POST['pass'];

if ($name == $config_admin && $pass == $config_pw) {
    $_SESSION['eingeloggt'] = 1;
    header('Location: list.php');
}else {
    $_SESSION['eingeloggt'] = 0;
    echo "alert('Password oder Name ist Falsch!')";
}
