<?php
include("datebase.php");

$main = empty($_POST['main']) ? false : $_POST['main'];

if ($main) {
    $sql = "UPDATE `index` SET `index_name` = '$main'";

    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "<script> location.href = 'admin.php' </script>";
    } else {
        echo "Error";
    }
}
