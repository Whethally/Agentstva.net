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
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <a href="#" class="nav__logo">
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
                        <a href="index.php#about" class="nav__link">О компании</a>
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
                <a href="cart.php" class="nav__link"><i class="bx bxs-cart"></i> Корзина</a>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="bx bxs-grid-alt"></i>
            </div>
        </nav>
    </header>

    <main class="main">
        <!-- Каталог/Категория -->
        <section class="section house">
            <div class="about__container container grid">
                <div class="about__data">
                    <h1 class="section__title about__title">
                        Руководство пользователя
                    </h1>
                    <p class="about__description">
                        Для администратора: <br>
                        - Доступна страница с админ панелью. ( agenstva.net/admin ) <br>
                        . с помощью которой он может просматривать статистику о пользователях, просмотрах, переходах и
                        заказов. <br>
                        . добавлять, изменять, удалять товары на сайте <br>
                        <br>
                    </p>
                    <p class="about__description">
                        Для пользователя: <br>
                        - Имеет доступ к просмотру каталога, информации о компании, контакты. ( agenstva.net/index.php
                        )<br>
                        . в каталоге он может просмотреть подробную информацию об интерисующем его товаре и добавить в
                        корзину. ( agenstva.net/cart.php )<br>
                        . при открытии корзины он может оформить заказ.<br>
                    </p>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <img src="assets/img/logo.png" alt="" class="footer__logo-img" />
                    Агенства.нет
                </a>

                <p class="footer__description">Вдали от суеты, в центре событий!</p>
            </div>
        </div>

        <span class="footer__copy container">&copy; 2021 Egorov. All rigths reserved</span>
    </footer>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>