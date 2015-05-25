<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("删除供应商中，供应商编号不能为空!");

$id = remove_unsafe_char($_GET['id']);
if (! is_numeric($id))
    die ("供应商编号要是数字!");

$sql = "delete from supply where sid='$id'";
$result = mysql_query($sql,$db);
if (! $result)
    die ("删除供应商失败!" . mysql_error());

echo "成功删除供应商信息!<br/>";
echo "<a href='m-supply.php'>返回</a>";
mysql_close($db);
?>

