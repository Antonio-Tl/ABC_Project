<?php
$db = new mysqli('localhost', 'root', '', 'adressbuch');

if ($db->connect_errno) {
    die('Sorry - gerade gibt es ein Problem');
}
?>