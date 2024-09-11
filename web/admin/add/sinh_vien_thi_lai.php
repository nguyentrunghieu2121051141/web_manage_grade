<!DOCTYPE html>
<html>
<title>Nhập học phần</title>
<style>
    .menu ul a .nhom_hoc_phan{
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
                <form action="sinh_vien_thi_lai.php" method="post">

                    <br>
                    <br>
                    <select name="ma_hoc_phan" id="ma_hoc_phan">
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
                    
                    <br>
                    <br>
                    <button type="submit">Chọn</button>
                    <?php 
                    
                        echo '<table>';
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ma_hoc_phan'])) {
                            include('../home_admin/config.php');
                            $ma_hoc_phan = $_POST['ma_hoc_phan'];

                            $sql1 = "SELECT ma_hoc_phan, msv, diem_tb_10, diem_tb_4, diem_tb_chu FROM diem_hoc_phan WHERE ma_hoc_phan = '$ma_hoc_phan'";
                            $result1 = $conn->query($sql1);

                            if ($result1->num_rows > 0) {
                                
                                while ($row = $result1->fetch_assoc()) {
                                    $msv = $row["msv"];
                                    $ma_hoc_phan = $row["ma_hoc_phan"];
                                    $diem_tb_10 = $row["diem_tb_10"];
                                    if ($diem_tb_10 < 4) {
                                        $diem_liet = $diem_tb_10;
                                      
                                        $sql_diem_liet = "INSERT INTO sinh_vien_truot_mon (ma_hoc_phan, msv) VALUES ('$ma_hoc_phan', '$msv')";
                                        if ($conn->query($sql_diem_liet) === TRUE) {
                                            
                                        } 
                                        
                                    }
                                    
                                    
                                }
                            } 
                        }
                        echo '</table>';
                    ?>
    
                </form>
            </li>
        </ul>
    </div>
    <?php
        require "../home_admin/footer.php";
    ?>
</body>
</html>


