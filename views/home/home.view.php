<?php
  session_start();
  if (!isset($_SESSION['success'])){
    header("Location: /user-signin");
    exit;
  }
?>
<a class='btn btn-primary' href="/user-signout">Sign out</a>
