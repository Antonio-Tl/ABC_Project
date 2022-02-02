<?php
$content = '';

$template = file_get_contents('website.html');
$page = str_replace('###TITLE###', 'Die Praktikanten', $template);
$page = str_replace('###CONTENT###', $content, $page);
echo $page;
