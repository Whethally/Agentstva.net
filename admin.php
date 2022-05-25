<?php
session_start();
include("datebase.php");

if (!$_SESSION['id_admin']) {
    header('Location: admin-login.php');
}
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
                    $getLogin = 'SELECT * FROM `admin` WHERE `id_admin` = ' . $_SESSION['id_admin'];
                    $res = mysqli_query($db, $getLogin);
                    if ($res) {
                        $row = mysqli_fetch_assoc($res);
                        echo $_SESSION['id_admin'];
                    }
    ?>
    <main class="main">
        <section class="section panel container" id="panel">
            <div class="welcome">
                <h2 class="section__title">
                    Admin Panel
                </h2>
                <form action="logout-admin.php" method="post">
                    <input class="panel__login" type="submit" value="Выйти">
                </form>
            </div>

        </section>
        <section class="container">
            <div class="account">
                <div class="account-content">
                    <div class="input-container-profile">
                        <div class="input-item">
                            <h1>Посты</h1>
                        </div>
                        <div class="input-item">
                            <div class="category__container container grid">
                                <?php
$sql = "SELECT * FROM items";

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
                                            href="update-admin.php?id=<?=$item['id_item']?>">Изменить</a>
                                        <a id="post_delete" class="button"
                                            href="delete-admin.php?id=<?=$item['id_item']?>">Удалить</a>
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
                <div class="account-content">
                    <div class="input-container-profile">
                        <div class="input-item">
                            <h1>Пользователи</h1>
                        </div>
                        <div class="input-item">
                            <div class="category__container container grid">
                                <?php
$sql = "SELECT * FROM users";

$res = mysqli_query($db, $sql);
if (mysqli_num_rows($res) > 0) {
    foreach ($res as $item) { ?>
                                <div class="category__data">
                                    <p class="category__description">
                                        <?=$item['id_User'] ?>
                                    </p>
                                    <h3 class="category__title"><?=$item['first_Name'] ?>
                                    </h3>
                                    <p class="category__description">
                                        <?=$item['middle_Name'] ?>
                                    </p>
                                    <p class="category__description">
                                        <?=$item['last_Name'] ?>
                                    </p>
                                    <p class="category__description">
                                        <?=$item['email']; ?>
                                    </p>
                                    <div class="addInfo">
                                        <a id="user_edit" class="button"
                                            href="admin-update-user.php?id=<?=$item['id_User']?>">Изменить</a>
                                        <a id="user_delete" class="button"
                                            href="admin-delete-user.php?id=<?=$item['id_User']?>">Удалить</a>
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
                                        <p class="title">Добавить администратора</p>
                                    </div>
                                    <div class="account-group">
                                        <input type="button" class="button" id="user_add" value="Добавить">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-content">
                    <div class="input-container-profile">
                        <div class="input-item">
                            <h1>Главная страница</h1>
                        </div>
                        <div class="input-item">
                            <div class="category__container container grid">
                                <?php
$sql = "SELECT * FROM `index`";

$res = mysqli_query($db, $sql);
if (mysqli_num_rows($res) > 0) {
    foreach ($res as $item) { ?>
                                <div class="category__data">
                                    <h3 class="category__title"><?=$item['index_name'] ?>
                                    </h3>
                                    <div class="addInfo">
                                        <a id="user_edit" class="button"
                                            href="update_index-admin.php?id=<?=$item['id_User']?>">Изменить</a>
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
                                        <p class="title">Добавить администратора</p>
                                    </div>
                                    <div class="account-group">
                                        <input type="button" class="button" id="user_add" value="Добавить">
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <?php
    if (isset($_POST['addPost'])) {
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

        if ($tmp and $name and $price and $description and $area and $floor and $year and $bedrooms and $height and $city and $material and $balcony and $street) {
            $image = $_FILES['imagePost']['name'];
            $image = "assets/img/" . $image;
            $id_admin = $_SESSION['id_admin'];

            $sql = "INSERT INTO `items`
            (`id_item`, `image`, `name`, `city`, `price`, `description`, `street`, `material`, `balcony`, `area`, `floor`, `year`, `bedrooms`, `height`, `id_User`)
            VALUES (NULL, '$image', '$name', '$city', '$price', '$description', '$street', '$material', '$balcony', '$area', '$floor', '$year', '$bedrooms', '$height', 1)";

            $result = mysqli_query($db, $sql);

            if ($result) {
                move_uploaded_file($tmp, $image);
                echo "<script> location.href = 'admin.php' </script>";
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

    <?php
    if (isset($_POST['addUser'])) {
        $login = empty($_POST['login']) ? false : $_POST['login'];
        $password = empty($_POST['password']) ? false : $_POST['password'];

        if ($login and $password) {
            $sql = "INSERT INTO `admin`
            (`id_admin`, `login`, `password`)
            VALUES (NULL, '$login', '$password')";

            $result = mysqli_query($db, $sql);

            if ($result) {
                echo "<script> location.href = 'admin.php' </script>";
            } else {
                echo "Error";
            }
        }
    }
?>

    <div class="modal modal-users_add">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div id="closemodalUsers" class="icon">
                    <i class="bx bxs-x-circle"></i>
                </div>
                <div class="infos-posts">
                    <div class="input-group">
                        <label for="login">Введите логин</label>
                        <input type="title" id="login" name="login">
                    </div>
                    <div class="input-group">
                        <label for="password">Введите пароль</label>
                        <input type="title" id="password" name="password">
                    </div>
                </div>
                <div class="input-group">
                    <input class="panel__login" type="submit" id="addUser" name="addUser" value="Сохранить">
                </div>
            </form>
        </div>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>