<?php
require('header.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   header("location: account.php");
   exit;
}

if (isset($_POST['register'])){
   $new_user=mysqli_real_escape_string($db,$_POST['username']);
   $query="SELECT username FROM user WHERE username='$new_user';";
   $query=mysqli_query($db,$query) or die(mysqli_error($db));

   if(mysqli_num_rows($query)!=0){
      echo 'Username already taken!';
   }
   else{
      //insert into db
   }
}
?>

<h1 align="center">LOGIN</h1>
<div style="text-align: center;">

   <?php if (
      isset($_POST['login'], $_POST['username'], $_POST['pw'])
   ) {
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $pw = mysqli_real_escape_string($db, hash('sha256', $_POST['pw']));

      $query = sprintf("SELECT id, name, pw, uitheme FROM user WHERE user.name='%s' AND user.pw='%s'", $username, $pw);
      $query = mysqli_query($db, $query);

      if (mysqli_num_rows($query) == 1) {
         $_SESSION['timeout'] = time();
         $_SESSION['id'] = mysqli_fetch_array($query)['id'];
         $_SESSION['username'] = $username;
         $_SESSION['uitheme'] = mysqli_fetch_array($query)['uitheme'];
         $_SESSION['loggedin'] = true;
         header("location:index.php");
         exit;
      } else {
         echo 'Wrong username or password';
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