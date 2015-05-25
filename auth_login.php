<?php

include ("conn.php");
include ("util.php");

if (! isset($_POST['username']) or !isset($_POST['password']))
    Header("Location: login.php");

$username = remove_unsafe_char(trim($_POST['username']));
$password = md5(remove_unsafe_char(trim($_POST['password'])));

$result = mysql_query("SELECT * FROM manage where username='$username' and password='$password'",$db);
if(! $result)
    die('Connect to database fail ' . mysql_error());

$arr = mysql_fetch_array($result);
if (! $arr){
    $ref = $_SERVER['HTTP_REFERER'];
    echo "用户名或密码错误<br>" . "<a href=$ref>返回</a>";
} else {
    session_start();
    if ($arr['proi']==0){
        $_SESSION['user'] = $username;
        $_SESSION['admin'] = 1;
        Header("Location: admin_manage.php");
    }
    else if($arr['proi'] == 1){
        $_SESSION['user'] = $username;
        $_SESSION['m1'] = 1;
        Header("Location: /add_material/m-add_material.php");
    }
    else if($arr['proi'] == 2){
        $_SESSION['user'] = $username;
        $_SESSION['m2'] = 1;
        Header("Location: /add_custom/showall_custom_record.php");
    } else{
        echo "权限出错";
    }
}
mysql_close($db);

?>
