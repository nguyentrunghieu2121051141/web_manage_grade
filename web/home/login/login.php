<?php
session_start();

include('../home/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

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
}

$conn->close();
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Đăng nhập</title>
   
</head>


<body>
    <form action="login.php" method="post">
        <div class="login">
            <h2><i class="fa-solid fa-user"></i> Đăng nhập</h2>
            <hr>
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
            <input type="password" id="password" name="password" placeholder="Mật khẩu">
            <button type="submit"><i class="fa-solid fa-arrow-right-to-bracket"></i><b> Đăng nhập</b></button>
        </div>
    </form>
    

</body>
</html> -->
