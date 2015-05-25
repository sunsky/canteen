<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_POST['name']) or ! isset($_POST['price']) )
    die ("添加食物，名称，价格不能为空!");

$name = $_POST['name'];
$price = $_POST['price'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

$name = remove_unsafe_char($name);
$price = remove_unsafe_char($price);
$desc = remove_unsafe_char($desc);

$sql = "insert into food (name,description,price) values ('$name','$desc',$price) ";
$result = mysql_query($sql,$db);
if (! $result)
    die ("添加食物失败! " . mysql_error());
echo "成功添加食物 !<br/>";
echo "<a href='m-food.php'>返回</a>";
mysql_close($db);
?>
