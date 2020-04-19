<?php
require_once('./include/header.php');

// Check if usertype is admin
if($_SESSION['usertype'] !== 'admin') {
  header("location: ./index.php");  
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