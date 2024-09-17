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
} else {
    echo "Không nhận được mã khoa để xóa!";
}
?>
