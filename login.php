<?php
session_start();
if(isset($_GET['logout'])){
    session_destroy();
    session_start();
}
$content = '<center>
<div style="width:600px">
    <form action="logindata.php" method="POST">
            <h2><label class="col-form-label mt-4" for="f1">Username:</label></h2>
            <input class="form-control" type="text" id="f1" name="name">
       
            <h2><label class="col-form-label mt-4" for="f2">Password:</label></h2>
            <input class="form-control" size="50" type="text" id="f2"name="pass"></br>
            
            <button type="submit" class="btn btn-info">Einloggen</button>
    </form>
</div> </center>';


$template = file_get_contents('website2.html');
$page = str_replace('###TITLE###', 'Login', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;

//Login
//Logout unset $_SESSION['user'];
?>
