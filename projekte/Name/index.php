<?php
session_start();
if(isset($_GET['x'])){
    $_SESSION['FOO']=$_GET['x'];
}

print_r($_SESSION);
?>
<form>
    <input name="x">
</form>
