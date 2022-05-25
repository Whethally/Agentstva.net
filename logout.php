<?php
session_start();
unset($_SESSION["id_User"]);
header("Location:login.php");
?>