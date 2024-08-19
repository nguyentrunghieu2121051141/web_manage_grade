<?php
session_start();
if (!isset($_SESSION['id_admin'])) {
    header("Location: /web/admin/home_admin/login.php");
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
    <title>Nhập ngành</title>
</head>
<style>
    .menu ul a .nganh{
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
                <a href="/web/admin/add/nganh.php"><li class = "nganh">Ngành</li></a>
                <a href="/web/admin/add/chuyen_nganh.php"><li>Chuyên ngành</li></a>
                <a href="/web/admin/add/hoc_phan.php"><li>Học phần</li></a>
                <a href="/web/admin/add/lop.php"><li>Lớp</li></a>
                <a href="/web/admin/add/nhom_hoc_phan.php"><li>Nhóm học phần</li></a>
                </ul>
            </li>
            <li class="add">
                <form action="nganh.php" method="post">
                    <input type="text" id="ma_nganh" name="ma_nganh" placeholder="Mã ngành">
                    <input type="text" id="ten_nganh" name="ten_nganh" placeholder="Tên ngành">
                    <br>
                    <select name="ma_khoa" id="ma_khoa">
                    <option value="">-- Chọn khoa --</option>
                    <?php
                        include('config.php');
                        $sql = "SELECT ma_khoa, ten_khoa FROM khoa";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ma_khoa'] . '">' . $row['ten_khoa'] . '</option>';
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

    $ma_nganh = $_POST['ma_nganh'];
    $ten_nganh = $_POST['ten_nganh'];
    $ma_khoa = $_POST['ma_khoa'];

    if (empty($_POST['ma_nganh']) || empty($_POST['ten_nganh']) || empty($_POST['ma_khoa'])) {
        echo'Không được để trống';
    } else{
        $sql = "SELECT ma_nganh FROM nganh WHERE ma_nganh = '$ma_nganh'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Đã tồn tại";
        } else {
            $sql = "INSERT INTO nganh (ma_nganh, ten_nganh, ma_khoa) 
            VALUES ('$ma_nganh', '$ten_nganh', '$ma_khoa')";

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
