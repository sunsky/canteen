<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select * from jobs order by jid desc ";
$result = mysql_query($sql,$db);
include ("../template/template.html");
?>
<div id="main">
<form action="add_post.php" method="post">
    <h3>添加职位</h3>
    <p align='left'>职位名称<input type="text" name="name" value="" size=20>
    薪水<input type="text" name="salary" value="" size=20>
    <input type="submit" value="增加职位"><input type="reset" value="重置">
    </p>
</form>

<table >
    <tr><th>职位名称</th><th>薪水</th><th>操作</th></tr>

<?php
while ($row = mysql_fetch_array($result))
    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['salary'] .   
    "</td><td><a href='del_post.php?id=" . $row['jid'] .
    "' onclick=\"return confirm('确认删除?'); \">删除该职位</a>" . 
    "&nbsp;&nbsp;<a href='edit_post.php?id=" . $row['jid'] . "'>编辑</a></td></tr>";

mysql_close($db);
?>
</table>
</div>
<?php
include ("../template/tail.html");
?>

