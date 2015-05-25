<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select * from manage where proi!=0";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询帐号失败 !" . mysql_error());
include ("../template/template.html");
?>
<div id="main">
<form action="add_manager.php" method="post">
<h3>添加帐号</h3>
<table>
    <tr><td>用户名</td><td><input type="text" name="username" value="" size=20></td></tr>
    <tr><td>密码</td><td><input type="text" name="password" value="" size=20></td></tr>
    <tr><td>权限</td><td><select name='proi'>
        <option value='1'>进货记录员</option>
        <option value='2'>消费查询员</option></select></td></tr>
</table>
<input type="submit"  value="添加帐号">
<input type="reset"  value="重置">
</form>
<table >
    <tr><th>序号</th><th>用户名</th><th>权限</th><th>操作</th></tr>
<?php
$n = 1;
while ( $row = mysql_fetch_array($result) ){
    if ($row['proi'] == 1)
        $s_proi = "进货记录员";
    else if ($row['proi'])
        $s_proi = "消费查询员";
    else
        die ("权限分配出错!");
    printf("<tr><td>%d</td><td>%s</td><td>%s</td><td><a href='del_manager.php?id=%d' onclick=\"return confirm('确定删除?'); \" >删除</a>  <a href='edit_manager.php?id=%d'>编辑</a></td></tr>",$n,$row['username'],$s_proi,$row['id'],$row['id']);
    $n = $n + 1;
}

mysql_close($db);
?>
</table>
</div>
<?php
include ("../template/tail.html");
?>
