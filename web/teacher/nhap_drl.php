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
                    require "mo_danh_sach_lop.php";
                ?>
        
            <button class="button" type="submit"><b>Nhập điểm</b></button>
        </form>
    </div>
    <?php
        require "footer.php";
    ?>
</body>
</html>
