<?php
session_start();
if (!isset($_SESSION['msv'])) {
    header("Location: /web/home/login/login.php");
    exit();
}

$msv = $_SESSION['msv'];
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cổng thông tin Đào tạo đại học</title>
</head>
<body>
<div class="container">
    <header>

            <ul>
                <li>Tài khoản <?php echo $_SESSION['msv']; ?></li>
                <li>
                    <?php 
                        include('config.php');
     
                        $msv = $_SESSION['msv'];
                        $sql = "SELECT msv, ho_dem, ten FROM sinh_vien WHERE msv = '$msv'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            
                            $row = $result->fetch_assoc();
                            echo "Họ và tên: ". $row["ho_dem"]. " " . $row["ten"] ;
                            
                        } else {
                            echo "Không tìm được tài khoản";
                        }

                        $conn->close();

                    ?>
                </li>
                <li><a href="/web/home/home/studentInformation.php"><i class="fa-solid fa-user"></i> Thông tin</a></li>
                <li><a href="/web/home/login/logout.php">Đăng xuất</a></li>
            </ul>

    </header>
</div>
    <footer>
        <p>Copyright © 2020 Trường Đại học Mỏ - Địa chất
            Version: MOHN-2024.07B.33
            Design by 2121051141@student.humg.edu.vn</p>
    </footer>
</body>
</html>
