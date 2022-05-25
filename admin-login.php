<?php
session_start();
include 'datebase.php';
if ($_SESSION['id_admin']) {
    header('Location: admin.php');
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
            <div class="panel__container container grid">
                <div class="panel__data">
                    <?php
                    if (isset($_POST['login'])) {
                        $login = empty($_POST['login']) ? false : $_POST['login'];
                        $password = empty($_POST['password']) ? false : $_POST['password'];
                        if ($login and $password) {
                            $check = mysqli_query(
                                $db,
                                "SELECT count(*) FROM `admin` where `login` = '$login' AND `password` = '$password' "
                            );
                        }
                        
                        if (mysqli_fetch_array($check)[0] == 1) {
                            $userid = mysqli_fetch_assoc(
                                mysqli_query(
                                    $db,
                                    "SELECT `id_admin` FROM `admin` WHERE `login` = '$login' AND `password` = '$password'"
                                )
                            )['id_admin'];
                            $_SESSION['id_admin'] = $userid;
                            header('location: admin.php');
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