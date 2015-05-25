<?php
include ("../conn.php");
include ("../util.php");
m1_login();
utf8();

if (! isset($_GET['id']))
    die ("供应商编号不能为空!");

$id = remove_unsafe_char($_GET['id']);
if (! is_numeric($id))
    die ("供应商编号要是数字!");

$sql = "select * from supply where sid='$id'";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询供应商失败!" . mysql_error());
$row = mysql_fetch_array($result);
if (! $row)
    die ("没有该编号的供应商!");
mysql_close($db);
?>
<h3>供应商</h3>
<table>
    <tr><td>姓名</td><td><?php echo $row['name']; ?></td></tr>
    <tr><td>性别</td><td><?php echo $row['sex']; ?></td></tr>
    <tr><td>电话</td><td><?php echo $row['tel']; ?></td></tr>
    <tr><td>地址</td><td><?php echo $row['address']; ?></td></tr>
    <tr><td>描述</td><td><?php echo $row['description']; ?></td></tr>
    <tr><td>最后修改时间</td><td><?php echo $row['add_time']; ?></td></tr>
</table>

