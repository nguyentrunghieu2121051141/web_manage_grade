<?php

include('../home_admin/config.php');

if (isset($_GET['mgv'])) {
    $mgv = $_GET['mgv'];

    $sql_delete = "DELETE FROM giang_vien WHERE mgv = '$mgv'";

    if ($conn->query($sql_delete) === TRUE) {
        
        header("Location: /web/admin/sign_up/sign_up_teacher/quan_ly_giang_vien.php");
        exit();
    } else {
        echo "Lỗi khi xóa giảng viên: " . $conn->error;
    }
} else {
    echo "Không nhận được mã giảng viên để xóa!";
}
?>
