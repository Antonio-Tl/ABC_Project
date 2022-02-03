<?php
session_start();
if(!$_SESSION['eingeloggt'] == 1){
    header('Location: login.php');
}
$content = <<< EOTM
<div style="width:600px">
<form action="formularAction.php" method="POST">
    <ul>
        <li>
            <h2><label class="col-form-label mt-4" for="f1">Titel:</label></h2>
            <input class="form-control" placeholder="Titel z.B. ABC-Club" type="text" id="f1" name="title" >
        </li>
        <li>
            <h2><label class="col-form-label mt-4" for="f2">URL:</label></h2>
            <input class="form-control" size="50" placeholder="Url z.B. https://abc-club.de/" type="text" id="f2" name="url">
        </li>
    </ul>

    <button type="submit" class="btn btn-info">QR-Code generieren</button>
</form>
</div>
EOTM;
$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Neuen QR-Code eintragen', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;