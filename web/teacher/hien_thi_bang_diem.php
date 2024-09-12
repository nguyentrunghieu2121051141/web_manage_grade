<form method="post" action="hien_thi_bang_diem.php">
    <div class="drop_menu">
        
        <select name="ma_nhom" id="ma_nhom">
            <option value="">Chọn nhóm</option>
            <?php
                include('../home/home/config.php');

                $mgv = $_SESSION['mgv'];

                $sql = "SELECT ma_nhom FROM bang_diem_nhom WHERE mgv = '$mgv'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['ma_nhom'] . '">' . $row['ma_nhom'] . '</option>';    
                    }
                }
            ?>
        </select>
        <button type="submit">Mở bảng điểm</button>
        
    </div>
    <div class="note"><b>Danh sách sinh viên</b></div>
    <table>
        <tr class="header_row">
            <th>STT</th>
            <th>Mã sinh viên</th>
            <th>Sinh viên</th>
            <th>Điểm C</th>
            <th>Điểm B</th>
            <th>Điểm A</th>
            <th>Cập nhật điểm</th>
        </tr>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ma_nhom'])) {
            include('../home/home/config.php');
            $ma_nhom = $_POST['ma_nhom'];

            $sql1 = "SELECT ma_nhom, msv, diem_c, diem_b, diem_a FROM bang_diem_nhom WHERE ma_nhom = '$ma_nhom'";
            $result1 = $conn->query($sql1);
            

            if ($result1->num_rows > 0) {
                $_SESSION['ma_nhom'] = $ma_nhom;
                $stt = 1;
                while ($row = $result1->fetch_assoc()) {
                    $diem_a = $row["diem_a"];
                    $diem_b = $row["diem_b"];
                    $diem_c = $row["diem_c"];
                    $_SESSION['msv'] = $row["msv"];
                    $msv = $_SESSION['msv'];
                    $sql_sinh_vien = "SELECT ho_dem, ten FROM sinh_vien WHERE msv = '$msv'";
                    $result_sinh_vien = $conn->query($sql_sinh_vien);
                    if ($result_sinh_vien->num_rows > 0) {
                        $row = $result_sinh_vien->fetch_assoc();
                        $ho_dem = $row['ho_dem'];
                        $ten = $row['ten'];
          
                        
                    }
                    echo '<tr style="height: 30px;">';
                    echo '<td>' . $stt++ . '</td>';
                    echo '<td>' . $msv . '</td>';
                    echo '<td>' . $ho_dem . ' ' . $ten . '</td>';
                    if (isset($_POST['cap_nhat']) && $_POST['cap_nhat'] == $msv) {
                        echo '<td><input type="text" name="diem_c_' . $msv . '" value="' . $diem_c . '"></td>';
                        echo '<td><input type="text" name="diem_b_' . $msv . '" value="' . $diem_b . '"></td>';
                        echo '<td><input type="text" name="diem_a_' . $msv . '" value="' . $diem_a . '"></td>';
                        echo '<td><button type="submit" name="luu" value="' . $msv . '">Lưu</button></td>';
                    } else {
                        echo '<td>' . $diem_c . '</td>';
                        echo '<td>' . $diem_b . '</td>';
                        echo '<td>' . $diem_a . '</td>';
                        echo '<td><button type="submit" name="cap_nhat" value="' . $msv . '" style = "background-color: #2CA2E6; color: #f0f0f0; cursor: pointer;">Cập nhật</button></td>';
                    }

                    echo '</tr>';
                }
            } else {
                echo "Nhóm chưa nhập điểm";
            }
        }
        ?>
    </table>

</form>