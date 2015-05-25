<?php
include ("conn.php");
include ("util.php");
is_user();
if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $old_pw  = md5($_POST['pw0']);
    $new_pw1 = md5($_POST['pw1']);
    $new_pw2 = md5($_POST['pw2']);
    if ($new_pw1 != $new_pw2){
        echo "两个新输入的密码不一致!<br>";
        $ref = $_SERVER['HTTP_REFERER'];
        die ("<a href=$ref>返回</a>");
    }
    $sql_q = "select * from manage where username='$user' and password='$old_pw'";
    $result = mysql_query($sql_q,$db);
    if(! $result)
        die ("query database error " . mysql_error());
    $row = mysql_fetch_array($result);
    if ($row){
        $sql_u = "update manage set password='$new_pw1' where username='$user' and password='$old_pw'";
        if (! mysql_query($sql_u))
            die ("修改数据失败! " . mysql_error());
        else {
            unset($_SESSION['login']);
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="2; URL=login.php">';
            echo "已成功修改密码!<br>";
            echo "请重新登陆<br>";
            echo "<b>正在跳转....</b>";
        }
    }
    else{
        echo "旧用户密码不正确!";
        $ref = $_SERVER['HTTP_REFERER'];
        echo "<a href=$ref>返回</a>";
    }
} else {
    Header("Location: login.php");
}
