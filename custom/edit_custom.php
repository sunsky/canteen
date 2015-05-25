<?php
include ("../conn.php");
include ("../util.php");

handle_login();
utf8();

if (! isset($_GET['sid']))
    die("请输入学号!");

$sid = remove_unsafe_char($_GET['sid']);
$row = mysql_fetch_array(mysql_query("select * from custom,student where cid='$sid' and sid='$sid'"));
if (! $row)
    die("不存在学号为 $sid  的学生!<br/>");

mysql_close($db);
include ("../template/template.html");
?>

<div id="main">
    <form action="edit_save_custom.php" method="post">
        <h3>编辑消费者信息</h3>
        <table>
            <tr><td>编号</td><td><?php echo $row['sid']; ?> </td></tr>
            <tr><td>姓名</td><td><?php echo $row['name']; ?></td></tr>
            <tr><td>性别</td><td><?php echo $row['sex']; ?> </td></tr>
            <tr><td>电话</td><td><?php echo $row['tel']; ?> </td></tr>
            <tr><td>当前金额</td>
                <td>
                    <input type="text" name="money" size=17 value=<?php echo $row['cur_money']; ?>>
                </td></tr>
        </table>
        <input type="hidden" name="id" value=<?php echo $row['sid']; ?> >
        <input type="submit" value="提交结果">
        <input type="reset" value="重置">
        </form>
        </div>
    </body>
</html>
