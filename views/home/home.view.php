<?php
  session_start();
  if (!isset($_SESSION['success'])){
    header("Location: /user-signin");
    exit;
  }
  print_r($_SESSION['user'][0]);
?>
