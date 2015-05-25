<?php
include ("../conn.php");
include ("../util.php");
handle_login();
header("Content-Type:text/html; charset=utf8");

if(! isset($_GET['id']))
    die ("请添加学号<br>");

$id = $_GET['id'];
$id = remove_unsafe_char($id);

$sql = "select * from student where sid='$id'";
$result = mysql_query($sql,$db);
if (!$result)
    die("查找学生信息失败!<br>" . mysql_error());

$row = mysql_fetch_array($result);
if (! $row)
    die ("没有该学号的学生信息!");
mysql_close($db);
?>

<html>
    <head>
        <title>学生信息</title>
        <style type="text/css" media="screen">
            body{margin:0px; padding:0px; background:#f3f3f3; text-align:center;}
            #main {width:600px; background:white; margin:0 auto; margin-top:30px; padding:10px; text-align:center;}
            #main {-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius:10px; }
            td {border-bottom:1px dashed #ccc; padding:5px 25px; text-align:center;}
        </style>
    </head>
    <body>
        <div id="main">
            <h3>学生信息</h3>
            <table >
                <tr><th>学号</th><th>姓名</th><th>性别</th><th>电话</th><th>操作</th></tr>
<?php
    echo "<tr><td>".$row['sid'] ."</td><td>". $row['name'] ."</td><td>". $row['sex'] ."</td><td>". $row['tel'] ."</td><td><a href=del_student.php?sid=" . $row['sid'] . " onclick=\"return confirm('确定删除?');\">删除</a></td></tr>";
?>
</table>

