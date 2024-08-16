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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Lấy dữ liệu từ form
    $msv = $_POST['msv'];
    $ho_dem = $_POST['ho_dem'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gender'];

    // Chèn dữ liệu vào bảng
    $sql = "INSERT INTO sinh_vien (msv, ho_dem, ten, sdt, email, mat_khau, ngay_sinh, gioi_tinh) 
    VALUES ('$msv', '$ho_dem', '$ten', '$sdt', '$email', '$matkhau', '$ngaysinh', '$gioitinh')";


    if ($conn->query($sql) === TRUE) {
        echo "Thành công ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="sign_up.css">
        <title>sign_up</title>
    </head>
        <body>
            
        
        <form action="sign_up.php" method="post">

            <div class="create">
                
                    <input type="text" id="ho_dem" name="ho_dem" placeholder="Họ đệm">
                    <input type="text" id="ten" name="ten" placeholder="Tên">
                    <input type="tel" id="sdt" name="sdt" placeholder="Số di động" size="10">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu">
                    <input type="date" id="ngaysinh" name="ngaysinh">
                    <input type="text" id="msv" name="msv" placeholder="Mã sinh viên">
    
            <div class="gender">
                <input type="radio" id="male" name="gender" value="Nam">
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="Nữ">
                <label for="female">Nữ</label><br>
                    
            </div>
                    
                <br>
                 
                <div class="submit">
                    <button type="submit">Đăng kí</button>
                </div>
                    
            </div>
        </form>

    </body>

</head>