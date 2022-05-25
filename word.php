<?php
session_start();
include("datebase.php");

// PhpWord

require 'vendor/autoload.php';

$outputFile = 'dogovor_kupli_prodaji.docx';

// Code

$place_of_birth_user = $_POST['place_of_birth_user'];
$passport_user = $_POST['passport_user'];
$passport_issued_user = $_POST['passport_issued_user'];
$passport_date_user = $_POST['passport_date_user'];
$passport_code_user = $_POST['passport_code_user'];
$address_user = $_POST['address_user'];

// var_dump($place_of_birth_user);

if ($_SESSION['id_User']) {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        $id_item = array_column($_SESSION['cart'], "id_item");
        $result = mysqli_query($db, "SELECT * FROM `items`");

        $resUser = mysqli_query($db, "SELECT * FROM `users` WHERE `id_User` = " . $_SESSION['id_User']);

        $total = $total + $row['price'];
        $document = new \PhpOffice\PhpWord\TemplateProcessor('./Dogovor.docx');

        $uploadDir = __DIR__;
        $count = count($_SESSION['cart']);
        if (count($id_item) > 0) {
            

                    while ($userListPok = mysqli_fetch_assoc($resUser)) {
                        foreach ($resUser as $resPokupatel) { // Вывод покупатель

                            while ($row = mysqli_fetch_assoc($result)) { // Вывод товара

                                $res = mysqli_query($db, "SELECT * FROM `users` WHERE `id_User` = " .$row['id_User']. "");
                                
                                while ($user = mysqli_fetch_assoc($res)) {
                                    foreach ($res as $userList) { // Вывод продавца

                                foreach ($id_item as $id) {

                                    if ($row['id_item'] == $id) {
                                        // Продавец
                                        $document->setValue('last_name', $userList['last_Name']);
                                        $document->setValue('first_name', $userList['first_Name']);
                                        $document->setValue('middle_name', $userList['middle_Name']);
                                        $document->setValue('date_of_birthday', $userList['date_of_birthday']);
                                        // Покупатель
                                        $document->setValue('last_name_user', $resPokupatel['last_Name']);
                                        $document->setValue('first_name_user', $resPokupatel['first_Name']);
                                        $document->setValue('middle_name_user', $resPokupatel['middle_Name']);
                                        $document->setValue('date_of_birthday_user', $resPokupatel['date_of_birthday']);

                                        $document->setValue('place_of_birth_user', $place_of_birth_user);
                                        $document->setValue('passport_user', $passport_user);
                                        $document->setValue('passport_issued_user', $passport_issued_user);
                                        $document->setValue('passport_date_user', $passport_date_user);
                                        $document->setValue('passport_code_user', $passport_code_user);
                                        $document->setValue('address_user', $address_user);
                                        
                                        

                                        // $sheet->setCellValue("A".$i, $row['id_item']);
                                        // $sheet->setCellValue("C".$i, $row['name']);
                                        // $sheet->setCellValue("D".$i, "1");
                                        // $sheet->setCellValue("E".$i, number_format($row['price']));
                                        // $sheet->setCellValue("F".$i, date('Y-m-d H:i:s'));
                            }
                        }
                    }
                        }
                    }
                }
            }
        }
        $document->saveAs($outputFile);
    }
} else {
    echo "<script>alert('Сперва создайте аккаунт!')</script>";
    echo "<script>window.location = 'login.php'</script>";
}