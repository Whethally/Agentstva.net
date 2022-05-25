<?php
include("datebase.php");

$id = $_GET['id'];

mysqli_query($db, "DELETE FROM `items` WHERE `items`.`id_item` = '$id'");
echo "<script> location.href = 'profile.php' </script>";
