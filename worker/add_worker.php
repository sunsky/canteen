<?php 
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();
$sql = "select * from jobs";
$result = mysql_query($sql,$db);
if (! $result)
    die ("连接数据库(职位)失败" . mysql_error());
include ("../template/template.html");
?>
<div id="main">
    <h3>添加工人</h3>
    <form action="add_worker_submit.php" method="post" accept-charset="utf-8">
    <table >
        <tr><td>姓名</td><td><input type="text" name="name" value="" size=20></td></tr>
        <tr><td>性别</td><td><input type="radio" name="sex" value="男">男
                             <input type="radio" name="sex" value="女">女</td></tr>
        <tr><td>职位</td><td><select name="job">
                <?php while($row = mysql_fetch_array($result)) 
                    echo "<option value=" . $row['jid'] . ">" . $row['name'] . "</option>"; 
                mysql_close($db);    
                ?>
            </select>
        </td></tr>
    </table>
    <p><input type="submit" value="添加工人">&nbsp;<input type="reset" value="重置"></p>
    </form>
</div>
<?php
include ("../template/tail.html");
?>
