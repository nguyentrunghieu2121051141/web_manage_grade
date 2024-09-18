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
} 

elseif (isset($_GET['msv'])) {
    $msv = $_GET['msv'];

    $sql_delete = "DELETE FROM sinh_vien WHERE msv = '$msv'";

    if ($conn->query($sql_delete) === TRUE) {
        
        header("Location: /web/admin/sign_up/sign_up_student/quan_ly_sinh_vien.php");
        exit();
    } else {
        echo "Lỗi khi xóa sinh viên: " . $conn->error;
    }
}
?>
