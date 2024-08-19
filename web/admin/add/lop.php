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
    <title>Nhập lớp</title>
</head>
<style>
    .menu ul a .lop{
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
                <a href="/web/admin/add/nganh.php"><li class = "nganh">Ngành</li></a>
                <a href="/web/admin/add/chuyen_nganh.php"><li>Chuyên ngành</li></a>
                <a href="/web/admin/add/hoc_phan.php"><li>Học phần</li></a>
                <a href="/web/admin/add/lop.php"><li class = "lop">Lớp</li></a>
                <a href="/web/admin/add/nhom_hoc_phan.php"><li>Nhóm học phần</li></a>
                </ul>
            </li>
            <li class="add">
                <form action="lop.php" method="post">
                    <input type="text" id="ma_lop" name="ma_lop" placeholder="Mã lớp">
                    <input type="number" id="so_luong" name="so_luong" min="20" placeholder="Số lượng sinh viên">
                    <br>
                    <select name="ma_chuyen_nganh" id="ma_chuyen_nganh">
                    <option value="">-- Chọn chuyên ngành --</option>
                    <?php
                        include('config.php');
                        $ma_chuyen_nganh = mysqli_query($conn, "SELECT * FROM chuyen_nganh");

                        if (!$ma_chuyen_nganh) {
                            die("Lỗi khi truy vấn dữ liệu: " . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_array($ma_chuyen_nganh)) {
                            echo '<option value="' . $row['ma_chuyen_nganh'] . '">' . $row['ten_chuyen_nganh'] . '</option>';
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <select name="mgv" id="mgv">
                    <option value="">-- Chọn cố vấn --</option>
                    <?php
                        include('config.php');
                        $mgv = mysqli_query($conn, "SELECT * FROM giang_vien");

                        if (!$mgv) {
                            die("Lỗi khi truy vấn dữ liệu: " . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_array($mgv)) {
                            echo '<option value="' . $row['mgv'] . '">' . $row['ho_dem'] . $row['ten'] . '</option>';
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

    $ma_lop = $_POST['ma_lop'];
    $mgv = $_POST['mgv'];
    $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
    $so_luong = $_POST['so_luong'];

    if (empty($_POST['ma_lop']) || empty($_POST['mgv']) || empty($_POST['so_luong']) || empty($_POST['ma_chuyen_nganh'])) {
        echo'Không được để trống';
    } else{
        $sql = "SELECT ma_lop FROM lop WHERE ma_lop = '$ma_lop'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Đã tồn tại";
        } else {
            $sql = "INSERT INTO lop (ma_lop, mgv, ma_chuyen_nganh, so_luong) 
            VALUES ('$ma_lop', '$mgv', '$ma_chuyen_nganh', '$so_luong')";

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
