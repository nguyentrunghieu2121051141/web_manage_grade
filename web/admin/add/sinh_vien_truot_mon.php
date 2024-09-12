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
        
        <ul class="failure">
            <?php
                require "../home_admin/menu.php";
            ?>
            <li class="failure_add">
                <h2><i class="fa-solid fa-gears"></i>Thống kê sinh viên trượt môn</h2>
                <hr>
                <form action="sinh_vien_truot_mon.php" method="post">

                    <select name="ma_hoc_phan" id="ma_hoc_phan">
                    <option value="">  Chọn học phần</option>
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
                    
                    <button type="submit">Chọn</button>
                    <br>
                    <br>
                    <hr>
                    <table>
                    <tr id="header_row">
                        <th>STT</th>
                        <th>Mã học phần</th>
                        <th>Mã sinh viên</th>
                        <th>Sinh viên</th>
                    </tr>
                    <?php  
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ma_hoc_phan'])) {
                            include('../home_admin/config.php');
                            $ma_hoc_phan = $_POST['ma_hoc_phan'];

                           
                            $sql_diem = "SELECT ma_hoc_phan, msv, diem_tb_10, diem_tb_4, diem_tb_chu FROM diem_hoc_phan WHERE ma_hoc_phan = '$ma_hoc_phan'";
                            $result_diem = $conn->query($sql_diem);

                            if ($result_diem->num_rows > 0) {
                                
                                $sql_truot = "SELECT ma_hoc_phan, msv FROM sinh_vien_truot_mon WHERE ma_hoc_phan = '$ma_hoc_phan'";
                                $result_truot = $conn->query($sql_truot);

                                if ($result_truot->num_rows > 0) {
                                    $_SESSION['ma_hoc_phan'] = $ma_hoc_phan;
                                    $stt = 1;
                                    while ($row = $result_truot->fetch_assoc()) {
                                        echo '<tr id = "row" style="height: 30px;">';     
                                        echo '<td>' . $stt++ . '</td>';
                                        echo '<td>' . $row["ma_hoc_phan"] . '</td>';
                                        $msv = $row["msv"];
                                        $sql_sinh_vien = "SELECT msv, ho_dem, ten FROM sinh_vien WHERE msv = '$msv'";
                                        $result_sinh_vien = $conn->query($sql_sinh_vien);

                                        if ($result_sinh_vien->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result_sinh_vien->fetch_assoc()) {
                                                $ho_dem = $row["ho_dem"];
                                                $ten = $row["ten"];
                                            }
                                        }
                                        
                                        echo '<td>' . $msv . '</td>';
                                        echo '<td>' . $ho_dem . " " . $ten . '</td>';
                                        echo '</tr>';
                                    }

                                } else {
                                   
                                    while ($row = $result_diem->fetch_assoc()) {
                                        $msv = $row["msv"];
                                        $diem_tb_10 = $row["diem_tb_10"];

                                        if ($diem_tb_10 < 4) {
                                            $sql_diem_liet = "INSERT INTO sinh_vien_truot_mon (ma_hoc_phan, msv) VALUES ('$ma_hoc_phan', '$msv')";
                                            $conn->query($sql_diem_liet);
                                        }
                                    }
                                  
                                    $sql_truot = "SELECT ma_hoc_phan, msv FROM sinh_vien_truot_mon WHERE ma_hoc_phan = '$ma_hoc_phan'";
                                    $result_truot = $conn->query($sql_truot);
                                    if ($result_truot->num_rows > 0) {
                                        $_SESSION['ma_hoc_phan'] = $ma_hoc_phan;
                                        $stt = 1;
                                        while ($row = $result_truot->fetch_assoc()) {
                                            echo '<tr id = "row" style="height: 30px;">';     
                                            echo '<td>' . $stt++ . '</td>';
                                            echo '<td>' . $row["ma_hoc_phan"] . '</td>';
                                            echo '<td>' . $row["msv"] . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                } 
                            }
                        }
                    ?>

                    </table>
                </form>
            </li>
        </ul>
    </div>
    <?php
        require "../home_admin/footer.php";
    ?>
</body>
</html>