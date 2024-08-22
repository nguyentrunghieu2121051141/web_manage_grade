<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_teacher.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cổng thông tin Đào tạo đại học</title>
<body>
    <div class="container">
        <?php
            require "header.php";
        ?>
        <div class="menu">
            <ul>
                <a href="nhap_drl.php"><li>Nhập điểm rèn luyện</li></a>
                <a href="/web/admin/add/nganh.php"><li>Nhập điểm</li></a>
            </ul>
        </div>
    </div>
    <?php
        require "menu.php";
    ?>
    <?php
        require "footer.php";
    ?>
</body>
</html>
