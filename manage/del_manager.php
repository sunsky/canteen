<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("删除帐号，请输入帐号的编号!");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("帐号的编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql = "delete from manage where id=$id";
$result = mysql_query($sql,$db);
if (! $result)
    die ("删除帐号失败! " . mysql_error());

echo "删除帐号成功！" ;
echo "<a href='m-manage.php'>返回</a>";
mysql_close($db);
?>
