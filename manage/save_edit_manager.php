<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (!isset($_POST['username']) or ! isset($_POST['password']) or !isset($_POST['id']) or !isset($_POST['proi']) )
    die ("修改帐号，用户名，密码，权限不能为空!");

$id = $_POST['id'];
$us = $_POST['username'];
$pw = $_POST['password'];
$pr = $_POST['proi'];

if (! is_numeric($id))
    die ("帐号的编号一定要是数字!");

if ( $pr!='1' and $pr!='2' )
    die("添加帐号，分配的权限出错!");

$id = remove_unsafe_char($id);
$us = remove_unsafe_char($us);
$pw = md5(remove_unsafe_char($pw));
$pr = intval(remove_unsafe_char($pr));

$sql_exist = "select * from manage where username='$us' and id!=$id";
if (mysql_num_rows(mysql_query($sql_exist)) != 0)
    die ("用户名 " . $us . "已被占用。请试用另一个用户名!<br/><a href='m-manage.php'>返回</a>");


$sql = "update manage set username='$us',password='$pw',proi=$pr where id='$id' ";
$result = mysql_query($sql,$db);
if (! $result)
    die ("修改帐号信息失败! " . mysql_error());
echo "成功修改帐号信息 !<br/>";
echo "<a href='m-manage.php'>返回</a>";
mysql_close($db);
?>
