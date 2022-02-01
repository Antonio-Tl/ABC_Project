<?php

function connect()
{
    require 'config.php';
    global $dbh;

    if (!$dbh) {
        $dbh = mysqli_connect($DBHOST, $DBUSER, $DBPASSWORD);
    }
}


function query($sql)
{
    global $dbh;
    if (!$dbh) {
        connect();
    }

    $result = array();
    $rh = mysqli_query($dbh, $sql);
    while ($result[] = @mysqli_fetch_assoc($rh)) ;
    array_pop($result);

    return $result;
}