<?php
if (isset($_POST['name'])) { $login = $_POST['name']; if ($name == '') { unset($name);} }
if (isset($_POST['lastName'])) { $password=$_POST['lastName']; if ($lastName =='') { unset($lastName);} }
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($login) or empty($password) or empty($name) or empty($lastName))
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}

$name = stripslashes($name);
$name = htmlspecialchars($name);

$lastName = stripslashes($lastName);
$lastName = htmlspecialchars($lastName);

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$name = trim($name);
$lastName = trim($lastName);
$login = trim($login);
$password = trim($password);

include ("datebase.php");

$result = mysqli_query($datebase, "SELECT id FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

$result2 = mysqli_query ($datebase, "INSERT INTO users (name,lastName,login,password) VALUES('$name','$lastName','$login','$password')");

if ($result2=='TRUE')
{
echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../admin.php'>Главная страница</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>