<!DOCTYPE html>
<html>


<body>
    <div class="container">
        <?php
            require "../../home_admin/header.php";
            // require "../../home_admin/menu.php";
        ?>
        <main>
        <form method="post" action="">
            
                
                <div class = "filter">
                    <!-- Lọc theo khoa -->
                <select name="ma_khoa" id="ma_khoa">
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
                    // Kiểm tra nếu POST có ma_khoa (tức là đã chọn khoa)
                    if (isset($_POST['ma_khoa']) && !empty($_POST['ma_khoa'])) {
                        $ma_khoa = $_POST['ma_khoa'];
                        $sql_nganh = "SELECT ma_nganh, ten_nganh FROM nganh WHERE ma_khoa = '$ma_khoa'";
                    } else {
                        // Nếu chưa chọn khoa, hiển thị tất cả các ngành
                        $sql_nganh = "SELECT ma_nganh, ten_nganh FROM nganh";
                    }

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
                    // Kiểm tra nếu POST có ma_nganh (tức là đã chọn ngành)
                    if (isset($_POST['ma_nganh']) && !empty($_POST['ma_nganh'])) {
                        $ma_nganh = $_POST['ma_nganh'];
                        $sql_chuyen_nganh = "SELECT ma_chuyen_nganh, ten_chuyen_nganh FROM chuyen_nganh WHERE ma_nganh = '$ma_nganh'";
                    } else {
                        // Nếu chưa chọn ngành, hiển thị tất cả các chuyên ngành
                        $sql_chuyen_nganh = "SELECT ma_chuyen_nganh, ten_chuyen_nganh FROM chuyen_nganh";
                    }

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
                    // Kiểm tra nếu POST có ma_nganh (tức là đã chọn ngành)
                    if (isset($_POST['ma_chuyen_nganh']) && !empty($_POST['ma_chuyen_nganh'])) {
                        $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
                        $sql_lop = "SELECT ma_lop FROM lop WHERE ma_chuyen_nganh = '$ma_chuyen_nganh'";
                    } else {
                        // Nếu chưa chọn ngành, hiển thị tất cả các chuyên ngành
                        $sql_lop = "SELECT ma_lop FROM lop";
                    }

                    $result_lop = $conn->query($sql_lop);

                    if ($result_lop->num_rows > 0) {
                        while($row = $result_lop->fetch_assoc()) {
                            echo '<option value="' . $row['ma_lop'] . '">' . $row['ma_lop'] . '</option>';
                        }
                    }
                    ?>
                </select>
                <button type="submit">Lọc</button>
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
                // Lấy danh sách sinh viên theo lớp
                if (isset($_POST['ma_lop']) && !empty($_POST['ma_lop'])) {
                    $ma_lop = $_POST['ma_lop'];
                    $sql_sinh_vien = "SELECT msv, ho_dem, ten, ma_lop, sdt, email, ngay_sinh, gioi_tinh FROM sinh_vien WHERE ma_lop = '$ma_lop'";
                } 
                // Lấy danh sách sinh viên theo khoa
                // elseif(isset($_POST['ma_khoa']) && !empty($_POST['ma_khoa'])){

                // }
                else {
                // Lấy danh sách toàn bộ sinh viên
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
                        echo '<td id="task"><a href="sign_up.php"><i class="fa-solid fa-plus"></i></a><i class="fa-solid fa-pen" onclick="myFunction(this)"></i><a href="delete.php?ma_khoa=' . $msv . '"><i class="fa-solid fa-trash"></i></a></td>';
                        
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
    
    <?php
        require "../../home_admin/footer.php";
    ?>
    
</body>
</html>