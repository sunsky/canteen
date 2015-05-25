<?php
include ("../conn.php");
include ("../util.php");
m1_login();
utf8();

if ( !isset($_POST['material']) or !isset($_POST['supply']) or !isset($_POST['charge']) or !isset($_POST['price']) or !isset($_POST['account']))
    die ("添加食材记录中，食材编号，供应商编号，饭堂负责人编号，价格，数量不能为空!");

$mate = remove_unsafe_char($_POST['material']);
$supp = remove_unsafe_char($_POST['supply']);
$work = remove_unsafe_char($_POST['charge']);
$price = remove_unsafe_char($_POST['price']);
$account = remove_unsafe_char($_POST['account']);

$sql = "insert into add_material (mid,sid,charge,price,amount,add_time) values ($mate,$supp,$work,$price,$account,now())";

$result = mysql_query($sql,$db);
if (!$result)
    die ("添加进货记录失败 !<br/>" . mysql_error());

echo "成功添加一条进货记录 !<br/>";
echo "<a href='m-add_material.php'>返回</a>";
mysql_close($db);
?>

