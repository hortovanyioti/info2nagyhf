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

function ListThemes(){
    $dir_array=scandir('css/uitheme');

    for($i=2;$i<count($dir_array);$i++){    //az első két elem valótlan
        $dir_array[$i]=substr($dir_array[$i],0,strlen($dir_array[$i])-4);   //.css nélkül

        echo '<option value="'.$dir_array[$i].'" ';

        if($dir_array[$i] == $_SESSION['uitheme']) echo ' selected="selected"';
        
        echo '>';
		echo strtoupper($dir_array[$i]);
		echo '</option>';
    }
}
?>