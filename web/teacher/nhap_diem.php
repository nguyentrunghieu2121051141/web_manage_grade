<?php

if (!empty($_POST['diem_a']) || !empty($_POST['diem_b']) || !empty($_POST['diem_c'])) {

    $ma_hoc_phan = $_SESSION['ma_hoc_phan'];
    $ma_nhom = $_SESSION['ma_nhom'];
    $mgv = $_SESSION['mgv'];

    // Nhập điểm A
    foreach ($_POST['diem_a'] as $msv => $diem_a) {
        $sql_diem_a = "SELECT diem_a FROM diem_hoc_phan WHERE msv = '$msv'";
        $result_diem_a = $conn->query($sql_diem_a);
        $sql_diem_a_nhom = "SELECT diem_a FROM bang_diem_nhom WHERE msv = '$msv'";
        $result_diem_a_nhom = $conn->query($sql_diem_a_nhom);
        if ($result_diem_a->num_rows > 0 && $result_diem_a_nhom->num_rows) {
            echo "Đã tồn tại";
        } else {
        
            $sql_diem_a = "INSERT INTO diem_hoc_phan (msv, diem_a, ma_hoc_phan) VALUES ('$msv', '$diem_a', '$ma_hoc_phan')";
            $sql_diem_a_nhom = "INSERT INTO bang_diem_nhom (msv, diem_a, mgv, ma_nhom) VALUES ('$msv', '$diem_a', '$mgv', '$ma_nhom')";

            if (!$conn->query($sql_diem_a) || !$conn->query($sql_diem_a_nhom)) {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }
    }

    // Nhập điểm B
    foreach ($_POST['diem_b'] as $msv => $diem_b) {
        
        $sql_diem_b = "UPDATE diem_hoc_phan SET diem_b = '$diem_b' WHERE msv = '$msv' AND ma_hoc_phan = '$ma_hoc_phan'";
        $sql_diem_b_nhom = "UPDATE bang_diem_nhom SET diem_b = '$diem_b' WHERE msv = '$msv' AND ma_nhom = '$ma_nhom'";

        if (!$conn->query($sql_diem_b) || !$conn->query($sql_diem_b_nhom)) {
            echo "Lỗi: " . $conn->error . "<br>";
        }
    }

    // Nhập điểm C
    foreach ($_POST['diem_c'] as $msv => $diem_c) {
        $sql_diem_c = "UPDATE diem_hoc_phan SET diem_c = '$diem_c' WHERE msv = '$msv' AND ma_hoc_phan = '$ma_hoc_phan'";
        $sql_diem_c_nhom = "UPDATE bang_diem_nhom SET diem_c = '$diem_c' WHERE msv = '$msv' AND ma_nhom = '$ma_nhom'";

        if (!$conn->query($sql_diem_c) || !$conn->query($sql_diem_c_nhom)) {
            echo "Lỗi: " . $conn->error . "<br>";
        }
    }

}
?>
