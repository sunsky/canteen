<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();
if (! isset($_GET['id']))
    die ("编辑食材，请输入食材的编号!");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("食材的编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql = "select * from material where mid='$id'";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询食材信息失败! <br/>" . mysql_error());
$row = mysql_fetch_array($result);
if (! $row)
    die ("没有该食材的信息!");
mysql_close($db);
include ("../template/template.html");
?>
<div id="main">
<form action="save_edit_material.php" method="post">
<h3>修改食物信息</h3>
<table>
    <input type="hidden" name="id" value="<?php echo $row['mid']; ?>">
    <tr><td>名称</td><td><input type="text" name="name" value="<?php echo $row['name']; ?>" size=20></td></tr>
    <tr><td>描述</td><td><input type="text" name="desc" value="<?php echo $row['description']; ?>" size=40></td></tr>
</table>
<input type="submit"  value="修改食材">
<input type="reset"  value="重置">
</form>
</div>
<?php include ("../template/tail.html"); ?>
