<?php
session_start();
include("datebase.php");
?>
<?php

function phone_format($phone)
{
    $phone = trim($phone);
 
    $res = preg_replace(
        array(
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
            '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
            '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
        ),
        array(
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4-$5',
            '+7 ($2) $3-$4',
            '+7 ($2) $3-$4',
        ),
        $phone
    );
 
    return $res;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <title>Агенства.нет Panel</title>
</head>

<body>
    <?php include("header.php"); ?>
    <?php
                    $getLogin = 'SELECT * FROM `users` WHERE `id_User` = ' . $_SESSION['id_User'];
                    $res = mysqli_query($db, $getLogin);
                    if ($res) {
                        $row = mysqli_fetch_assoc($res);
                    }
    ?>
    <main class="main">
        <section class="section panel container" id="panel">
            <div class="welcome">
                <h2 class="section__title">
                    Добро пожаловать,
                    <?=
                $row['login'];
                ?>
                </h2>
            </div>

        </section>
        <section class="container">
            <div class="account">
                <div class="account-content">
                    <div class="input-container-profile">
                        <div class="input-item">
                            <div class="myaccount">
                                <img src="<?=$row['avatar']?>"
                                    alt="" class="square">
                                <h1>Аккаунт</h1>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {// it will only check where form is posted or not
                            
                            if (isset($_POST['first_Name'])) {
                                $first_Name = $_POST['first_Name'];
                                if ($first_Name == '') {
                                    unset($first_Name);
                                }
                            }
                            if (isset($_POST['last_Name'])) {
                                $last_Name = $_POST['last_Name'];
                                if ($last_Name == '') {
                                    unset($last_Name);
                                }
                            }
                            if (isset($_POST['middle_Name'])) {
                                $middle_Name = $_POST['middle_Name'];
                                if ($middle_Name == '') {
                                    unset($middle_Name);
                                }
                            }
                            if (isset($_POST['phone'])) {
                                $phone = $_POST['phone'];
                                if ($phone == '') {
                                    unset($phone);
                                }
                            }
                            if (isset($_POST['email'])) {
                                $email = $_POST['email'];
                                if ($email == '') {
                                    unset($email);
                                }
                            }
                            if (isset($_POST['date_of_birthday'])) {
                                $date_of_birthday = $_POST['date_of_birthday'];
                                if ($date_of_birthday == '') {
                                    unset($date_of_birthday);
                                }
                            }
                            
                            if (isset($_POST['place_of_birth'])) {
                                $place_of_birth = $_POST['place_of_birth'];
                                if ($place_of_birth == '') {
                                    unset($place_of_birth);
                                }
                            }
                            if (isset($_POST['passport'])) {
                                $passport = $_POST['passport'];
                                if ($passport == '') {
                                    unset($passport);
                                }
                            }
                            if (isset($_POST['passport_issued'])) {
                                $passport_issued = $_POST['passport_issued'];
                                if ($passport_issued == '') {
                                    unset($passport_issued);
                                }
                            }
                            if (isset($_POST['passport_date'])) {
                                $passport_date = $_POST['passport_date'];
                                if ($passport_date == '') {
                                    unset($passport_date);
                                }
                            }
                            if (isset($_POST['passport_code'])) {
                                $passport_code = $_POST['passport_code'];
                                if ($passport_code == '') {
                                    unset($passport_code);
                                }
                            }
                            if (isset($_POST['address'])) {
                                $address = $_POST['address'];
                                if ($address == '') {
                                    unset($address);
                                }
                            }
                            // $first_Name = $_POST["first_Name"];
                            // $last_Name = $_POST["last_Name"];
                            // $middle_Name = $_POST["middle_Name"];
                            
                            // $phone = $_POST["phone"];
                            // $email = $_POST["email"];
                            
                            // $date_of_birthday = $_POST["date_of_birthday"];
                            
                            if (empty($first_Name) or empty($middle_Name) or empty($last_Name) or empty($phone) or empty($email) or empty($date_of_birthday)) {
                                echo "<script> location.href = 'login.php' </script>";
                                return;
                            }
                            $first_Name = stripslashes($first_Name);
                            $first_Name = htmlspecialchars($first_Name);
                            
                            $middle_Name = stripslashes($middle_Name);
                            $middle_Name = htmlspecialchars($middle_Name);

                            $last_Name = stripslashes($last_Name);
                            $last_Name = htmlspecialchars($last_Name);

                            $phone = stripslashes($phone);
                            $phone = htmlspecialchars($phone);

                            $email = stripslashes($email);
                            $email = htmlspecialchars($email);

                            $date_of_birthday = stripslashes($date_of_birthday);
                            $date_of_birthday = htmlspecialchars($date_of_birthday);

                            $place_of_birth = stripslashes($place_of_birth);
                            $place_of_birth = htmlspecialchars($place_of_birth);

                            $passport = stripslashes($passport);
                            $passport = htmlspecialchars($passport);

                            $passport_issued = stripslashes($passport_issued);
                            $passport_issued = htmlspecialchars($passport_issued);

                            $passport_date = stripslashes($passport_date);
                            $passport_date = htmlspecialchars($passport_date);

                            $passport_code = stripslashes($passport_code);
                            $passport_code = htmlspecialchars($passport_code);

                            $address = stripslashes($address);
                            $address = htmlspecialchars($address);

                            $sql = "UPDATE users
                            SET `first_Name` = '$first_Name', `middle_Name` = '$middle_Name', `last_Name` = '$last_Name', `phone` = '$phone', `email` = '$email', `date_of_birthday` = '$date_of_birthday', `place_of_birth` = '$place_of_birth', `passport` = '$passport', `passport_issued` = '$passport_issued', `passport_date` = '$passport_date', `passport_code` = '$passport_code', `address` = '$address'
                            WHERE `id_User` = " . $_SESSION['id_User'];
                            $result = mysqli_query($db, $sql);
                            if ($result == true) {
                                echo "<script> location.href = 'profile.php' </script>";
                            } else {
                                echo "bad!";
                            }
                        } else {
                            ?>
                        <form method="post">
                            <div class="input-item">
                                <div class="infos">
                                    <div class="input-group">
                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-user'></i>
                                            </div>
                                            <p class="title">Имя</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="first_Name" class="subtitle"
                                                value="<?=$row['first_Name']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-user'></i>
                                            </div>
                                            <p class="title">Фамилия</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="last_Name" class="subtitle"
                                                value="<?=$row['last_Name']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-user'></i>
                                            </div>
                                            <p class="title">Отчество</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="middle_Name" class="subtitle"
                                                value="<?=$row['middle_Name']?>">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-phone'></i>
                                            </div>
                                            <p class="title">Телефон</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="phone" class="subtitle"
                                                value="<?=phone_format($row['phone'])?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-envelope'></i>
                                            </div>
                                            <p class="title">E-mail</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="email" class="subtitle"
                                                value="<?=$row['email']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-calendar'></i>
                                            </div>
                                            <p class="title">Дата рождения</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="date" name="date_of_birthday" class="subtitle"
                                                value="<?=$row['date_of_birthday']?>">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-item">
                                <div class="infos">
                                    <div class="input-group">
                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-user'></i>
                                            </div>
                                            <p class="title">Место рождения</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="place_of_birth" class="subtitle"
                                                value="<?=$row['place_of_birth']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-user'></i>
                                            </div>
                                            <p class="title">Адрес</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="address" class="subtitle"
                                                value="<?=$row['address']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-phone'></i>
                                            </div>
                                            <p class="title">Паспорт</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="passport" class="subtitle"
                                                value="<?=$row['passport']?>">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="infos">
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-envelope'></i>
                                            </div>
                                            <p class="title">Выдан</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="passport_issued" class="subtitle"
                                                value="<?=$row['passport_issued']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-calendar'></i>
                                            </div>
                                            <p class="title">Дата выдачи</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="date" name="passport_date" class="subtitle"
                                                value="<?=$row['passport_date']?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="input-group">

                                        <div class="account-text">
                                            <div class="icon">
                                                <i class='bx bxs-calendar'></i>
                                            </div>
                                            <p class="title">Код поразделения</p>
                                        </div>
                                        <div class="account-group">
                                            <input type="text" name="passport_code" class="subtitle"
                                                value="<?=$row['passport_code']?>">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="panel__login" type="submit" id="submit" name="submit" value="Сохранить">
                        </form>
                        <?php
                        }?>
                    </div>

                </div>
                <div class="account-content">
                    <div class="input-container-profile">
                        <div class="input-item">
                            <h1>Настройки</h1>
                        </div>
                        <div class="input-item">
                            <div class="infos">
                                <div class="input-group">
                                    <div class="account-text">
                                        <div class="icon">
                                            <i class='bx bxs-edit'></i>
                                        </div>
                                        <p class="title">Изменить пароль</p>
                                    </div>
                                    <div class="account-group">
                                        <input type="button" class="button" id="password_edit" value="Изменить">
                                        </input>
                                    </div>
                                </div>
                            </div>
                            <div class="infos">
                                <div class="input-group">
                                    <div class="account-text">
                                        <div class="icon">
                                            <i class='bx bxs-edit'></i>
                                        </div>
                                        <p class="title">Изменить аватар</p>
                                    </div>
                                    <div class="account-group">
                                        <input type="button" class="button" id="editAvatar" value="Изменить">
                                        </input>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <form action="logout.php" method="post">
                            <input class="panel__login" type="submit" value="Выйти">
                        </form>
                    </div>
                </div>
                <div class="account-content">
                    <div class="input-container-profile">
                        <div class="input-item">
                            <h1>Посты</h1>
                        </div>
                        <div class="input-item">
                            <div class="category__container container grid">
                                <?php
$sql = "SELECT * FROM items WHERE id_User = " . $_SESSION['id_User'];

$res = mysqli_query($db, $sql);
if (mysqli_num_rows($res) > 0) {
    foreach ($res as $item) { ?>
                                <div class="category__data">
                                    <img src="<?=$item['image'] ?>"
                                        alt="" class="category__img" />
                                    <h3 class="category__title"><?=$item['name'] ?>
                                    </h3>
                                    <p class="category__description">
                                        <i class="bx bxs-home"></i><?=$item['city'] ?>
                                    </p>
                                    <p class="category__description">
                                        <i class="bx bxs-door-open"></i><?=$item['bedrooms'] ?>
                                    </p>
                                    <p class="category__description">
                                        <i class="bx bx-ruble"></i><?=number_format($item['price']); ?>
                                    </p>
                                    <div class="addInfo">
                                        <a id="post_edit" class="button"
                                            href="update.php?id=<?=$item['id_item']?>">Изменить</a>
                                        <a id="post_delete" class="button"
                                            href="delete.php?id=<?=$item['id_item']?>">Удалить</a>
                                    </div>
                                </div>
                                <?php
    }
} else {
    echo "<i class='bx bx-sad' style='text-align: center;'></i>";
    echo "<i class='bx bx-sad' style='text-align: center;'></i>";
}
?>
                            </div>
                        </div>
                        <div class="input-item">
                            <div class="infos">
                                <div class="input-group">
                                    <div class="account-text">
                                        <div class="icon">
                                            <i class='bx bxs-edit'></i>
                                        </div>
                                        <p class="title">Добавить посты</p>
                                    </div>
                                    <div class="account-group">
                                        <input type="button" class="button" id="post_add" value="Добавить">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            if (isset($_POST['editPassword'])) {
                $current_password = $_POST['current_password'];
                $res_current_password = password_verify($current_password, $row['password']);
                $new_password = $_POST['new_password'];
                if ($res_current_password) {
                    $sql = "UPDATE `users` SET `password` = '". password_hash($new_password, PASSWORD_BCRYPT) ."' WHERE `id_User`='" . $_SESSION["id_User"] . "'";

                    $edit = mysqli_query($db, $sql);
                    exit('<p>Данные успешно сохранены</p>');
                } else {
                    echo("<p>Неверный пароль</p>");
                }
            } {
                ?>
            </div>
        </section>
    </main>
    <div class="modal modal-edit">
        <div class="modal-content">
            <form method="POST">
                <div id="closemodal" class="icon">
                    <i class="bx bxs-x-circle"></i>
                </div>

                <div class="input-group">
                    <label for="current_password">Введите старый пароль</label>
                    <input type="password" name="current_password" id="current_password">
                </div>
                <div class="input-group">
                    <label for="new_password">Введите новый пароль</label>
                    <input type="password" name="new_password" id="new_password">
                </div>
                <div class="input-group">
                    <input class="panel__login" type="submit" id="editPassword" name="editPassword" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
    <?php
            }?>
    <?php
    if (isset($_POST['editAvatar'])) {
        $tmp = $_FILES['image']['tmp_name'];

        if ($tmp) {
            $image = $_FILES['image']['name'];
            $image = "assets/img/" . $image;

            // $sql = "UPDATE `users` SET `avatar`='" . $image . "' WHERE `id_User`=" . $row['id_User'];
            $sql = "UPDATE `users` SET `avatar` = '" . $image . "' WHERE `id_User` = " . $row['id_User'];
            $result = mysqli_query($db, $sql);

            if ($result) {
                move_uploaded_file($tmp, $image);
                echo "<script> location.href = 'profile.php' </script>";
            } else {
                echo "Error";
            }
        }
    }

?>
    <div class="modal modal-edit_Avatar">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div id="closemodalAvatar" class="icon">
                    <i class="bx bxs-x-circle"></i>
                </div>

                <div class="input-group">
                    <label for="image">Выберите картинку</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="input-group">
                    <input class="panel__login" type="submit" id="editAvatar" name="editAvatar" value="Сохранить">
                    <!-- <button type="submit">Добавить пост</button> -->
                </div>
            </form>
        </div>
    </div>
    <!-- SELECT citys.city, materials.material_name, balcony.balocny_boolean, streets.street_name FROM `citys`, `materials`, `balcony`, `streets` WHERE; -->
    <?php
    if (isset($_POST['addPost'])) {
        $tmp = $_FILES['imagePost']['tmp_name'];
        $name = empty($_POST['name']) ? false : $_POST['name'];
        $price = empty($_POST['price']) ? false : $_POST['price'];
        $description = empty($_POST['description']) ? false : $_POST['description'];
        $area = empty($_POST['area']) ? false : $_POST['area'];
        $floor = empty($_POST['floor']) ? false : $_POST['floor'];
        $max_floor = empty($_POST['max_floor']) ? false : $_POST['max_floor'];
        $year = empty($_POST['year']) ? false : $_POST['year'];
        $bedrooms = empty($_POST['bedrooms']) ? false : $_POST['bedrooms'];
        $height = empty($_POST['height']) ? false : $_POST['height'];
        $city = empty($_POST['city']) ? false : $_POST['city'];
        $material = empty($_POST['material']) ? false : $_POST['material'];
        $balcony = empty($_POST['balcony']) ? false : $_POST['balcony'];
        $street = empty($_POST['street']) ? false : $_POST['street'];

        if ($tmp and $name and $price and $description and $area and $floor and $max_floor and $year and $bedrooms and $height and $city and $material and $balcony and $street) {
            $image = $_FILES['imagePost']['name'];
            $image = "assets/img/" . $image;
            $id_User = $_SESSION['id_User'];

            $sql = "INSERT INTO `items`
            (`id_item`, `image`, `name`, `city`, `price`, `description`, `street`, `material`, `balcony`, `area`, `floor`, `max_floor`, `year`, `bedrooms`, `height`, `id_User`)
            VALUES (NULL, '$image', '$name', '$city', '$price', '$description', '$street', '$material', '$balcony', '$area', '$floor', `max_floor`, '$year', '$bedrooms', '$height', '$id_User')";

            $result = mysqli_query($db, $sql);

            if ($result) {
                move_uploaded_file($tmp, $image);
                exit('<p>Вы успешно добавили пост на сайт</p>');
            } else {
                echo "Error";
            }
        }
    }
?>

    <div class="modal modal-posts_add">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div id="closemodalPosts" class="icon">
                    <i class="bx bxs-x-circle"></i>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="image">Выберите картинку</label>
                        <input type="file" name="imagePost" id="imagePost">
                    </div>
                    <div class="input-group">
                        <label for="name">Введите название поста</label>
                        <input type="title" id="name" name="name">
                    </div>
                    <div class="input-group">
                        <label for="city">Введите название города</label>
                        <input type="title" id="city" name="city">
                    </div>
                </div>

                <div class="infos-posts">
                    <div class="input-group">
                        <label for="price">Введите цену</label>
                        <input type="number" id="price" name="price">
                    </div>
                    <div class="input-group">
                        <label for="description">Введите описания</label>
                        <input type="title" id="description" name="description">
                    </div>
                    <div class="input-group">
                        <label for="street">Введите улицу</label>
                        <input type="title" id="street" name="street">
                    </div>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="material">Введите материал</label>
                        <input type="title" id="material" name="material">
                    </div>
                    <div class="input-group">
                        <label for="balcony">Введите есть ли балкон</label>
                        <input type="title" id="balcony" name="balcony">
                    </div>
                    <div class="input-group">
                        <label for="area">Введите область дома</label>
                        <input type="number" id="area" name="area">
                    </div>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="floor">Введите этаж</label>
                        <input type="number" id="floor" name="floor">
                        <label for="max_floor">Введите количество этажей в доме</label>
                        <input type="number" id="max_floor" name="max_floor">
                    </div>
                    <div class="input-group">
                        <label for="year">Введите год постройки</label>
                        <input type="number" id="year" name="year">
                    </div>
                    <div class="input-group">
                        <label for="bedrooms">Введите количество комнат</label>
                        <input type="number" id="bedrooms" name="bedrooms">
                    </div>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="height">Введите высоту потолков</label>
                        <input type="number" id="height" name="height">
                    </div>
                </div>
                <div class="input-group">
                    <input class="panel__login" type="submit" id="addPost" name="addPost" value="Сохранить">
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['editPost'])) {
        $item_id = $_POST['id'];
        $item = mysqli_query($db, "SELECT * FROM `items` WHERE id_item = '$item_id'");
        $item = mysqli_fetch_assoc($item);
        print_r($item);
    }
?>

    <div class="modal modal-posts_edit">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div id="closemodalPostsEdit" class="icon">
                    <i class="bx bxs-x-circle"></i>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="image">Выберите картинку</label>
                        <input type="file" name="imagePost" id="imagePost">
                    </div>
                    <div class="input-group">
                        <label for="name">Введите название поста</label>
                        <input type="title" id="name" name="name">
                    </div>
                    <div class="input-group">
                        <label for="city">Введите название города</label>
                        <input type="title" id="city" name="city">
                    </div>
                </div>

                <div class="infos-posts">
                    <div class="input-group">
                        <label for="price">Введите цену</label>
                        <input type="number" id="price" name="price">
                    </div>
                    <div class="input-group">
                        <label for="description">Введите описания</label>
                        <input type="title" id="description" name="description">
                    </div>
                    <div class="input-group">
                        <label for="street">Введите улицу</label>
                        <input type="title" id="street" name="street">
                    </div>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="material">Введите материал</label>
                        <input type="title" id="material" name="material">
                    </div>
                    <div class="input-group">
                        <label for="balcony">Введите есть ли балкон</label>
                        <input type="title" id="balcony" name="balcony">
                    </div>
                    <div class="input-group">
                        <label for="area">Введите область дома</label>
                        <input type="number" id="area" name="area">
                    </div>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="floor">Введите этаж</label>
                        <input type="number" id="floor" name="floor">
                    </div>
                    <div class="input-group">
                        <label for="year">Введите год постройки</label>
                        <input type="number" id="year" name="year">
                    </div>
                    <div class="input-group">
                        <label for="bedrooms">Введите количество комнат</label>
                        <input type="number" id="bedrooms" name="bedrooms">
                    </div>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="height">Введите высоту потолков</label>
                        <input type="number" id="height" name="height">
                    </div>
                </div>
                <div class="input-group">
                    <input class="panel__login" type="submit" id="addPost" name="addPost" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>