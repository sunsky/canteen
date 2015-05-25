<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if ( !isset($_POST['id']) or !isset($_POST['name']) or !isset($_POST['sex']) or !isset($_POST['tel']))
    die("供应商的姓名，性别，电话不能为空!");

$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$tel = $_POST['tel'];
$address = isset($_POST['address'])? $_POST['address'] : "";
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$sex  = remove_unsafe_char($sex);
$tel  = remove_unsafe_char($tel);
$address = remove_unsafe_char($address);
$desc = remove_unsafe_char($desc);

if (! is_numeric($id))
    die ("供应商编号一定要是数字!");

if ($sex != '男' and $sex!='女')
    die ("性别不是男就是女!");

$sql = "update supply set name='$name',sex='$sex',tel='$tel',address='$address',description='$desc',add_time=now() where sid='$id'";
$result = mysql_query($sql,$db);
if (! $result)
    die ("修改供应商失败 !" . mysql_error());

echo "成功修改供应商";
echo "<a href='m-supply.php'>返回</a>";
mysql_close($db);

?>
