<?php

include('../home_admin/config.php');

if (isset($_GET['ma_khoa'])) {
    $ma_khoa = $_GET['ma_khoa'];

    $sql_delete = "DELETE FROM khoa WHERE ma_khoa = '$ma_khoa'";

    if ($conn->query($sql_delete) === TRUE) {
        
        header("Location: khoa.php");
        exit();
    } else {
        echo "Lỗi khi xóa khoa: " . $conn->error;
    }
}

if (isset($_GET['ma_nganh'])) {
    $ma_nganh = $_GET['ma_nganh'];

    $sql_delete = "DELETE FROM nganh WHERE ma_nganh = '$ma_nganh'";

    if ($conn->query($sql_delete) === TRUE) {
        
        header("Location: /web/admin/add/nganh.php");
        exit();
    } else {
        echo "Lỗi khi xóa nganh: " . $conn->error;
    }
} 

?>
