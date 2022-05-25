<?php
include("datebase.php");

$id = $_POST['id'];
$login = empty($_POST['login']) ? false : $_POST['login'];
$password = empty($_POST['password']) ? false : $_POST['password'];
$first_Name = empty($_POST['first_Name']) ? false : $_POST['first_Name'];
$middle_Name = empty($_POST['middle_Name']) ? false : $_POST['middle_Name'];
$last_Name = empty($_POST['last_Name']) ? false : $_POST['last_Name'];
$phone = empty($_POST['phone']) ? false : $_POST['phone'];
$email = empty($_POST['email']) ? false : $_POST['email'];
$date_of_birthday = empty($_POST['date_of_birthday']) ? false : $_POST['date_of_birthday'];

if ($login and $password and $first_Name and $middle_Name and $last_Name and $phone and $email and $date_of_birthday) {
    $sql = "UPDATE `users`
    SET
    `login` = '$login',
    `password` = '$password',
    `first_Name` = '$first_Name',
    `middle_Name` = '$middle_Name',
    `last_Name` = '$last_Name',
    `phone` = '$phone',
    `email` = '$email',
    `date_of_birthday` = '$date_of_birthday'
    WHERE `id_User` = '$id'";

    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "<script> location.href = 'admin.php' </script>";
    } else {
        echo "Error";
    }
}
