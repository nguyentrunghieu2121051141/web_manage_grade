<!DOCTYPE html>
<html>
<title>Nhập học phần</title>
<style>
    .menu ul a #nhom_hoc_phan{
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
                <form action="nhom_hoc_phan.php" method="post">
                    <input type="text" id="ma_nhom" name="ma_nhom" placeholder="Mã nhóm">
                    <br>
                    <br>
                    <select name="ma_hoc_phan" id="ma_hp">
                    <option value="">-- Chọn học phần --</option>
                    <?php
                        include('../home_admin/config.php');
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
                        include('../home_admin/config.php');
                        $mgv = mysqli_query($conn, "SELECT * FROM lop");

                        $sql = "SELECT ma_lop FROM lop";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="'  . $row['ma_lop']. '">' . $row['ma_lop'] . '</option>';
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
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['mgv'] . '">' . $row['ho_dem'] . $row['ten'] . '</option>';
                            }
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <input type="number" id="so_luong" name="so_luong" placeholder="Số lượng sinh viên">
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
