<html lang="de">
<head>
    <title>Formular</title>
</head>
<body>

<form action="formularAction.php" method="POST">
    <ul>
        <li>
            <label for="f1">Fahrer:</label>
            <input type="text" id="f1" name="driver">
        </li>
        <li>
            <label for="f2">Auto:</label>
            <input type="text" id="f2" name="car">
        </li>
        <li>
            <label for="f3">Preis:</label>
            <input type="text" id="f3" name="price">
        </li>
    </ul>

    <button type="submit">Send your message</button>
</form>


</body>
</html>