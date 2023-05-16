<?php
require('header.php');

$query = "SELECT id FROM tank WHERE id='{$_POST['id']}'";
$query = mysqli_query($db,$query);

if(mysqli_num_rows($query)==1){

    $query = "DELETE FROM tankcrew WHERE tankid='{$_POST['id']}'";
    mysqli_query($db,$query);

    $query = "DELETE FROM tank WHERE id='{$_POST['id']}'";
    mysqli_query($db,$query);
    
    $_SESSION['new_delete'] = true;
    header("Location: index.php");
    exit;
}

$_SESSION['new_delete'] = false;

require('footer.php'); 
?>