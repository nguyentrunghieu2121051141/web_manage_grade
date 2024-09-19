<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="app.js"></script>
<title>Nhập chuyên ngành</title>
<style>
    .menu ul a #chuyen_nganh{
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
                <form action="chuyen_nganh.php" method="post">
                    <input type="text" id="ma_chuyen_nganh" name="ma_chuyen_nganh" placeholder="Mã chuyên ngành">
                    <input type="text" id="ten_chuyen_nganh" name="ten_chuyen_nganh" placeholder="Tên chuyên ngành">
                    <br>
                    <select name="ma_nganh" id="ma_nganh">
                    <option value="">-- Chọn ngành --</option>
                    <?php
                        include('../home_admin/config.php');
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
    <?php
        require "../home_admin/footer.php";
    ?>
</body>
</html>

<?php
// session_start();
include('../home_admin/config.php');

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
