<?php
session_start();
if (!isset($_SESSION['mgv'])) {
    echo 'Biến phiên mgv không được thiết lập.';
    exit();
}

$msv = $_SESSION['mgv'];
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cổng thông tin Đào tạo đại học</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Tài khoản <?php echo $_SESSION['mgv']; ?></h1>
            <ul>

                <li><a href="/web/home/login/logout.php">Đăng xuất</a></li>
            </ul>
        </header>
    </div>
    <footer>
        <h2>Copyright © 2020 Trường Đại học Mỏ - Địa chất
            Version: MOHN-2024.07B.33
            Design by AQTECH.VN</h2>
    </footer>
</body>
</html>
