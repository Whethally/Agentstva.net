<?php
session_start();
include 'datebase.php';
if ($_SESSION['id_User']) {
    header('Location: profile.php');
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
    <?php include('header.php');?>

    <main class="main">
        <section class="section panel" id="cart">
            <h2 class="section__title">
                Авторизация
            </h2>
            <div class="panel__container container grid">
                <div class="panel__data">
                    <?php
                    if (isset($_POST['login'])) {
                        $login = empty($_POST['login']) ? false : $_POST['login'];
                        $password = empty($_POST['password']) ? false : $_POST['password'];

                        $sqlQuery = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");

                        $res = mysqli_fetch_array($sqlQuery);
                        $current_password = $res['password'];

                        if (password_verify($password, $current_password)) {
                            $_SESSION['id_User'] = $res['id_User'];
                            header('location: profile.php');
                        } else {
                            echo "<p>Неверный логин или пароль.</p>";
                        }
                    }
                    {

?>
                    <form id="login" class="login" method="post">
                        <div class="input-container">
                            <div class="input-block">
                                <div class="input-item iip">
                                    <i class='bx bx-user-pin'></i>
                                    <input class="user" placeholder="Введите логин" type="text" name="login" id="login"
                                        required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bx-lock-alt'></i>
                                    <input type="password" placeholder="Введите пароль" name="password" id="password"
                                        class="password" required />
                                </div>

                                <input type="submit" class="panel__login" value="Войти" name="submit" />
                            </div>
                            <div class="input-block">
                                <div class="input-item iip">
                                    <a class="button_a" href="reg.php">Нет аккаунта?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php }?>
        </section>
    </main>

    <?php include('footer.php');?>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>