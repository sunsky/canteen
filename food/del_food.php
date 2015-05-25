<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("删除食物，请输入食物的编号!");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("食物的编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql = "delete from food where fid=$id";
$result = mysql_query($sql,$db);
if (! $result)
    die ("删除食物失败! " . mysql_error());

echo "删除食物成功！" ;
echo "<a href='m-food.php'>返回</a>";
mysql_close($db);
?>
