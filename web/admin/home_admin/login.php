</body>
</html>
<?php
session_start(); // Bắt đầu session

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

// Kiểm tra xem form có được gửi đi hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem các biến có tồn tại hay không
    if (isset($_POST['id_admin']) && isset($_POST['mat_khau'])) {
        $id_admin = $_POST['id_admin'];
        $mat_khau = $_POST['mat_khau'];

        // Kiểm tra thông tin đăng nhập
        $sql = "SELECT id_admin FROM admin WHERE id_admin = '$id_admin' AND mat_khau = '$mat_khau'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['id_admin'] = $id_admin;
            header("Location: /web/admin/home_admin/home_admin.php");
            exit();
        } else {
            echo "Mã sinh viên hoặc mật khẩu không đúng.";
        }
    } else {
        echo "Vui lòng nhập tên đăng nhập và mật khẩu.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Đăng nhập quyền quản trị</title>
   
</head>


<body>
    <form action="login.php" method="post">
        <div class="login">
            <h2>Đăng nhập quyền quản trị</h2>
            <input type="text" id="id_admin" name="id_admin" placeholder="Tên đăng nhập">
            <input type="password" id="mat_khau" name="mat_khau" placeholder="Mật khẩu">
            <button type="submit">Đăng nhập</button>
        </div>
    </form>
    

</body>
</html>
