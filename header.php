<header class="header" id="header">
    <nav class="nav container">
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <a href="index.php" class="nav__logo">
                    <img src="assets/img/logo.png" alt="" class="nav__logo-img" />
                    Агенства.нет
                </a>
                <li class="nav__item">
                    <a href="index.php#home" class="nav__link active-link">Главная</a>
                </li>
                <li class="nav__item">
                    <a href="index.php#category" class="nav__link">Каталог</a>
                </li>
                <li class="nav__item">
                    <a href="index.php#contacts" class="nav__link">Контакты</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="bx bxs-x-circle"></i>
            </div>
        </div>

        <div class="nav__menu-cart" id="nav-menu">
            <ul class="nav__list">
                <?php
                    if (isset($_SESSION['id_User'])) {
                        echo '<li class="nav__item">
                        <a href="login.php" class="nav__link" id="">Мой аккаунт</a>
                    </li>';
                    } else {
                        echo '<li class="nav__item">
                        <a href="login.php" class="nav__link" id="">Войти</a>
                    </li>
                        ';
                    }
?>
                <li class="nav__item">
                    <a href="cart.php" class="nav__link"><i class="bx bxs-cart"></i> Корзина</a>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<span class='cart_count'>". $count ."</span>";
                    } else {
                        echo "<span class='cart_count'>0</span>";
                    }
                    ?>

                </li>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class="bx bxs-grid-alt"></i>
        </div>
    </nav>
</header>