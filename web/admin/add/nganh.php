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
            <h1><a href="/web/admin/home_admin/home_admin.php"><i class="fa-solid fa-house"></i> Trang chủ</a></h1>
            <h1>Tài khoản <?php echo $_SESSION['id_admin']?></h1>
        </header>
        <ul class="menu_add">
            <li class="menu">
                <ul>
                    <a href="/web/admin/add/khoa.php"><li>Khoa</li></a>
                    <a href="/web/admin/add/nganh.php"><li class="nganh" >Ngành</li></a>
                    <li>Chuyên ngành</li>
                    <li>Học phần</li>
                    <li>Giảng viên</li>
                    <li>Lớp</li>
                    <li>Nhóm học phần</li>
                    <li>Sinh viên</li>
                </ul>
            </li>
            <li class="add">
                <form action="nganh.php" method="post">
                    <input type="text" id="ma_nganh" name="ma_nganh" placeholder="Nhập mã ngành">
                    <input type="text" id="ten_nganh" name="ten_nganh" placeholder="Nhập tên ngành">
                    <br>
                    <select name="ma_khoa" id="ma_khoa">
                    <option value="">-- Chọn khoa --</option>
                    <?php
                        include('config.php');
                        $ma_khoa = mysqli_query($conn, "SELECT * FROM khoa");

                        if (!$ma_khoa) {
                            die("Lỗi khi truy vấn dữ liệu: " . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_array($ma_khoa)) {
                            echo '<option value="' . $row['ma_khoa'] . '">' . $row['ten_khoa'] . '</option>';
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
    <ul>
        <li>Bạn đang đăng nhập với tên  <?php echo $_SESSION['id_admin']?><a href="/web/admin/home_admin/logout.php">(Thoát)</a></li>
    </ul>
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

    if (empty($_POST['ma_nganh']) && empty($_POST['ten_nganh'])) {
        echo'Không được để trống';
    } else{

        $sql = "INSERT INTO nganh (ma_nganh, ten_nganh, ma_khoa) 
        VALUES ('$ma_nganh', '$ten_nganh', '$ma_khoa')";

        if(isset($_POST['ma_nganh'])){
            echo "Đã tồn tại, vui lòng chọn giá trị khác!";
        }
        else{
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
