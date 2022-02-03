<?php
session_start();

$name = $_POST['name'];
$pass = $_POST['pass'];

if ($name == 'admin' && $pass == '12345') {
    $_SESSION['eingeloggt'] = 1;
    header('Location: list.php');
}else {
    $_SESSION['eingeloggt'] = 0;
    echo "alert('Password oder Name ist Falsch!')";
}
