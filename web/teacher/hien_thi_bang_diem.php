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
        <button type="submit">Mở danh sách</button>
        
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
        </tr>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ma_nhom'])) {
            include('../home/home/config.php');
            $ma_nhom = $_POST['ma_nhom'];

            $sql1 = "SELECT ma_nhom, msv, diem_a, diem_b, diem_c FROM bang_diem_nhom WHERE ma_nhom = '$ma_nhom'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                $_SESSION['ma_nhom'] = $ma_nhom;
                $stt = 1;
                while ($row = $result1->fetch_assoc()) {
                    echo '<tr style="height: 30px;">';
                    echo '<td>' . $stt++ . '</td>';
                    echo '<td>' . $row["msv"] . '</td>';
                    echo '<td>' . $row["ho_dem"] . ' ' . $row["ten"] . '</td>';
                    echo '<td>' . $row["diem_a"] . '</td>';
                    echo '<td>' . $row["diem_b"] . '</td>';
                    echo '<td>' . $row["diem_c"] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo "Không có học sinh trong nhóm";
            }
            $conn->close();
        }
        ?>
    </table>

</form>