<?php
if (!empty($_POST['diem_a']) || !empty($_POST['diem_b']) || !empty($_POST['diem_c'])) {

    $ma_hoc_phan = $_POST['ma_hoc_phan'];  

    foreach ($_POST['diem_a'] as $msv => $diem_a) {

        $sql_diem_a = "INSERT INTO diem_hoc_phan (msv, diem_a, ma_hoc_phan) VALUES ('$msv', '$diem_a', '$ma_hoc_phan')";

        if ($conn->query($sql_diem_a) === TRUE) {
            echo "Đã nhập điểm thành công cho lớp <br>";
        } else {
            echo "Lỗi: " . $sql_diem_a . "<br>" . $conn->error;
        }
    }

    foreach ($_POST['diem_b'] as $msv => $diem_b) {
        $sql = "UPDATE diem_hoc_phan SET diem_b = '$diem_b' WHERE msv = '$msv' AND ma_hoc_phan = '$ma_hoc_phan'";
        if ($conn->query($sql) === TRUE) {
            echo "Đã nhập điểm B thành công cho sinh viên có mã số: $msv <br>";
        } else {
            echo "Lỗi: " . $conn->error . "<br>";
        }
    }

    foreach ($_POST['diem_c'] as $msv => $diem_c) {
        $sql = "UPDATE diem_hoc_phan SET diem_c = '$diem_c' WHERE msv = '$msv' AND ma_hoc_phan = '$ma_hoc_phan'";
        if ($conn->query($sql) === FALSE) {
            echo "Đã nhập điểm C thành công cho sinh viên có mã số: $msv <br>";
        } else {
            echo "Lỗi: " . $conn->error . "<br>";
        }
    }

}

?>
