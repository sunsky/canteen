<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if ( !isset($_POST['name']) or !isset($_POST['sex']) or !isset($_POST['tel']))
    die("供应商的姓名，性别，电话不能为空!");

$name = $_POST['name'];
$sex = $_POST['sex'];
$tel = $_POST['tel'];
$address = isset($_POST['address'])? $_POST['address'] : "";
$desc = isset($_POST['desc']) ? $_POST['desc'] : "";

$name = remove_unsafe_char($name);
$sex  = remove_unsafe_char($sex);
$tel  = remove_unsafe_char($tel);
$address = remove_unsafe_char($address);
$desc = remove_unsafe_char($desc);

if ($sex != '男' and $sex!='女')
    die("性别不是男就是女!");

$sql = "insert into supply (name,sex,tel,address,description,add_time) values ('$name','$sex','$tel','$address','$desc',now())";
$result = mysql_query($sql,$db);
if (! $result)
    die ("插入供应商失败 !" . mysql_error());

echo "成功添加供应商";
echo "<a href='m-supply.php'>返回</a>";
mysql_close($db);

?>
