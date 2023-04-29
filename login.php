<?php
require('header.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   header("location: account.php");
   exit;
}

if (isset($_POST['register'])){
   $new_user=mysqli_real_escape_string($db,$_POST['username']);
   $query="SELECT name FROM user WHERE name='$new_user';";
   $query=mysqli_query($db,$query) or die(mysqli_error($db));

   if(mysqli_num_rows($query)!=0){
      echo '<p> Username already taken! </p>';
   }
   else{
      $pw=mysqli_real_escape_string($db,hash('sha256',$_POST['pw']));

      $query=sprintf("INSERT INTO user (name,pw,uitheme) 
      VALUES ('%s','%s','%s')",
      $new_user, $pw, $_SESSION['uitheme']);

      mysqli_query($db, $query) or die(mysqli_error($db));
      $_POST['login'] = true;
   }
}
?>

<h1 align="center">LOGIN</h1>
<div style="text-align: center;">

   <?php 
   if (isset($_POST['login'], $_POST['username'], $_POST['pw'])) {

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $pw = mysqli_real_escape_string($db, hash('sha256', $_POST['pw']));

      $query = sprintf("SELECT id, name, pw, uitheme FROM user WHERE user.name='%s' AND user.pw='%s'", $username, $pw);
      $query = mysqli_query($db, $query);

      if (mysqli_num_rows($query) == 1) {
         $row = mysqli_fetch_array($query);

         $_SESSION['timeout'] = time();
         $_SESSION['id'] = $row['id'];
         $_SESSION['username'] = $username;
         $_SESSION['uitheme'] = $row['uitheme'];
         $_SESSION['loggedin'] = true;
         header("location:index.php");
         exit;
      } else {
         echo '<p> Wrong username or password! </p>';
      }
   }
   ?>

   <form method="post" action="">
      <input type="text" name="username" placeholder="username" required autofocus><br>
      <input type="password" name="pw" placeholder="password" required><br>
      <button class="large-button" type="submit" name="login">Login</button>
      <button class="large-button" type="submit" name="register">Register</button>
   </form>

</div>

<?php require('footer.php'); ?>