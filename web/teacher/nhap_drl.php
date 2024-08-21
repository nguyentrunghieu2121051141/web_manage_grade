<?php
session_start();
if (!isset($_SESSION['mgv'])) {
    header("Location: /web/home/login/login.php");
    exit();
}

$mgv = $_SESSION['mgv'];
?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cổng thông tin Đào tạo đại học</title>
</head>
<body>
    <div class="container">
        <header>
            <ul>
            <li>Tài khoản <?php echo $_SESSION['mgv']; ?></li>
                <li>
                    <?php 
                        include('config.php');

                        $mgv = $_SESSION['mgv'];
                        $sql = "SELECT mgv, ho_dem, ten FROM giang_vien WHERE mgv = '$mgv'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "Họ và tên: ". $row["ho_dem"]. " " . $row["ten"] ;
                            }
                        } else {
                            echo "Không tìm được tài khoản";
                        }

                        $conn->close();
                    ?>
                </li>
                <li><a href="/web/home/login/logout.php">Đăng xuất</a></li>
            </ul>
        </header>
        <br>

        <br>
        <form method="post" action="">
            <table>
                <tr>
                    <th><select name="ma_lop" id="ma_lop">
                        <option value="ma_lop">-- Chọn lớp --</option>
                            <?php
                                include('config.php');
                    
                                $mgv = $_SESSION['mgv'];

                                $sql = "SELECT ma_lop FROM lop where mgv = '$mgv'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'  . $row['ma_lop']. '">' . $row['ma_lop'] . '</option>';
                           
                                    }
                                }
                            ?>
                        </select>
                    </th>
                    <th><button type="submit">Mở danh sách</button></th>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Mã sinh viên</th>
                    <th>Sinh viên</th>
                    <th style = "width: 75px;">Điểm</th>
                </tr>
                <tr>

                    <?php 
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ma_lop'])) {
                        include('config.php');
                        $ma_lop = $_POST['ma_lop'];

                        $sql1 = "SELECT ma_lop, msv, ho_dem, ten FROM danh_sach_lop WHERE ma_lop = '$ma_lop'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            $_SESSION['ma_lop'] = $ma_lop;
                            $stt = 1;
                            while($row = $result1->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $stt++ . '</td>';
                                echo '<td>' . $row["msv"] . '</td>';
                                echo '<td>' . $row["ho_dem"] . ' ' . $row["ten"] . '</td>';
                                echo '<td><input id = "drl" name = "drl" type = "number" min = "0" max = "100" style = "outline: none; width: 70px;"></td>';
                                echo '</tr>';
                            }
                            
                        } else {
                            echo "Lớp chưa có sinh viên";
                        }
                        $msv = $_POST['msv'];
                        $drl = $_POST['drl'];
                        $sql2 = "INSERT INTO diem_ren_luyen (msv, drl) VALUES ('$msv', '$drl')";
                        if ($conn->query($sql1) === TRUE and $conn->query($sql2) === TRUE) {
                            echo "Thành công ";
                        } else {
                            echo "Error: " . $sql1 . $sql2 . "<br>" . $conn->error;
                        }
                    }
                        $conn->close();
                    ?>
                </tr>
            </table>
            <button class="button" type="submit"><b>Nhập điểm</b></button>
        </form>
    </div>
    <footer>
        <p>Copyright © 2020 Trường Đại học Mỏ - Địa chất
            Version: MOHN-2024.07B.33
            Design by 2121051141@student.humg.edu.vn</p>
    </footer>
</body>
</html>
