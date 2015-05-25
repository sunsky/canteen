<?php
include ("util.php");
is_user();
utf8();
if (is_admin()): include ("template/template.html");
else :
?>
<html>
    <head>
        <title>修改密码</title>
        <style type="text/css" media="screen">
            body{margin:0px; padding:0px; background:#f3f3f3; text-align:center;}
            #main {width:600px; background:white; margin:0 auto; margin-top:30px; padding:10px; text-align:center;}
            #main {-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius:10px; }
            td {border-bottom:1px dashed #ccc; padding:5px 25px; text-align:center;}
            ul {margin:0px; padding:0px;}
            ul li {float:left; list-style:none; margin-left:20px;}
            #nav {height: 20px; margin-top:20px;}
        </style>
    </head>
    <body>
<?php endif; ?>

<div id="main">
    <form action="update_pw.php" method="post" accept-charset="utf-8">
        <p>修改密码</p>
        <p><?php echo "用户: " . $_SESSION['user']; ?></p>
        <p>旧密码<input type="password" name="pw0" value=""></p>
        <p>新密码<input type="password" name="pw1" value=""></p>
        <p>确认新密码<input type="password" name="pw2" value=""></p>
    <p><input type="reset" value="Reset"> <input type="submit" value="Update "></p>
    </form>
</div>
<?php 
include ("template/tail.html");
?>
