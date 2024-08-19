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
    <title>Nhập nhóm học phần</title>
</head>
<style>
    .menu ul a .nhom_hoc_phan{
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
                <a href="/web/admin/add/nganh.php"><li>Ngành</li></a>
                <a href="/web/admin/add/chuyen_nganh.php"><li>Chuyên ngành</li></a>
                <a href="/web/admin/add/hoc_phan.php"><li>Học phần</li></a>
                <a href="/web/admin/add/lop.php"><li>Lớp</li></a>
                <a href="/web/admin/add/nhom_hoc_phan.php"><li class = "nhom_hoc_phan">Nhóm học phần</li></a>
                </ul>
            </li>
            <li class="add">
                <form action="nhom_hoc_phan.php" method="post">
                    <input type="text" id="ma_nhom" name="ma_nhom" placeholder="Mã nhóm">
                    <br>
                    <br>
                    <select name="ma_hoc_phan" id="ma_hoc_phan">
                    <option value="">-- Chọn học phần --</option>
                    <?php
                        include('config.php');
                        $ma_hoc_phan = mysqli_query($conn, "SELECT * FROM hoc_phan");

                        if (!$ma_hoc_phan) {
                            die("Lỗi khi truy vấn dữ liệu: " . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_array($ma_hoc_phan)) {
                            echo '<option value="' . $row['ma_hoc_phan'] . '">' . $row['ten_hoc_phan'] . '</option>';
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <select name="ma_lop" id="ma_lop">
                    <option value="">-- Chọn lớp --</option>
                    <?php
                        include('config.php');
                        $ma_lop = mysqli_query($conn, "SELECT * FROM lop");

                        if (!$ma_lop) {
                            die("Lỗi khi truy vấn dữ liệu: " . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_array($ma_lop)) {
                            echo '<option value="'  . $row['ma_lop']. '">' . $row['ma_lop'] . '</option>';
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

    $ma_nhom = $_POST['ma_nhom'];
    $ma_hoc_phan = $_POST['ma_hoc_phan'];
    $mgv = $_POST['mgv'];
    $ma_lop = $_POST['ma_lop'];

    if (empty($_POST['ma_hoc_phan']) || empty($_POST['mgv']) || empty($_POST['ma_nhom']) || empty($_POST['ma_lop'])) {
        echo'Không được để trống';
    } else{
        $sql = "SELECT ma_nhom FROM nhom_hoc_phan WHERE ma_nhom = '$ma_nhom'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Đã tồn tại";
        } else {
            $sql = "INSERT INTO nhom_hoc_phan (ma_nhom, mgv, ma_hoc_phan, ma_lop) 
            VALUES ('$ma_nhom', '$mgv', '$ma_hoc_phan', '$ma_lop')";

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
