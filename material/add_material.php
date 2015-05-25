<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_POST['name']) )
    die ("添加食材，名称不能为空");

$name = $_POST['name'];
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

$name = remove_unsafe_char($name);
$desc = remove_unsafe_char($desc);

$sql = "insert into material (name,description) values ('$name','$desc') ";
$result = mysql_query($sql,$db);
if (! $result)
    die ("添加食材失败! " . mysql_error());
echo "成功添加食材 !<br/>";
echo "<a href='m-material.php'>返回</a>";
mysql_close($db);
?>
