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
        $item_id = $_GET['id'];
        $item = mysqli_query($db, "SELECT * FROM `items` WHERE `id_item` = '$item_id'");
        $item = mysqli_fetch_assoc($item);
?>

            <div class="modal-posts_edit">
                <div class="modal-content">
                    <form action="updatePost-admin.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?=$item['id_item']?>">
                        <a href="admin.php" class="icon">
                            <i class="bx bxs-x-circle"></i>
                        </a>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="image">Выберите картинку</label>
                                <input type="file" name="imagePost" id="imagePost">
                            </div>
                            <div class="input-group">
                                <label for="name">Введите название поста</label>
                                <input type="title" id="name" name="name" value="<?=$item['name']?>">
                            </div>
                            <div class="input-group">
                                <label for="city">Введите название города</label>
                                <input type="title" id="city" name="city" value="<?=$item['city']?>">
                            </div>
                        </div>

                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="price">Введите цену</label>
                                <input type="number" id="price" name="price" value="<?=$item['price']?>">
                            </div>
                            <div class="input-group">
                                <label for="description">Введите описания</label>
                                <input type="title" id="description" name="description"
                                    value="<?=$item['description']?>">
                            </div>
                            <div class="input-group">
                                <label for="street">Введите улицу</label>
                                <input type="title" id="street" name="street" value="<?=$item['street']?>">
                            </div>
                        </div>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="material">Введите материал</label>
                                <input type="title" id="material" name="material" value="<?=$item['material']?>">
                            </div>
                            <div class="input-group">
                                <label for="balcony">Введите есть ли балкон</label>
                                <input type="title" id="balcony" name="balcony" value="<?=$item['balcony']?>">
                            </div>
                            <div class="input-group">
                                <label for="area">Введите область дома</label>
                                <input type="number" id="area" name="area" value="<?=$item['area']?>">
                            </div>
                        </div>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="floor">Введите этаж</label>
                                <input type="number" id="floor" name="floor" value="<?=$item['floor']?>">
                                <label for="max_floor">Введите количество этажей в доме</label>
                                <input type="number" id="max_floor" name="max_floor" value="<?=$item['max_floor']?>">
                            </div>
                            <div class="input-group">
                                <label for="year">Введите год постройки</label>
                                <input type="number" id="year" name="year" value="<?=$item['year']?>">
                            </div>
                            <div class="input-group">
                                <label for="bedrooms">Введите количество комнат</label>
                                <input type="number" id="bedrooms" name="bedrooms" value="<?=$item['bedrooms']?>">
                            </div>
                        </div>
                        <div class="infos-posts">
                            <div class="input-group">
                                <label for="height">Введите высоту потолков</label>
                                <input type="number" id="height" name="height" value="<?=$item['height']?>">
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