<?php
include('../../home_admin/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Lấy dữ liệu từ form
    $msv = $_POST['msv'];
    $ho_dem = $_POST['ho_dem'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $mat_khau = $_POST['mat_khau'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $gioi_tinh = $_POST['gender'];
    $ma_lop = $_POST['ma_lop'];

    if (empty($_POST['msv']) || empty($_POST['ho_dem']) || empty($_POST['ten']) || 
    empty($_POST['sdt']) || empty($_POST['email']) || empty($_POST['mat_khau']) || 
    empty($_POST['ngay_sinh']) || empty($_POST['gender']) || empty($_POST['ma_lop'])) {
    echo'Không được để trống';
    
    } else{
        $sql1 = "SELECT msv FROM sinh_vien WHERE msv = '$msv'";
        $result1 = $conn->query($sql1);
        $sql2 = "SELECT msv, ma_lop FROM danh_sach_lop WHERE msv = '$msv' and ma_lop = '$ma_lop'";
        $result2 = $conn->query($sql2);

            if ($result1->num_rows > 0 || $result2->num_rows > 0) {
                echo "Đã tồn tại";
            } else {

                // Chèn dữ liệu vào bảng
                $sql1 = "INSERT INTO sinh_vien (msv, ho_dem, ten, sdt, email, mat_khau, ngay_sinh, gioi_tinh, ma_lop) 
                VALUES ('$msv', '$ho_dem', '$ten', '$sdt', '$email', '$mat_khau', '$ngay_sinh', '$gioi_tinh', '$ma_lop')";
                $sql2 = "INSERT INTO danh_sach_lop (msv, ho_dem, ten, ma_lop) 
                VALUES ('$msv', '$ho_dem', '$ten', '$ma_lop')";

                if ($conn->query($sql1) === TRUE and $conn->query($sql2) === TRUE) {
                    echo "Thành công ";
                } else {
                    echo "Error: " . $sql1 . $sql2 . "<br>" . $conn->error;
                }
            }
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/web/admin/sign_up/sign_up.css">
        <title>Trang đăng kí tài khoản sinh viên</title>
    </head>
        <body>
            
        
        <form action="sign_up.php" method="post">

            <div class="create">
                <h2>Đăng kí tài khoản sinh viên</h2>
                
                    <input type="text" id="ho_dem" name="ho_dem" placeholder="Họ đệm" class="name">
                    <input type="text" id="ten" name="ten" placeholder="Tên" class="name">
                    <input type="tel" id="sdt" name="sdt" placeholder="Số di động" size="10">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="password" id="mat_khau" name="mat_khau" placeholder="Mật khẩu">
                    <input type="date" id="ngay_sinh" name="ngay_sinh">
                    <input type="text" id="msv" name="msv" placeholder="Mã sinh viên">
    
            <div class="gender">
                <input type="radio" id="male" name="gender" value="Nam">
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="Nữ">
                <label for="female">Nữ</label><br>
                    
            </div>
            <br>
    
            <select name="ma_lop" id="ma_lop">
                <option value="">Chọn lớp</option>
                <?php
                    include('config.php');
                    $result = $conn->query("SELECT ma_lop FROM lop");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ma_lop'] . '">' . $row['ma_lop'] . '</option>';
                        }
                    }
                    $conn->close()
                ?>
            </select>           
                    
            <br>
                 
            <div class="submit">
                <button type="submit">Đăng kí</button>
            </div>
                    
            </div>
        </form>

    </body>
    <footer>
        <p><a href="/web/admin/home_admin/home_admin.php">Trang chủ</a></p>
    </footer>
</html>