<?php
  session_start();

  session_destroy();

  header('Location: login_registro/demos/style1/login.php');
?>
