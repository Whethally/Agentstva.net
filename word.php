<?php
session_start();
include("datebase.php");

// PhpWord

require 'vendor/autoload.php';

$outputFile = 'dogovor_kupli_prodaji.docx';

// Code

$arr = [
    'январь',
    'февраль',
    'март',
    'апрель',
    'май',
    'июнь',
    'июль',
    'август',
    'сентябрь',
    'октябрь',
    'ноябрь',
    'декабрь'
];

$month = date('n')-1;

$dateNow_number = date("j");
$dateNow_name = $arr[$month];
$dateNow_year = date("Y");

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
                                        // Дата
                                        $document->setValue('dateNow_number', $dateNow_number);
                                        $document->setValue('dateNow_name', $dateNow_name);
                                        $document->setValue('dateNow_year', $dateNow_year);
                                        // Город
                                        $document->setValue('city', $row['city']);
                                        // Продавец
                                        $document->setValue('last_name', $userList['last_Name']);
                                        $document->setValue('first_name', $userList['first_Name']);
                                        $document->setValue('middle_name', $userList['middle_Name']);
                                        $document->setValue('date_of_birthday', $userList['date_of_birthday']);

                                        $document->setValue('place_of_birth', $userList['place_of_birth']);
                                        $document->setValue('passport', $userList['passport']);
                                        $document->setValue('passport_issued', $userList['passport_issued']);
                                        $document->setValue('passport_date', $userList['passport_date']);
                                        $document->setValue('passport_code', $userList['passport_code']);
                                        $document->setValue('address', $userList['address']);
                                        // Покупатель
                                        $document->setValue('last_name_user', $resPokupatel['last_Name']);
                                        $document->setValue('first_name_user', $resPokupatel['first_Name']);
                                        $document->setValue('middle_name_user', $resPokupatel['middle_Name']);
                                        $document->setValue('date_of_birthday_user', $resPokupatel['date_of_birthday']);

                                        $document->setValue('place_of_birth_user', $resPokupatel['place_of_birth']);
                                        $document->setValue('passport_user', $resPokupatel['passport']);
                                        $document->setValue('passport_issued_user', $resPokupatel['passport_issued']);
                                        $document->setValue('passport_date_user', $resPokupatel['passport_date']);
                                        $document->setValue('passport_code_user', $resPokupatel['passport_code']);
                                        $document->setValue('address_user', $resPokupatel['address']);
                                        // Квартира
                                        $document->setValue('id_item', $row['id_item']);
                                        $document->setValue('floor', $row['floor']);
                                        $document->setValue('floor_max', $row['max_floor']);
                                        $document->setValue('street', $row['street']);
                                        $document->setValue('bedrooms', $row['bedrooms']);
                                        $document->setValue('area', $row['area']);
                                        $document->setValue('price', $row['price']);
                                        
                                        

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