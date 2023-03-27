<?php
include('lib.php');
include('header.php');
$db = openDB(); 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("location: index.php");
    exit;
}
?>

<h1 align="center">LOGIN</h1>
<div style="text-align: center;">

   <?php
   if (
      isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])
   ) {
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $pw = mysqli_real_escape_string($db, $_POST['pw']);

      //sql query
      if (
         $username== 'admin' &&
         hash('sha256',$pw) == 'a'//
      ) {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = $_POST['username'];

         echo 'You have entered valid use name and password';
      } else {
         echo 'Wrong username or password';
      }
   }
   ?>

   <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <input type="text" name="username" placeholder="username" required autofocus><br>
      <input type="password" name="pw" placeholder="password" required><br>
      <button class="add-button" type="submit" name="login">Login</button>
   </form>

</div>

<?php
include('footer.php'); ?>