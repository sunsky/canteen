<?php 
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (!isset($_POST['id']) or !isset($_POST['name']) or !isset($_POST['sex']) or !isset($_POST['job']) )
    die ("添加工人信息中，编号,姓名，性别和职位不能为空!");

$id = $_POST['id'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$jid = $_POST['job'];

if ($sex != "男" and $sex!="女")
    die("未知性别!");
if (! is_numeric($jid))
    die("职位编号要是整数");
if (! is_numeric($id))
    die("员工编号要是整数");

$id = remove_unsafe_char(intval($id));
$name = remove_unsafe_char($name);
$sex = remove_unsafe_char($sex);
$jid = intval(remove_unsafe_char($jid));

$sql = "update worker set name='$name',sex='$sex',jid=$jid where wid=$id";
$result = mysql_query($sql,$db);
if (! $result)
    die ("修改工人信息失败" . mysql_erro());

echo "成功修改工人信息!";
echo "<a href='m-worker.php'>返回</a>";
mysql_close($db);
?>
