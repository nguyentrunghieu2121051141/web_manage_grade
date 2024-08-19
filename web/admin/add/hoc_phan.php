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
    <title>Nhập học phần</title>
</head>
<style>
    .menu ul a .hoc_phan{
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
                    <a href="/web/admin/add/nganh.php"><li  >Ngành</li></a>
                    <a href="/web/admin/add/chuyen_nganh.php"><li>Chuyên ngành</li></a>
                    <a href="/web/admin/add/hoc_phan.php"><li class="hoc_phan">Học phần</li></a>
                    <a href="/web/admin/add/lop.php"><li>Lớp</li></a>
                    <a href="/web/admin/add/nhom_hoc_phan.php"><li>Nhóm học phần</li></a>
                </ul>
            </li>
            <li class="add">
                <form action="hoc_phan.php" method="post">
                    <input type="text" id="ma_hoc_phan" name="ma_hoc_phan" placeholder="Mã học phần">
                    <input type="text" id="ten_hoc_phan" name="ten_hoc_phan" placeholder="Tên học phần">
                    <input type="number" id="so_tin_chi" name="so_tin_chi" placeholder="Số tín chỉ" min = "1">
                    <br>
                    <select name="ma_nganh" id="ma_nganh">
                    <option value="">-- Chọn ngành --</option>
                    <<?php
                        include('config.php');
                        $sql = "SELECT ma_nganh, ten_nganh FROM nganh";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc())  {
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

    $ma_hoc_phan = $_POST['ma_hoc_phan'];
    $ten_hoc_phan = $_POST['ten_hoc_phan'];
    $so_tin_chi = $_POST['so_tin_chi'];
    $ma_nganh = $_POST['ma_nganh'];

    if (empty($_POST['ma_hoc_phan']) || empty($_POST['ten_hoc_phan']) || empty($_POST['so_tin_chi']) || empty($_POST['ma_nganh'])) {
        echo'Không được để trống';
    } else{
        $sql = "SELECT ma_hoc_phan FROM hoc_phan WHERE ma_hoc_phan = '$ma_hoc_phan'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Đã tồn tại";
        } else {
            $sql = "INSERT INTO hoc_phan (ma_hoc_phan, ten_hoc_phan, so_tin_chi, ma_nganh) 
            VALUES ('$ma_hoc_phan', '$ten_hoc_phan', '$so_tin_chi', '$ma_nganh')";

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
