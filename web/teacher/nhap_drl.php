<?php
    if (!empty($_POST['drl'])) {
        foreach ($_POST['drl'] as $msv => $drl) {

            echo $drl . $msv;
            $sql_drl = "INSERT INTO diem_ren_luyen (msv, drl) VALUES ('$msv', '$drl')";

            if ($conn->query($sql_drl) === TRUE) {
                echo "Đã nhập điểm thành công cho msv: " . $msv . "<br>";
            } else {
                echo "Lỗi: " . $sql_drl . "<br>" . $conn->error;
            }
        }
    }
?>