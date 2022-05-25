<?php
session_start();
// unset($_SESSION['cart']);
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
        <section class="section house">
            <h1 class="section__title container">
                <div class="welcome">
                    <h2 class="section__title">
                        Корзина
                    </h2>
                </div>
            </h1>

            <div class="house__data container">
                <div class="house__container">
                    <?php
                    if (isset($_POST['remove'])) {
                        // print_r($_GET['id_item']);
                        if ($_GET['action'] == 'remove') {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                if ($value["id_item"] == $_GET['id_item']) {
                                    unset($_SESSION['cart'][$key]);
                                    // echo "<script>alert('Product has been Removed...!')</script>";
                                    echo "<script>window.location = 'cart.php'</script>";
                                }
                            }
                        }
                    }

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $id_item = array_column($_SESSION['cart'], "id_item");
                        $result = mysqli_query($db, "SELECT * FROM `items`");

                        if (count($id_item) > 0) {



                            while ($row = mysqli_fetch_assoc($result)) {

                                $res = mysqli_query($db, "SELECT * FROM `users` WHERE `id_User` = " .$row['id_User']. "");

                                while($itemUser = mysqli_fetch_assoc($res)) {
                                    foreach ($res as $userProd) {

                                foreach ($id_item as $id) {
                                    if ($row['id_item'] == $id) {
                                        ?>
                    <form action="cart.php?action=remove&id_item=<?=$row['id_item']?>" method="post">
                        <div class="cart">
                            <div class="cart-block">
                                <div class="cart-items">
                                    <div class="cart-item">
                                        <img class="img-cart" src="<?=$row['image']?>" alt="">
                                    </div>
                                    <div class="cart-items_2">
                                        <div class="cart-item">
                                            <p><?=$userProd['first_Name']?>
                                            </p>
                                        </div>
                                        <div class="cart-item">
                                            <h3 class="category__title"><?=$row['name']?>
                                        </div>
                                        <div class="cart-item">
                                            <p><?=$row['price']?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="cart-items">
                                    <div class="cart-item">
                                        <button class="button" name="remove" type="submit">Удалить</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <?php
                                        $total = $total + $row['price'];
                                    }
                                }
                            }
                        }
                            }
                        } else {
                            echo "<i class='bx bx-sad' style='text-align: center;'></i>";
                            echo "<h3 class='section__title section__error'>Твоя корзина пуста.</h3>";
                            echo "<h3 class='section__description'>
                            Перейдите в каталог и добавьте товар.
                        </h3>";
                            echo "<a href='index.php#category' class='section__button button'>Перейти в каталог</a>";
                        }
                    } else {
                        echo "<i class='bx bx-sad' style='text-align: center;'></i>";
                        echo "<h3 class='section__title section__error'>Твоя корзина пуста.</h3>";
                        echo "<h3 class='section__description'>
                        Перейдите в каталог и добавьте товар.
                    </h3>";
                        echo "<a href='index.php#category' class='section__button button'>Перейти в каталог</a>";
                    }

                    ?>

                    <!-- <i class='bx bx-sad' style="text-align: center;"></i>
                    <h2 class="section__title section__error">Твоя корзина пуста.</h2>
                    <h3 class="section__description">
                        Перейдите в каталог и добавьте товар.
                    </h3>
                    <a href="index.php#category" class="section__button button">Перейти в каталог</a> -->
                </div>
                <div class="total">
                    <div class="total-block">
                        <div class="row-total">
                            <h1>Итого</h1>
                        </div>

                        <div class="row-total">
                            <div class="col-total">
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    if (count($id_item) > 0) {
                                        $count = count($_SESSION['cart']);
                                        echo "<h3>Всего ( $count товар(а) )</h2>";
                                        echo "<h3>" . number_format($total) . "₽</h3>";
                                        echo
                                        "
                                        <div class='input-group'>
                                <input class='button' id='cart_confirm' type='button' value='Оформить заказ'    ></input>
                            </div>
                                        ";
                                    } else {
                                        echo "<i class='bx bx-sad' style='text-align: center;'></i>";
                                    }
                                } else {
                                    echo "<i class='bx bx-sad' style='text-align: center;'></i>";
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    </div>
    </section>
    </main>

    <div class="modal modal-cart">
        <div class="modal-content">
            <form method="POST">
                <div id="closemodalCart" class="icon">
                    <i class="bx bxs-x-circle"></i>
                </div>
            </form>

            <form action="word.php" method='post' enctype="multipart/form-data">
                <?php
                if ($_SESSION['id_User']) {
                    echo "
                    <input type='text' name='place_of_birth_user' id='place_of_birth_user' placeholder='Место рождения'>
<input type='text' name='passport_user' id='passport_user' placeholder='Серия, номер паспорта'>
<input type='text' name='passport_issued_user' id='passport_issued_user' placeholder='Выдан'>
<input type='date' name='passport_date_user' id='passport_date_user' placeholder='Дата выдачи паспорта'>
<input type='text' name='passport_code_user' id='passport_code_user' placeholder='Код подразделения'>
<input type='text' name='address_user' id='address_user' placeholder='Адрес регистрации'>
                    <input type='hidden' name='first_Name' id='first_Name'>
                    <div class='input-group'>
                        <button class='button' type='submit'>Создать документ</button>
                    </div>
                    ";
                ?>
                <?php } else {
                    echo "<label for='confirm'>Вам нужно создать аккаунт для оформления заказа.</label>";
                    }?>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>