<?php
include("datebase.php");

$id = $_GET['id'];

mysqli_query($db, "DELETE FROM `users` WHERE `users`.`id_User` = '$id'");
echo "<script> location.href = 'admin.php' </script>";
