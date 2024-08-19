<?php
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: login.php");
    exit();
}

$id_admin = $_SESSION['id_admin'];

?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Trang quản trị</title>
</head>
<body>
    <div class="container">
        <header>
            <ul>
                <li><a href="/web/admin/home_admin/home_admin.php"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                <li>Tài khoản <?php echo $_SESSION['id_admin']?></li>
                <li>
                    <?php 
                        include('config.php');
                        
                        $id_admin = $_SESSION['id_admin'];

                        $sql = "SELECT id_admin, ho_dem, ten FROM admin WHERE id_admin = '$id_admin'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "Họ và tên: ". $row["ho_dem"]. " " . $row["ten"] ;
                            }
                        } else {
                            echo "Không tìm được tài khoản";
                        }

                        $conn->close();

                    ?>
                </li>
            </ul>
        </header>
        <div class="menu">
        <ul>
            <a href="/web/admin/add/khoa.php"><li>Khoa</li></a>
            <a href="/web/admin/add/nganh.php"><li>Ngành</li></a>
            <a href="/web/admin/add/chuyen_nganh.php"><li>Chuyên ngành</li></a>
            <a href="/web/admin/add/hoc_phan.php"><li>Học phần</li></a>
            <a href="/web/admin/add/lop.php"><li>Lớp</li></a>
            <a href="/web/admin/add/nhom_hoc_phan.php"><li>Nhóm học phần</li></a>
        </ul>
        </div>
    </div>
    <footer>
        <p>Bạn đang đăng nhập với tài khoản  <?php echo $_SESSION['id_admin']?><a href="logout.php">(Thoát)</a></p>
    </footer>
</body>
</html>
