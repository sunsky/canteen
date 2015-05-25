<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();
if (! isset($_GET['id']))
    die ("编辑帐号，请输入帐号的编号!");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("帐号的编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql = "select * from manage where id='$id' and proi!=0";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询帐号信息失败! <br/>" . mysql_error());
$row = mysql_fetch_array($result);
if (! $row)
    die ("没有该帐号的信息!");
mysql_close($db);
include ("../template/template.html");
?>
<div id="main">
<form action="save_edit_manager.php" method="post">
<h3>修改帐号信息</h3>
<table>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <tr><td>用户名</td><td><input type="text" name="username" value="<?php echo $row['username']; ?>" size=20></td></tr>
    <tr><td>密码</td><td><input type="text" name="password" value="" size=20></td></tr>
    <tr><td>权限</td><td><select name='proi'>
        <option value='1'>进货记录员</option>
        <option value='2'>消费查询员</option></select></td></tr>
</table>
<input type="submit"  value="修改帐号">
<input type="reset"  value="重置">
</form>
</div>
</body>
</html>
