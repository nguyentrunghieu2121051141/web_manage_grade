<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cổng thông tin Đào tạo đại học</title>
</head>
<body>
    <?php
        require "header.php";
    ?>
    
    <main>
        <div class = "xem_diem">
            <h2><i class="fa-solid fa-atom"></i>Xem điểm</h2>
            <table>
                <tr class="header_row">
                    <th>STT</th>
                    <th>Mã MH</th>
                    <th>Tên môn học</th>
                    <th>Số tín chỉ</th>
                    <th>Điểm thi</th>
                    <th>Điểm TK (10)</th>
                    <th>Điểm TK (4)</th>
                    <th>Điểm TK (C)</th>
                </tr>
                <?php 
                   
                ?>
            </table>
        </div>
    </main>
    <?php
        require "menu.php";
    ?>
    <?php
        require "footer.php";
    ?>

</body>
</html>