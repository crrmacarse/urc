<?php
require_once('./include/header.php');
session_destroy();
header("location: ./login.php");  
?>