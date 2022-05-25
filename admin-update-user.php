<?php
session_start();
include("datebase.php");
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
    <title>Агенства.нет</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main class="main">
        <!-- Главная -->
        <section class="home container">
            <?php
        $user_id = $_GET['id'];
        $item = mysqli_query($db, "SELECT * FROM `users` WHERE `id_User` = '$user_id'");
        $item = mysqli_fetch_assoc($item);
?>

            <div class="modal-posts_edit">
                <div class="modal-content">
                    <form action="admin-update-user-save.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id"
                            value="<?=$item['id_User']?>">
                        <a href="admin.php" class="icon">
                            <i class="bx bxs-x-circle"></i>
                        </a>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="login">Логин</label>
                                <input type="title" id="login" name="login"
                                    value="<?=$item['login']?>">
                            </div>
                            <div class="input-group">
                                <label for="password">Пароль</label>
                                <input type="title" id="password" name="password"
                                    value="<?=$item['password']?>">
                            </div>
                        </div>

                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="first_Name">Имя</label>
                                <input type="title" id="first_Name" name="first_Name"
                                    value="<?=$item['first_Name']?>">
                            </div>
                            <div class="input-group">
                                <label for="middle_Name">Отчество</label>
                                <input type="title" id="middle_Name" name="middle_Name"
                                    value="<?=$item['middle_Name']?>">
                            </div>
                            <div class="input-group">
                                <label for="last_Name">Фамилия</label>
                                <input type="title" id="last_Name" name="last_Name"
                                    value="<?=$item['last_Name']?>">
                            </div>
                        </div>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="phone">Телефон</label>
                                <input type="phone" id="phone" name="phone"
                                    value="<?=$item['phone']?>">
                            </div>
                            <div class="input-group">
                                <label for="email">Почта</label>
                                <input type="title" id="email" name="email"
                                    value="<?=$item['email']?>">
                            </div>
                            <div class="input-group">
                                <label for="date_of_birthday">Дата рождения</label>
                                <input type="date" id="date_of_birthday" name="date_of_birthday"
                                    value="<?=$item['date_of_birthday']?>">
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="panel__login" type="submit" id="addPost" name="addPost" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>