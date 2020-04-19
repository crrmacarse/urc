<!DOCTYPE html>
<html>
<?php
require_once('./include/header.php');
if(isset($_SESSION['loggedin'])) {
  header("location: ./index.php");  
}
?>
<link rel="stylesheet" type="text/css" href="../css/auth.css">
<body>
<?php
  require_once('./include/navbar.php');
  require_once('./pages/login.html');
  require_once('./include/footer.html');
?>
</body>
</html>