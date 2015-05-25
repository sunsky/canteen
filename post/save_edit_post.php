<?php 
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if ( !isset($_POST['id']) or !isset($_POST['name']) or !isset($_POST['salary']) )
    die ("职位编号,名称，薪水都不能为空!");

$id = $_POST['id'];
$name = $_POST['name'];
$salary = $_POST['salary'];
if (! is_numeric($id))
    die ("职位编号一定要是数字!");

$id = remove_unsafe_char($id);
$name = remove_unsafe_char($name);
$salary = floatval(remove_unsafe_char($salary));

$sql = "select * from jobs where jid='$id'";
if (mysql_num_rows(mysql_query($sql,$db)) == 0)
    die ("职位中没有该记录" . $id);

$sql_update = "update jobs set name='$name' , salary=$salary where jid='$id'";
$result = mysql_query($sql_update,$db);
if (! $result)
    die ("修改职位失败! <br/>" . mysql_error());

echo "成功修改职位! <br/>";
echo "<a href='m-post.php'>返回</a>";

mysql_close($db);
?>

