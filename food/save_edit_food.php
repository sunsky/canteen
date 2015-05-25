<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (!isset($_POST['name']) or ! isset($_POST['price']) or !isset($_POST['id']) )
    die ("添加食物，编号，名称，价格不能为空!");

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

if (! is_numeric($id))
    die ("食物的编号一定要是数字!");

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$price = remove_unsafe_char($price);
$desc = remove_unsafe_char($desc);

$sql = "update food set name='$name',description='$desc',price=$price where fid='$id'";
$result = mysql_query($sql,$db);
if (! $result)
    die ("修改食物信息失败! " . mysql_error());
echo "成功修改食物信息 !<br/>";
echo "<a href='m-food.php'>返回</a>";
mysql_close($db);
?>
