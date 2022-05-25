<?php
session_start();
unset($_SESSION["id_admin"]);
header("Location:admin-login.php");
?>