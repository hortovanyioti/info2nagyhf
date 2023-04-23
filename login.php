<?php
require('header.php');

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   header("location: index.php");
   exit;
}
?>

<h1 align="center">LOGIN</h1>
<div style="text-align: center;">

   <?php if (
      isset($_POST['login'], $_POST['username'], $_POST['pw'])
   ) {
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $pw = mysqli_real_escape_string($db, hash('sha256', $_POST['pw']));

      $query = sprintf("SELECT name, pw, uitheme FROM user WHERE user.name='%s' AND user.pw='%s'", $username, $pw);
      $query = mysqli_query($db, $query);

      if (mysqli_num_rows($query) == 1) {
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = $username;
         $_SESSION['uitheme'] = mysqli_fetch_array($query)['uitheme'];
         $_SESSION['loggedin'] = true;
         header("location:index.php");
      } else {
         echo 'Wrong username or password';
      }
   }
   ?>

   <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <input type="text" name="username" placeholder="username" required autofocus><br>
      <input type="password" name="pw" placeholder="password" required><br>
      <button class="large-button" type="submit" name="login">Login</button>
   </form>

</div>

<?php require('footer.php'); ?>