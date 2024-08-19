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
        <table>
            <tr>
                <th><select name="ma_lop" id="ma_lop">
                    <option value="">-- Chọn lớp --</option>
                    <?php
                        include('config.php');
                        $mgv = mysqli_query($conn, "SELECT * FROM lop");

                        $sql = "SELECT ma_lop FROM lop";
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
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Sinh viên</th>
                <th>Điểm</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <footer>
        <p>Copyright © 2020 Trường Đại học Mỏ - Địa chất
            Version: MOHN-2024.07B.33
            Design by 2121051141@student.humg.edu.vn</p>
    </footer>
</body>
</html>
