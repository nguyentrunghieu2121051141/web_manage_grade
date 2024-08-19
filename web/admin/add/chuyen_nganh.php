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
    <title>Nhập chuyên ngành</title>
</head>
<style>
    .menu ul a .chuyen_nganh{
    background-color: #0F6CBF;
    color: #FFFFFF;
 }
</style>
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
        <ul class="menu_add">
            <li class="menu">
                <ul>
                <a href="/web/admin/add/khoa.php"><li>Khoa</li></a>
                <a href="/web/admin/add/nganh.php"><li>Ngành</li></a>
                <a href="/web/admin/add/chuyen_nganh.php"><li class = "chuyen_nganh">Chuyên ngành</li></a>
                <a href="/web/admin/add/hoc_phan.php"><li>Học phần</li></a>
                <a href="/web/admin/add/lop.php"><li>Lớp</li></a>
                <a href="/web/admin/add/nhom_hoc_phan.php"><li>Nhóm học phần</li></a>
                </ul>
            </li>
            <li class="add">
                <form action="chuyen_nganh.php" method="post">
                    <input type="text" id="ma_chuyen_nganh" name="ma_chuyen_nganh" placeholder="Mã chuyên ngành">
                    <input type="text" id="ten_chuyen_nganh" name="ten_chuyen_nganh" placeholder="Tên chuyên ngành">
                    <br>
                    <select name="ma_nganh" id="ma_nganh">
                    <option value="">-- Chọn ngành --</option>
                    <?php
                        include('config.php');
                        $sql = "SELECT ma_nganh, ten_nganh FROM nganh";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ma_nganh'] . '">' . $row['ten_nganh'] . '</option>';
                            }
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <button type="submit">Nhập</button>
                </form>
            </li>
        </ul>
    </div>
    <footer>
        <p>Bạn đang đăng nhập với tài khoản  <?php echo $_SESSION['id_admin']?><a href="logout.php">(Thoát)</a></p>
    </footer>
</body>
</html>

<?php
// session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
    $ten_chuyen_nganh = $_POST['ten_chuyen_nganh'];
    $ma_nganh = $_POST['ma_nganh'];

    if (empty($_POST['ma_chuyen_nganh']) || empty($_POST['ten_chuyen_nganh']) || empty($_POST['ma_nganh'])) {
        echo'Không được để trống';
    } else{
        $sql = "SELECT ma_chuyen_nganh FROM chuyen_nganh WHERE ma_chuyen_nganh = '$ma_chuyen_nganh'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Đã tồn tại";
        } else {
            $sql = "INSERT INTO chuyen_nganh (ma_chuyen_nganh, ten_chuyen_nganh, ma_nganh) 
            VALUES ('$ma_chuyen_nganh', '$ten_chuyen_nganh', '$ma_nganh')";

            if ($conn->query($sql) === TRUE) {
                echo "Dữ liệu đã được thêm thành công!";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } 
    }
}


$conn->close();
?>
