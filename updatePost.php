<?php
include("datebase.php");

$id = $_POST['id'];
$tmp = $_FILES['imagePost']['tmp_name'];
$name = empty($_POST['name']) ? false : $_POST['name'];
$price = empty($_POST['price']) ? false : $_POST['price'];
$description = empty($_POST['description']) ? false : $_POST['description'];
$area = empty($_POST['area']) ? false : $_POST['area'];
$floor = empty($_POST['floor']) ? false : $_POST['floor'];
$year = empty($_POST['year']) ? false : $_POST['year'];
$bedrooms = empty($_POST['bedrooms']) ? false : $_POST['bedrooms'];
$height = empty($_POST['height']) ? false : $_POST['height'];
$city = empty($_POST['city']) ? false : $_POST['city'];
$material = empty($_POST['material']) ? false : $_POST['material'];
$balcony = empty($_POST['balcony']) ? false : $_POST['balcony'];
$street = empty($_POST['street']) ? false : $_POST['street'];

if ($name and $price and $description and $area and $floor and $year and $bedrooms and $height and $city and $material and $balcony and $street) {
    $sql = "UPDATE `items`
    SET
    `name` = '$name',
    `city` = '$city',
    `price` = '$price',
    `description` = '$description',
    `street` = '$street',
    `material` = '$material',
    `balcony` = '$balcony',
    `area` = '$area',
    `floor` = '$floor',
    `year` = '$year',
    `bedrooms` = '$bedrooms',
    `height` = '$height'
    WHERE `items`.`id_item` = '$id'";

    $result = mysqli_query($db, $sql);

    if ($result) {
        echo "<script> location.href = 'profile.php' </script>";
    } else {
        echo "Error";
    }
}

if ($tmp) {
    $image = $_FILES['imagePost']['name'];
    $image = "assets/img/" . $image;

    $sql = "UPDATE `items` SET `image`='" . $image . "' WHERE `id_item`=" . $id;
    $result = mysqli_query($db, $sql);

    if ($result) {
        move_uploaded_file($tmp, $image);
    } else {
        echo "Error";
    }
}
