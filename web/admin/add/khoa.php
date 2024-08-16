<?php
session_start();
if (!isset($_SESSION['id_admin'])) {
    echo 'Biến phiên không được thiết lập.';
    exit();
}

$id_admin = $_SESSION['id_admin'];

?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web/admin/home_admin/home_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nhập khoa</title>
</head>
<style>
    .menu ul a .khoa{
    background-color: #0F6CBF;
    color: #FFFFFF;
 }
</style>
<body>
    <div class="container">
        <header>
            <h1><a href="/web/admin/home_admin/home_admin.php"><i class="fa-solid fa-house"></i> Trang chủ</a></h1>
            <h1>Tài khoản <?php echo $_SESSION['id_admin']?></h1>
        </header>
        <ul class="menu_add">
            <li class="menu">
                <ul>
                    <a href="/web/admin/add/khoa.php"><li class="khoa" >Khoa</li></a>
                    <a href="/web/admin/add/nganh.php"><li>Ngành</li></a>
                    <li>Chuyên ngành</li>
                    <li>Học phần</li>
                    <li>Giảng viên</li>
                    <li>Lớp</li>
                    <li>Nhóm học phần</li>
                    <li>Sinh viên</li>
                </ul>
            </li>
            <li class="add">
                <form action="khoa.php" method="post">
                    <input type="text" id="ma_khoa" name="ma_khoa" placeholder="Nhập mã khoa">
                    <input type="text" id="ten_khoa" name="ten_khoa" placeholder="Nhập tên khoa">
                    <br>
                    <button type="submit">Nhập</button>
                </form>
            </li>
            
        </ul>
    
    </div>
    <footer>
    <ul>
        <li>Bạn đang đăng nhập với tên  <?php echo $_SESSION['id_admin']?><a href="/web/admin/home_admin/logout.php">(Thoát)</a></li>
    </ul>
    </footer>
</body>
</html>

<?php

include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $ma_khoa = $_POST['ma_khoa'];
    $ten_khoa = $_POST['ten_khoa'];

    if (empty($_POST['ma_khoa']) && empty($_POST['ten_khoa'])) {
        echo'Không được để trống';
    } else{

        $sql = "INSERT INTO khoa (ma_khoa, ten_khoa) 
        VALUES ('$ma_khoa', '$ten_khoa')";

        if(isset($_POST['ma_khoa'])){
            echo "Đã tồn tại, vui lòng chọn giá trị khác!";
        }
        else{
            if ($conn->query($sql) === TRUE) {
            echo "thanh cong";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
$conn->close();

?> 