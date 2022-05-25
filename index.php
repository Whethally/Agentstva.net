<?php
session_start();
include("datebase.php");


$page_count = 4;
$page = empty($_GET['page']) ? 1 : $_GET['page'];
$page = $page * $page_count - $page_count;

$count_post = mysqli_fetch_array(
    mysqli_query($db, 'SELECT count(*) FROM items')
)[0];

$showQuery = "SELECT * FROM `index`";
$showRes = mysqli_query($db, $showQuery);

foreach ($showRes as $indexItem) {
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
        <section class="home container" id="home">
            <div class="home__content grid">
                <div class="home__group">
                    <img class="home__img" src="assets/img/1.jpg" alt="" />
                    <div class="home__details-img">
                        <h4 class="home__details-title"><?= $indexItem['index_name'] ?></h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- Каталог/Категория -->
        <section class="section category" id="category">
            <h2 class="section__title">
                Каталог <br />
            </h2>
            <div class="category__container container">
                <div class="filter">
                    <form action="" method="POST">
                        <table class="filter-table">
                            <tr class="filter-tr">
                                <td class="filter-td">
                                    <label for="">Цена от</label>
                                    <input type="number" name="start_price" value="<?php if (!empty($_POST['start_price'])) {
    echo $_POST['start_price'];
} else {
    echo "0";
} ?>" class="form-control">
                                </td>
                                <td class="filter-td">
                                    <label for="">Цена до</label>
                                    <input type="number" name="end_price" value="<?php if (!empty($_POST['end_price'])) {
    echo $_POST['end_price'];
} else {
    echo "1000000";
} ?>" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="button" value="Фильтровать"></input>
                                </td>
                                <td colspan="2">
                                    <input type="reset" class="button" value="Вернуть последние значения" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <!-- <div class="row">
                <?php
                        if (isset($_POST['start_price']) && isset($_POST['end_price'])) {
                            $startprice = $_POST['start_price'];
                            $endprice = $_POST['end_price'];

                            $query = "SELECT * FROM items WHERE price BETWEEN $startprice AND $endprice ";
                        } else {
                            $query = "SELECT * FROM items";
                        }
                        
                        $query_run = mysqli_query($db, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $items) {
                                //?>
            <div class="col-md-4 mb-3">
                <div class="border p-2">
                    <h5><?php echo $items['name']; ?>
                    </h5>
                    <h6>PRICE: <?php echo $items['price']; ?>
                    </h6>
                </div>
            </div>
            <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
            </div> -->
            <div class="category__container container grid">
                <?php
                if (isset($_POST['add'])) {
                    /// print_r($_POST['product_id']);
                    if (isset($_SESSION['cart'])) {
                        $item_array_id = array_column($_SESSION['cart'], "id_item");
                
                        if (in_array($_POST['id_item'], $item_array_id)) {
                            // echo "<script>alert('Вы уже добавили этот товар в корзину!')</script>";
                            echo "<script>window.location = 'index.php'</script>";
                        } else {
                            $count = count($_SESSION['cart']);
                            $item_array = array(
                                'id_item' => $_POST['id_item']
                            );
                
                            $_SESSION['cart'][$count] = $item_array;
                            echo "<script>window.location = 'index.php'</script>";
                        }
                    } else {
                        $item_array = array(
                                'id_item' => $_POST['id_item']
                        );
                
                        // Create new session variable
                        $_SESSION['cart'][0] = $item_array;
                        echo "<script>window.location = 'index.php'</script>";
                    }
                }

                if (isset($_POST['items'])) {
                    $itemchecked = [];
                    $itemchecked = $_POST['items'];
                    foreach ($itemchecked as $rowitems) {
                        $sql = "SELECT * FROM items WHERE id_item IN ('". $rowitems ."')";

                        $res = mysqli_query($db, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            foreach ($res as $item) {
                                ?>
                <form action="" method="post">
                    <div class="category__data">
                        <img src="<?=$item['image'] ?>" alt="" class="category__img" />
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
                            <input type="hidden" name="id" value="<?=$item['id_item']?>">
                            <a href="house.php?id=<?=$item['id_item']?>" class="button">Подробнее</a>

                            <input type="submit" name="add" class="button category__button" value="add">
                            <input type="hidden" name="id_item" value="<?=$item['id_item']?>">
                            </input>
                        </div>
                    </div>
                </form>

                <?php
                            }
                        } else {
                            echo "Нет товаров.";
                        }
                    }
                } else {
                    if (!empty($_POST['start_price']) && !empty($_POST['end_price'])) {
                        $startprice = $_POST['start_price'];
                        $endprice = $_POST['end_price'];

                        $sql = "SELECT * FROM items WHERE price BETWEEN $startprice AND $endprice ";
                    } else {
                        $sql = "SELECT * FROM items LIMIT $page,$page_count";
                    }

                    $res = mysqli_query($db, $sql); 
                    if (mysqli_num_rows($res) > 0) {
                        foreach ($res as $item) {
                            ?>
                <form action="" method="post">
                    <div class="category__data">
                        <img src="<?=$item['image'] ?>" alt="" class="category__img" />
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
                            <input type="hidden" name="id" value="<?=$item['id_item']?>">
                            <a href="house.php?id=<?=$item['id_item']?>" class="button category__button"><i
                                    class='bx bxs-detail'></i> Подробнее</a>

                            <!-- <input type="submit" name="add" class="button category__button" value="add"> -->
                            <button type="submit" name="add" class="button category__button">
                                <i class='bx bxs-cart-add'></i> Добавить в корзину
                            </button>
                            <input type="hidden" name="id_item" value="<?=$item['id_item']?>">
                            </input>
                        </div>
                    </div>
                </form>

                <?php
                        }
                    } else {
                        echo "Нет товаров.";
                    }
                }
?>
            </div>


        </section>
        <section class="section">
            <div class="category__container container">
                <div class="pagination">
                    <?php for ($i = 1; $i <= ceil($count_post / $page_count); $i++) {
    echo "<li class='nav__item'><a class='header-button visited' href='?page=$i'>$i</a></li>";
} ?>
                </div>
            </div>
        </section>
        <!-- Контакты -->
        <section class="section contacts" id="contacts">
            <div class="contacts__container container">
                <div class="contacts__data">
                    <h2 class="section__title">Контакты</h2>
                    <p class="contacts__description">
                        <i class="bx bxs-been-here"></i> Республика Башкортостан, г. Уфа,
                        ул. Кирова, 65
                    </p>
                    <p class="contacts__description">
                        <i class="bx bxs-phone"></i> +7 (987) 654-32-10
                    </p>
                    <p class="contacts__description">
                        <i class="bx bx-mail-send"></i> uksivt@uksivt.ru
                    </p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2303.9343333979714!2d55.96836561600796!3d54.7283698779955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d93b1cbbd6c60f%3A0x62b1dd12a3728852!2sUksivt!5e0!3m2!1sen!2sru!4v1635081572493!5m2!1sen!2sru"
                        width="1620" height="600" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>

</html>
<?php } ?>