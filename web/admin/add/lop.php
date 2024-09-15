<!DOCTYPE html>
<html>
<title>Nhập lớp</title>
<style>
    .menu ul a #lop{
    background-color: #0F6CBF;
    color: #FFFFFF;
 }
</style>
<body>
    <div class="container">
        <?php
            require "../home_admin/header.php";
        ?>
        <ul class="menu_add">
            <?php
                require "../home_admin/menu.php";
            ?>
            <li class="add">
                <form action="lop.php" method="post">
                    <input type="text" id="ma_lop" name="ma_lop" placeholder="Mã lớp">
                    <input type="number" id="so_luong" name="so_luong" min="20" placeholder="Số lượng sinh viên">
                    <br>
                    <select name="ma_chuyen_nganh" id="ma_chuyen_nganh">
                    <option value="">-- Chọn chuyên ngành --</option>
                    <?php
                        include('../home_admin/config.php');
                        $mgv = mysqli_query($conn, "SELECT * FROM chuyen_nganh");

                        $sql = "SELECT ma_chuyen_nganh, ten_chuyen_nganh FROM chuyen_nganh";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['ma_chuyen_nganh'] . '">' . $row['ten_chuyen_nganh'] . '</option>';
                            }
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <select name="mgv" id="mgv">
                    <option value="">-- Chọn cố vấn --</option>
                    <?php
                        include('../home_admin/config.php');
                        $mgv = mysqli_query($conn, "SELECT * FROM giang_vien");

                        $sql = "SELECT mgv, ho_dem, ten FROM giang_vien";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc())  {
                            echo '<option value="' . $row['mgv'] . '">' . $row['ho_dem'] . $row['ten'] . '</option>';
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
    <?php
        require "../home_admin/footer.php";
    ?>
</body>
</html>

<?php
// session_start();
include('../home_admin/config.php');

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
