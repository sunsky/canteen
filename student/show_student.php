<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select * from student";
$result = mysql_query($sql,$db);
mysql_close($db);
include ("../template/template.html");
?>
    <div id="main">
        <table>
            <p>学生信息列表</p>
            <tr><th>学号</th><th>姓名</th><th>性别</th><th>电话</th><th>操作</th></tr>
<?php
while($row=mysql_fetch_array($result))
    echo "<tr><td>".$row['sid'] ."</td><td>". $row['name'] ."</td><td>". $row['sex'] ."</td><td>". $row['tel'] ."</td><td><a href=del_student.php?sid=" . $row['sid'] . " onclick=\"return confirm('确定删除?');\">删除</a></td></tr>";
?>
        </table>
    </div>
<?php
include ("../template/tail.html");
?>
