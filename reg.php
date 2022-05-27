<?php
    session_start();
    if (array_key_exists('id_User', $_SESSION) && !empty($_SESSION['id_User'])) {
        echo 'Set and not empty, and no undefined index error!';
    }
    include "datebase.php";
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
        <section class="section panel" id="panel">
            <h2 class="section__title">
                Регистрация
            </h2>
            <div class="panel__container container grid">
                <div class="panel__data">
                    <?php
                        if (isset($_POST['login'])) {
                            $login = empty($_POST['login']) ? false : $_POST['login'];
                            $password = empty($_POST['password']) ? false : $_POST['password'];
                            
                            $first_Name = empty($_POST['first_Name']) ? false : $_POST['first_Name'];
                            $last_Name = empty($_POST['last_Name']) ? false : $_POST['last_Name'];
                            $middle_Name = empty($_POST['middle_Name']) ? false : $_POST['middle_Name'];
                            
                            $phone = empty($_POST['phone']) ? false : $_POST['phone'];
                            $email = empty($_POST['email']) ? false : $_POST['email'];
                            
                            $date_of_birthday = empty($_POST['date_of_birthday']) ? false : $_POST['date_of_birthday'];

                            $place_of_birth = empty($_POST['place_of_birth']) ? false : $_POST['place_of_birth'];
                            $passport = empty($_POST['passport']) ? false : $_POST['passport'];
                            $passport_issued = empty($_POST['passport_issued']) ? false : $_POST['passport_issued'];
                            $passport_date = empty($_POST['passport_date']) ? false : $_POST['passport_date'];
                            $passport_code = empty($_POST['passport_code']) ? false : $_POST['passport_code'];
                            $address = empty($_POST['address']) ? false : $_POST['address'];
                            
                            $result = mysqli_query(
                                $db,
                                "INSERT INTO `users`(`id_User`,`login`,`password`,`first_Name`,`middle_Name`,`last_Name`,`phone`,`email`,`date_of_birthday`,`place_of_birth`,`passport`,`passport_issued`,`passport_date`,`passport_code`,`address`)
                                VALUES (null,
                                '$login',
                                '". password_hash($password, PASSWORD_BCRYPT) ."',
                                '$first_Name',
                                '$middle_Name',
                                '$last_Name',
                                '$phone',
                                '$email',
                                '$date_of_birthday',
                                '$place_of_birth',
                                '$passport',
                                '$passport_issued',
                                '$passport_date',
                                '$passport_code',
                                '$address'
                                )"
                            );
                            if ($result) {
                                echo "<p>Вы успешно зарегистрированы!</p>";
                                echo "<script> location.href = 'login.php' </script>";
                            } else if ($check = mysqli_query($db, "SELECT id_User FROM users WHERE `login`='$login'")) {
                                $myrow = mysqli_fetch_array($check);
                                if (!empty($myrow['id_User'])) {
                                    echo "<p>Извините, введённый вами логин уже зарегистрирован. Введите другой логин.</p>";
                                }
                            }
                        }
?>
                    <form method="post">
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
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите имя" name="first_Name" id="first_Name"
                                        class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите отчество" name="middle_Name"
                                        id="middle_Name" class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите фамилию" name="last_Name" id="last_Name"
                                        class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-phone'></i>
                                    <input type="phone" placeholder="Введите телефон" name="phone" id="phone"
                                        class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-envelope'></i>
                                    <input type="email" placeholder="Введите почту" name="email" id="email" class="user"
                                        required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-calendar'></i>
                                    <input type="date" placeholder="Введите дату рождения" name="date_of_birthday"
                                        id="date_of_birthday" class="user" required />
                                </div>
                            </div>
                            <div class="input-block">
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите место жительство" name="place_of_birth"
                                        id="place_of_birth" class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите паспортные данные" name="passport"
                                        id="passport" class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите место выдачи паспорта"
                                        name="passport_issued" id="passport_issued" class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите дату выдачи паспорта" name="passport_date"
                                        id="passport_date" class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите код подразделения паспорта"
                                        name="passport_code" id="passport_code" class="user" required />
                                </div>
                                <div class="input-item iip">
                                    <i class='bx bxs-user'></i>
                                    <input type="text" placeholder="Введите адрес жительства" name="address"
                                        id="address" class="user" required />
                                </div>
                                <input type="submit" class="panel__login" value="Зарегистрироваться" name="submit" />
                            </div>
                            <div class="input-block">
                                <div class="input-item iip">
                                    <a class="button_a" href="login.php">Есть аккаунт?</a>
                                </div>
                            </div>
                        </div>
                    </form>
        </section>
    </main>

    <?php include('footer.php');?>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>