<?php 
  session_start();
  unset($_SESSION["user"]);
  session_destroy();
  header("Location: view_login.php");
  exit;
 ?>