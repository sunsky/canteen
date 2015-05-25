<?php
include ("../conn.php");
include ("../util.php");
handle_login();
header("Content-type: text/html; charset=utf-8");

$sql = "select * from student,custom where custom.cid=student.sid";
$result = mysql_query($sql,$db);
include ("../template/template.html");
?>

<div id="main">
    <table>
        <h3>所有消费者信息</h3>
        <tr><th>学号</th><th>姓名</th><th>性别</th><th>电话</th><th>金额</th><th>操作</th></tr>

<?php
while($row=mysql_fetch_array($result)){
    echo "<tr><td>".$row['sid'] ."</td><td>". $row['name'] ."</td><td>". $row['sex'] ."</td><td>". $row['tel'] ."</td><td>". $row['cur_money'] ."</td><td><a href=edit_custom.php?sid=" . $row['sid'] . ">编辑</a></td></tr>";
}
mysql_close($db);
?>

    </table>
</div>
<?php
include ("../template/tail.html");
?>
