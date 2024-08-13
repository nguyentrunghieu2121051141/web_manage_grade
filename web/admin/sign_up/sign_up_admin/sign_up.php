<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btl_web";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$id_admin = $_POST['id_admin'];
$ho_dem = $_POST['ho_dem'];
$ten = $_POST['ten'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
$ngaysinh = $_POST['ngay_sinh'];
$gioitinh = $_POST['gender'];

// Chèn dữ liệu vào bảng
$sql = "INSERT INTO admin (id_admin, ho_dem, ten, sdt, email, mat_khau, ngay_sinh, gioi_tinh) 
VALUES ('$id_admin', '$ho_dem', '$ten', '$sdt', '$email', '$mat_khau', '$ngaysinh', '$gioitinh')";


if ($conn->query($sql) === TRUE) {
    echo "Thành công ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>