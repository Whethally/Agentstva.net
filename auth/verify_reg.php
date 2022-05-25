<?php
session_start();

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($login) or empty($password))
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
}
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);

include ("datebase.php");

$result = mysqli_query($datebase, "SELECT * FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
echo $myrow;
if (empty($myrow['password']))
{
exit ("Извините, введённый вами логин или пароль неверный.");
}
else {
      if ($myrow['password']==$password) {
      $_SESSION['login']=$myrow['login'];
      $_SESSION['idUser']=$myrow['idUser'];
      }

      else {
      exit ("sorry, введённый вами логин или пароль неверный.");
}
}
?>