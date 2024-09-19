<?php
include('../home_admin/config.php');
if (isset($_GET['ma_nganh'])) {
    $ma_nganh = $_GET['ma_nganh'];
    if (!empty($_POST['ma_nganh']) || !empty($_POST['ten_nganh']) || !empty($_POST['ma_khoa'])) {
        $ten_nganh = $_POST['ten_nganh'];
        $ma_khoa = $_POST['ma_khoa'];
        $ma_nganh = $_POST['ma_nganh'];
  
        $sql_update_nganh = "UPDATE nganh SET ten_nganh = '$ten_nganh', ma_khoa = '$ma_khoa' WHERE ma_nganh = '$ma_nganh'";

        if ($conn->query($sql_update_nganh) === TRUE ) {
            
            header("Location: nganh.php");
            exit();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } 
    
}
$sql_nganh = "SELECT ten_nganh, ma_khoa  FROM nganh WHERE ma_nganh = '$ma_nganh'";
$result_nganh = $conn->query($sql_nganh);
if ($result_nganh->num_rows > 0) {
    while($row = $result_nganh->fetch_assoc()) {
        $ten_nganh = $row["ten_nganh"];
        $ma_khoa = $row["ma_khoa"];
    }
}

?>
<!DOCTYPE html>
<html><title>Nhập ngành</title>

<style>
    .menu ul a #nganh{
    background-color: #0F6CBF;
    color: #FFFFFF;
 }
 .input_nganh{
    margin-left: 64px;
 }
</style>
<body>
    <div class="container">
        <?php
            require "../home_admin/header.php";
        ?>
        <div class="menu_add">
            <!-- <?php require "../home_admin/menu.php"; ?> -->
            <li class="add">
                <form action="update_nganh.php" method="post">
                    <h3>Cập nhật ngành: <?php echo $ma_nganh; ?></h3> 
                    <div class = "input_nganh">
                        <input type="text" id="ten_nganh" name="ten_nganh" placeholder="Tên ngành" value = "<?php echo $ten_nganh; ?>">
                        <br>
                        <select name="ma_khoa" id="ma_khoa">
                            <option value="<?php echo $ma_khoa; ?>">-- Chọn khoa --</option>
                            <?php
                                // include('../home_admin/config.php');
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
                    </div>
                    <br>
                    <br>
                    <button type="submit">Cập nhật</button>
                </form>
            </li>
        </div>
    </div>
    <?php
        require "../home_admin/footer.php";
    ?>
</body>
</html>

