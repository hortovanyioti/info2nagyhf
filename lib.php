<?php

function openDB() {
    $db = mysqli_connect("localhost", "root", "","tanks") or die("Database connection failure: " . mysqli_error($db));
    mysqli_query ($db, "set character_set_results='utf8'");
    mysqli_query ($db, "set character_set_client='utf8'");
    return $db;   
}

function closeDB($db) {
    mysqli_close($db);
}

?>