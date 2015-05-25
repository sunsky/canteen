<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['m1']);
unset($_SESSION['m2']);
echo "<h3>注销成功</h3>";
echo "<a href='/'>首页</a> ";
echo "<a href='/login.php'>登录</a>";
?>
