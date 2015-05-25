<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (!isset($_POST['id']) or ! isset($_POST['money']))
    die ("输入的编号和金额都不能为空! <br>");

$id = remove_unsafe_char($_POST['id']);
$money = floatval(remove_unsafe_char($_POST['money']));

$row = mysql_fetch_array(mysql_query("select * from custom where cid='$id'"));
if (! $row)
    die("不存在编号为 $sid  的消费者!<br/>");

$sql = "update custom set cur_money = $money  where cid='$id'";
$result = mysql_query($sql,$db);
if (! $result)
    die ("修改失败!");

echo "修改数据成功！";
$url = referer("m-custom.php");
echo "<a href=$url >返回</a>";
?>


