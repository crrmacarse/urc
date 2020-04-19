<?php 
session_start();
if(!isset($_SESSION['loggedin'])){
  header("location: ./index.php");

  exit();
}

?>
<!DOCTYPE html>
<html>
<?php require_once('./include/header.php') ?>
<body>
<?php
  require_once('./include/user-navbar.html');
  require_once('./pages/user-home.html');
  require_once('./include/footer.html');
?>
</body>
</html>