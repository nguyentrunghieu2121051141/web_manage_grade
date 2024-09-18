<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<style>
    .add_student{
        text-decoration: none; 
        background-color: #219DE5; 
        color: white; 
        display: inline-block; 
        width: 100px; 
        height: 50px; 
        border-radius: 5px;
        border: 2px solid grey;
        text-align: center; 
        line-height: 50px;
    }
</style>
<body>
    <div class="container">
        <?php
            require "../../home_admin/header.php";
            // require "../../home_admin/menu.php";
        ?>
        <main>
        <form method="post" action="">
            
                
        <div class = "filter">
        <select name="ma_khoa" id="ma_khoa" >
            <option value="">Lọc theo khoa</option>
            <?php
            include('../home_admin/config.php');
            $sql = "SELECT ma_khoa, ten_khoa FROM khoa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['ma_khoa'] . '">' . $row['ten_khoa'] . '</option>';
                }
            }
            ?>
        </select>      
        <button type="submit">Lọc</button>

        <!-- Lọc theo ngành -->
        <select name="ma_nganh" id="ma_nganh">
            <option value="">Lọc theo ngành</option>
            <?php

            $sql_nganh = "SELECT ma_nganh, ten_nganh FROM nganh"; 
            $result_nganh = $conn->query($sql_nganh);

            if ($result_nganh->num_rows > 0) {
                while($row = $result_nganh->fetch_assoc()) {
                    echo '<option value="' . $row['ma_nganh'] . '">' . $row['ten_nganh'] . '</option>';
                }
            }
            ?>
        </select>
        <button type="submit">Lọc</button>
            
        <!-- Lọc theo chuyên ngành -->
        <select name="ma_chuyen_nganh" id="ma_chuyen_nganh">
            <option value="">Lọc theo chuyên ngành</option>
            <?php
            
            $sql_chuyen_nganh = "SELECT ma_chuyen_nganh, ten_chuyen_nganh FROM chuyen_nganh";
        
            $result_chuyen_nganh = $conn->query($sql_chuyen_nganh);
            if ($result_chuyen_nganh->num_rows > 0) {
                while($row = $result_chuyen_nganh->fetch_assoc()) {
                    echo '<option value="' . $row['ma_chuyen_nganh'] . '">' . $row['ten_chuyen_nganh'] . '</option>';
                }
            }
            ?>
        </select>
        <button type="submit">Lọc</button>
            
            <!-- Lọc theo lớp -->
        <select name="ma_lop" id="ma_lop">
            <option value="">Lọc theo lớp</option>
            <?php
                
            $sql_lop = "SELECT ma_lop FROM lop";

            $result_lop = $conn->query($sql_lop);

            if ($result_lop->num_rows > 0) {
                while($row = $result_lop->fetch_assoc()) {
                    echo '<option value="' . $row['ma_lop'] . '">' . $row['ma_lop'] . '</option>';
                }
            }
            ?>
        </select>
        <button type="submit">Lọc</button>
        <a href="sign_up.php" class="add_student" ><i class="fa-solid fa-plus" style="color: white;"></i></a>

            </div>
            
            <table style = "margin_top = 100px">
            <!-- Mở danh sách sinh viên -->
            <caption class="note"><b>Danh sách sinh viên</b></caption>
            <tr id="header_row">
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Sinh viên</th>
                <th>Lớp</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Tác vụ</th>
            </tr>
            <?php
                
                // Lấy danh sách sinh viên theo khoa
                if (isset($_POST['ma_khoa']) && !empty($_POST['ma_khoa'])) {
                    $ma_khoa = $_POST['ma_khoa'];
                    $sql_sinh_vien = "SELECT msv, ho_dem, ten, ma_lop, sdt, email, ngay_sinh, gioi_tinh FROM sinh_vien WHERE msv IN 
                    (SELECT msv FROM danh_sach_sinh_vien_khoa WHERE ma_khoa = '$ma_khoa')";
                }

                // Lấy danh sách sinh viên theo ngành
                elseif (isset($_POST['ma_nganh']) && !empty($_POST['ma_nganh'])) {
                    $ma_nganh = $_POST['ma_nganh'];
                    $sql_sinh_vien = "SELECT msv, ho_dem, ten, ma_lop, sdt, email, ngay_sinh, gioi_tinh FROM sinh_vien WHERE msv IN 
                    (SELECT msv FROM danh_sach_sinh_vien_nganh WHERE ma_nganh = '$ma_nganh')";
                    
                }

                // Lấy danh sách sinh viên theo ngành
                elseif (isset($_POST['ma_chuyen_nganh']) && !empty($_POST['ma_chuyen_nganh'])) {
                    $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
                    $sql_sinh_vien = "SELECT msv, ho_dem, ten, ma_lop, sdt, email, ngay_sinh, gioi_tinh FROM sinh_vien WHERE msv IN  
                    (SELECT msv FROM danh_sach_sinh_vien_chuyen_nganh WHERE ma_chuyen_nganh = '$ma_chuyen_nganh')";
                    
                    
                }

                // Lấy danh sách sinh viên theo lớp
                elseif (isset($_POST['ma_lop']) && !empty($_POST['ma_lop'])) {
                    $ma_lop = $_POST['ma_lop'];
                    $sql_sinh_vien = "SELECT msv, ho_dem, ten, ma_lop, sdt, email, ngay_sinh, gioi_tinh FROM sinh_vien WHERE ma_lop = '$ma_lop'";
                } 

                // Lấy danh sách toàn bộ sinh viên
                else {
                    $sql_sinh_vien = "SELECT msv, ho_dem, ten, ma_lop, sdt, email, ngay_sinh, gioi_tinh FROM sinh_vien";
                }

                $result_sinh_vien = $conn->query($sql_sinh_vien);

                if ($result_sinh_vien->num_rows > 0) {
                    $stt = 1;
                    while($row = $result_sinh_vien->fetch_assoc()) {
                        $msv = $row["msv"];
                        $ho_dem = $row["ho_dem"];
                        $ten = $row["ten"];
                        $ma_lop = $row["ma_lop"];
                        $sdt = $row["sdt"];
                        $email = $row["email"];
                        $ngay_sinh = $row["ngay_sinh"];
                        $gioi_tinh = $row["gioi_tinh"];
                        echo '<tr id="row">';
                        echo '<td style="width: 50px;">' . $stt++ . '</td>';
                        echo '<td style="width: 100px;">' . $msv . '</td>';
                        echo '<td style="width: 235px;">' . $ho_dem  . " " . $ten . '</td>';
                        echo '<td>' . $ma_lop . '</td>';
                        echo '<td>' . $sdt . '</td>';
                        echo '<td>' . $email . '</td>';
                        echo '<td>' . $ngay_sinh . '</td>';
                        echo '<td>' . $gioi_tinh . '</td>';


                        //Tác vụ
                        echo '<td id="task"><a href="/web/admin/sign_up/sign_up_student/update_student.php?msv=' . $msv . '""><i class="fa-solid fa-pen"></i></a><a href="../delete.php?msv=' . $msv . '"><i class="fa-solid fa-trash"></i></a></td>';
                        
                        echo '</tr>';
                    }
                } else {
                    echo "0 results";
                }
            ?>
            </table>
            <div class = "space"></div>
        </form>
        </main>
    </div>
    <script>
        $(document).ready(function(){
            $('#ma_khoa').change(function(){
            var ma_khoa = $('#ma_khoa').val(); 
        
            $.ajax({
                type: 'POST',
                url: 'fetch.php',
                data: {ma_khoa:ma_khoa},  
                success: function(data)  
                {
                    $('#ma_nganh').html(data);
                }
                });
            });

            $('#ma_nganh').change(function(){
            var ma_nganh = $('#ma_nganh').val(); 
        
            $.ajax({
                type: 'POST',
                url: 'fetch.php',
                data: {ma_nganh:ma_nganh},  
                success: function(data)  
                {
                    $('#ma_chuyen_nganh').html(data);
                }
                });
            });

            $('#ma_chuyen_nganh').change(function(){
            var ma_chuyen_nganh = $('#ma_chuyen_nganh').val(); 
        
            $.ajax({
                type: 'POST',
                url: 'fetch.php',
                data: {ma_chuyen_nganh:ma_chuyen_nganh},  
                success: function(data)  
                {
                    $('#ma_lop').html(data);
                }
                });
            });
        });
        
    </script> 
    <?php
        require "../../home_admin/footer.php";
    ?>
    
</body>
</html>