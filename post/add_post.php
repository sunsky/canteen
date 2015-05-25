<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if ( !isset($_POST['name']) or !isset($_POST['salary']))
    die ("职位名称和薪水都不能为空!");

$name = remove_unsafe_char($_POST['name']);
$salary = floatval(remove_unsafe_char($_POST['salary']));

$sql = "insert into jobs (name,salary) values ('$name',$salary)";
$result = mysql_query($sql,$db);

if (! $result)
    die ("增加职位，写入数据库失败! " . mysql_error());

echo "成功添加职位<br/>";
$url = referer("m-post.php");
echo "<a href='$url' > 返回 </a>";
?>

