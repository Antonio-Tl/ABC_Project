<?php
$content = <<< EOTM
<style>
input {
    size: 10 ! important;
}
</style>
<form action="formularAction.php" method="POST">
    <ul>
        <li>
            <label class="col-form-label mt-4" for="f1">Titel:</label>
            <input class="form-control" placeholder="Titel z.B. ABC-Club" type="text" id="f1" name="title" size="10 !important">
        </li>
        <li>
            <label class="col-form-label mt-4" for="f2">URL:</label>
            <input class="form-control" size="50" placeholder="Url z.B. https://abc-club.de/" type="text" id="f2" name="url">
        </li>
    </ul>

    <button type="submit" class="btn btn-info">Send your message</button>
</form>

EOTM;
$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Neuen QR-Code eintragen', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;