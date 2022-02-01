<?php
require_once 'database.php';
?>
<html lang="de">

<head>
    <style>
        .number {
            text-align: right;
        }
    </style>
    <title>Webseite</title>
</head>
<body>

<table>
    <tr>
        <th>Löschen</th>
        <th>ID</th>
        <th>Name</th>
        <th>Auto</th>
        <th>Preis</th>
    </tr>
    <?php
    $sql = "SELECT * from abc.xyz_1 WHERE deleted_at is NULL";
    $result = query($sql);
    $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###NAME###</td><td>###AUTO###</td><td>###PREIS###</td></tr>';
    foreach ($result as $dataRow) {
        echo str_replace(
            array(
                '###DELETEACTION###',
                '###ID###',
                '###NAME###',
                '###AUTO###',
                '###PREIS###'),
            array(
                    '<A href="ActionDelete.php?id='.$dataRow['id'].'">[X]</A>',
                $dataRow['id'],
                $dataRow['fahrer'],
                $dataRow['auto'],
                $dataRow['preis']
            ),
            $row
        );
    }
    ?>
</table>
<form action="ActionDelete.php" method="POST">
    <input type="hidden" name="all" value="all">
    <button type="submit">Alles Löschen</button>
</form>
<a href="formular.php"> Formular </a> <br>
<A href="https://abcclub.synology.me/xxx/">XXX</A>
</body>
</html>

