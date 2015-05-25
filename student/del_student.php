<?php
include ("../conn.php");
include ("../util.php");

handle_login();
utf8();

if (! isset($_GET['sid']))
    die("请输入学号!");

$sid = remove_unsafe_char($_GET['sid']);
if (! mysql_fetch_row(mysql_query("select * from student where sid='$sid'")))
    die("不存在学号为 $sid  的学生!<br/>");

$sql = "delete from student where sid='$sid'";
$result = mysql_query($sql,$db);
if (! $result)
    die("删除失败!<br/>");
else{
    echo "删除成功<br/>";
    echo "<a href='m-student.php'>返回</a>";
}
mysql_close($db);

?>

