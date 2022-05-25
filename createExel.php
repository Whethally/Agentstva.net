<?php
session_start();
include("datebase.php");
include './PHPExcel-1.8/Classes/PHPExcel.php';
include './PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
include './PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

if ($_SESSION['id_User']) {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        $id_item = array_column($_SESSION['cart'], "id_item");
        $result = mysqli_query($db, "SELECT * FROM `items`");

        $res = mysqli_query($db, "SELECT * FROM `users`");
        $total = $total + $row['price'];
                                $xls = PHPExcel_IOFactory::load(__DIR__ . '/test.xlsx');
                                $xls->setActiveSheetIndex(0);
                                $sheet = $xls->getActiveSheet();
$i=2;
        $count = count($_SESSION['cart']);
        if (count($id_item) > 0) {
            while ($user = mysqli_fetch_assoc($res)) {
                foreach ($res as $userList) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($id_item as $id) {
                            if ($row['id_item'] == $id) {
                                $sheet->setCellValue("A".$i, $row['id_item']);
                                $sheet->setCellValue("B".$i, $_SESSION['id_User']." ". $userList['first_Name']);
                                $sheet->setCellValue("C".$i, $row['name']);
                                $sheet->setCellValue("D".$i, "1");
                                $sheet->setCellValue("E".$i, number_format($row['price']));
                                $sheet->setCellValue("F".$i, date('Y-m-d H:i:s'));
                                $i+=2;
                            }
                        }
                    }
                }
            }
        }
        

        $name = str_replace(" ", "_", $_SESSION['id_User']);

                                header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
                                header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
                                header("Cache-Control: no-cache, must-revalidate");
                                header("Pragma: no-cache");
                                header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                                header("Content-Disposition: attachment; filename=buy_".$name.".xlsx");

                                $objWriter = new PHPExcel_Writer_Excel2007($xls);
                                $objWriter->save('php://output');

                                header("Location: /cart.php");
    }
} else {
    echo "<script>alert('Сперва создайте аккаунт!')</script>";
    echo "<script>window.location = 'login.php'</script>";
}