<?php
include ("../conn.php");
include ("../util.php");
handle_login();
header("Content-Type:text/html; charset=utf-8");

if(! isset($_GET['id']))
    die ("请添加学号<br>");

$id = $_GET['id'];
$id = remove_unsafe_char($id);

$sql = "select * from student,custom where sid='$id' and sid=cid";
$result = mysql_query($sql,$db);
if (!$result)
    die("查找学生信息失败!<br>" . mysql_error());

$row = mysql_fetch_array($result);
if (! $row)
    die ("没有该学号的学生信息!"); 
mysql_close($db);
include ("../template/template.html");
?>

        <div id="main">
            <h3>消费者信息</h3>
            <table >
                <tr><td>编号</td><td><?php echo $row['sid']; ?> </td></tr>
                <tr><td>姓名</td><td><?php echo $row['name']; ?></td></tr>
                <tr><td>性别</td><td><?php echo $row['sex']; ?> </td></tr>
                <tr><td>电话</td><td><?php echo $row['tel']; ?> </td></tr>
                <tr><td>当前金额</td><td><?php echo $row['cur_money']; ?></td></tr>
            </table>
        </div>
    </body>
</html>
