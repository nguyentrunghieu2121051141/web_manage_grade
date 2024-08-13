<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btl_web";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra và xử lý đăng nhập cho sinh viên
    $sql = "SELECT * FROM sinh_vien WHERE msv = '$username' AND mat_khau = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['msv'] = $username;
        header("Location: /web/student/home_student.php");
        exit();
    } 

    // Kiểm tra và xử lý đăng nhập cho giảng viên nếu không tìm thấy sinh viên
    $sql = "SELECT * FROM giang_vien WHERE mgv = '$username' AND mat_khau = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['mgv'] = $username;
        header("Location: /web/teacher/teacher_home.php");
        exit();
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
} else {
    echo "Vui lòng nhập thông tin đầy đủ.";
}

$conn->close();
?>
