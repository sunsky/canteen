<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("员工编号不能为空");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("员工编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql_job = "select * from jobs";
$sql = "select * from worker where wid='$id'";

$result = mysql_query($sql_job,$db);
if (! $result)
    die ("查询职位失败" . mysql_error());

$row = mysql_fetch_array($result);
if (! $row)
    die ("当前职位为空!");

$result2 = mysql_query($sql ,$db);
if (! $result2)
    die ("查询员工失败" . mysql_error());
$row2 = mysql_fetch_array($result2);

?>

<form action="update_worker_submit.php" method="post" accept-charset="utf-8">
<table border="1">
<tr><td>姓名</td><td><input type="text" name="name" value="<?php echo $row2['name']; ?>" size=20></td></tr>
    <tr><td>性别</td><td>
    <?php if ($row2['sex']=='男')
    echo '<input type="radio" name="sex" value="男" checked=true>男<input type="radio" name="sex" value="女">女</td></tr>';
    else echo'<input type="radio" name="sex" value="男">男<input type="radio" name="sex" value="女" checked=true>女</td></tr>';
    ?>
    <input type="hidden" name="id" value="<?php echo $row2['wid']; ?>">
    <tr><td>职位</td><td><select name="job">
            <?php while($row = mysql_fetch_array($result)) 
                echo "<option value=" . $row['jid'] . ">" . $row['name'] . "</option>"; 
            mysql_close($db);    
            ?>
        </select>
    </td></tr>
</table>
<p><input type="submit" value="更新工人信息">&nbsp;<input type="reset" value="重置"></p>
</form>

