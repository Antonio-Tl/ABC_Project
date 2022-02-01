<html lang="de">
<head>
    <title>URL Abfrage</title>
</head>
<body>

<form action="formularAction.php" method="POST">
    <ul>
        <li>
            <label for="f1">Titel:</label>
            <input type="text" id="f1" name="title">
        </li>
        <li>
            <label for="f2">URL:</label>
            <input type="text" id="f2" name="url">
        </li>
    </ul>

    <button type="submit">Send your message</button>
</form>
<form action="deleteaction.php" method="POST">
    <button type="submit">Alles Löschen</button>
</form>


</body>
</html>
