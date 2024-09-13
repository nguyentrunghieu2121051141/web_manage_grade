<!DOCTYPE html>
<html>
<link rel="stylesheet" href="home_teacher.css">
<body>
    <div class="container">
        <?php
            require "header.php";
        ?>
        <br>

        <br>
        <form method="post" action="">
            
                <?php
                    require "hien_thi_bang_diem.php";
                    $sql_diem = "SELECT msv, ma_hoc_phan, diem_tb_10 FROM diem_hoc_phan";
                    $result_diem = $conn->query($sql_diem);
                    if ($result_diem->num_rows > 0) {
                        while ($row = $result_diem->fetch_assoc()){
                            $diem_tb_10 = $row['diem_tb_10'];
                            $msv = $row['msv'];
                            $ma_hoc_phan = $row['ma_hoc_phan'];
                            if ($diem_tb_10 >= 4.0) {
                                $sql_xoa_sinh_vien = "DELETE FROM sinh_vien_truot_mon WHERE msv = '$msv' AND ma_hoc_phan = '$ma_hoc_phan'";                              
                            } 
                        }
                    }
                ?>
        </form>
    </div>
    <?php
        require "menu.php";
    ?>
    <?php
        require "footer.php";

    ?>
</body>
</html>