<?php
session_start();
session_unset($_SESSION['nombreusuario']);
session_unset($_SESSION['email']);
session_unset($_SESSION['loggedin']);
session_destroy();

header('location: ../index.php');
?>