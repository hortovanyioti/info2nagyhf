<?php
require('header.php');
?>

<h1 align="center">Change password</h1>
<div style="text-align: center;">

    <?php 
    if(isset($_POST['logout'])){
        
    $tmp=$_SESSION['uitheme'];
    session_unset();
    $_SESSION['uitheme']=$tmp;
    header("location:login.php");
    exit;
    }

    if (isset($_POST['login'], $_POST['pw'], $_POST['new_pw1'], $_POST['new_pw2'])) {

        if($_POST['new_pw1'] === $_POST['new_pw2']){
            $pw = mysqli_real_escape_string($db, hash('sha256', $_POST['pw']));
            $new_pw = mysqli_real_escape_string($db, hash('sha256', $_POST['new_pw1']));

            $query = sprintf("UPDATE user
            SET pw='%s'
            WHERE id='%d'",
            $new_pw,$_SESSION['id']);

            $query = mysqli_query($db, $query);

            echo 'Your password has changed!';
        }
        else{
            echo 'Passwords don\'t mach!';
        }

    }
    ?>

    <form method="post" action="">
        <input type="password" name="pw" placeholder="current password" required autofocus><br>
        <input type="password" name="new_pw1" placeholder="new password" required><br>
        <input type="password" name="new_pw2" placeholder="confirm password" required><br>
        <input class="large-button" type="submit" name="login" value="Save">
        <a class="large-button" href="index.php">Cancel</a>
    </form>

    <form method="post" action="">
        <input class="large-button" type="submit" name="logout" value="Logout">
    </form>

</div>

<?php require('footer.php'); ?>