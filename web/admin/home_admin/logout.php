<?php
session_start();
session_destroy();
header("Location: /web/admin/home_admin/home_admin.html");
exit();
?>
