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
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Агенства.нет</title>
</head>

<body>
    <?php include('header.php'); ?>


    <main class="main">
        <!-- Каталог/Категория -->
        <!-- <section class="section house">
            <h1 class="section__title">Дом</h1>
            <div class="house__data container">
                <img src="assets/img/2.jpg" alt="" class="house__img" />
                <div class="house__container">
                    <h2 class="house__title">Характеристка</h2>
                    <p class="house__description">
                        Общая:
                    <h2 class="house__subdescription">
                        39.5м<sup>2</sup>
                    </h2>
                    </p>
                    <p class="house__description">Жилая
                    <h2 class="house__subdescription">
                        25.1м<sup>2</sup>
                    </h2>
                    </p>
                    <p class="house__description">Кухня
                    <h2 class="house__subdescription">
                        6м<sup>2</sup>
                    </h2>
                    </p>
                    <p class="house__description">Этаж
                    <h2 class="house__subdescription">
                        10 из 32
                    </h2>
                    </p>
                    <p class="house__description">Срок сдачи
                    <h2 class="house__subdescription">
                        1 кв. 2023
                    </h2>
                    </p>
                </div>
            </div>
        </section> -->
        <section class="section category" id="category">
            <h2 class="section__title">
                Информация
            </h2>
            <div class="category__container container grid">
                <?php
                if (isset($_POST['add'])) {
                    /// print_r($_POST['product_id']);
                    if (isset($_SESSION['cart'])) {
                        $item_array_id = array_column($_SESSION['cart'], "id_item");
                
                        if (in_array($_POST['id_item'], $item_array_id)) {
                            // echo "<script>alert('Вы уже добавили этот товар в корзину!')</script>";
                        } else {
                            $count = count($_SESSION['cart']);
                            $item_array = array(
                                'id_item' => $_POST['id_item']
                            );
                
                            $_SESSION['cart'][$count] = $item_array;
                        }
                    } else {
                        $item_array = array(
                                'id_item' => $_POST['id_item']
                        );
                
                        // Create new session variable
                        $_SESSION['cart'][0] = $item_array;
                    }
                }

$id = $_GET['id'];
$sql = "SELECT * FROM `items` WHERE `id_item` = '$id';
";

$res = mysqli_query($db, $sql);
if (empty($res)) {
    echo("<p>Каталог пуст.</p>");
} else {
    foreach ($res as $item) { ?>
                <div class="category__data">
                    <div class="input-item_house">
                        <div class="house-group">
                            <div class="input-group-house">
                                <div class="house-text">
                                    <div class="icon">
                                        <i class='bx bxs-edit'></i>
                                    </div>
                                    <p class="title"><?=$item['name'] ?>
                                    <p class="title">|</p>
                                    <p class="title"><?=number_format($item['price']); ?>
                                        Р
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <img src="<?=$item['image'] ?>"
                                    alt="" class="house__img" />

                            </div>
                            <form action="" method="post">
                                <div class="input-group-house">
                                    <button type="submit" name="add" class="button ">
                                        <i class='bx bxs-cart-add'></i> Добавить в корзину
                                    </button>
                                </div>
                                <input type="hidden" name="id_item"
                                    value="<?=$item['id_item']?>">
                                </input>
                            </form>

                            <div class="input-group-house">
                                <div class="house-text desc-h">
                                    <h1>Описание</h1>
                                    <p class="title"><?=$item['description'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category__data">
                    <div class="input-item_house">
                        <div class="house-group">
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Город</h1>
                                    <p class="title"><?=$item['city'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Улица</h1>
                                    <p class="title"><?=$item['street'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Общая площадь</h1>
                                    <p class="title"><?=$item['area'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Этаж</h1>
                                    <p class="title"><?=$item['floor'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Год постройки</h1>
                                    <p class="title"><?=$item['year'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Количество комнат</h1>
                                    <p class="title"><?=$item['bedrooms'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Высота потолков</h1>
                                    <p class="title"><?=$item['height'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Стены</h1>
                                    <p class="title"><?=$item['material'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="input-group-house">
                                <div class="house-text">
                                    <h1>Балкон</h1>
                                    <p class="title"><?=$item['balcony'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
    }
}
?>
            </div>
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>

</html>