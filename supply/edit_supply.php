<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("编辑供应商信息，供应商编号不能空!");

$id = remove_unsafe_char($_GET['id']);
if (! is_numeric($id))
    die ("供应商编号一定要是数字!");

$sql = "select * from supply where sid='$id'";
$result = mysql_query($sql,$db);
if (!$result)
    die ("查询供应商信息失败! " . mysql_error());
$row = mysql_fetch_array($result);
if (!$row)
    die ("数据库没有该供应商的信息!");
mysql_close($db);
include ("../template/template.html");
?>
<div id="main">
<form action="save_edit_supply.php" method="post">
<h3>修改供应商信息</h3>
<table>
    <input type="hidden" name="id" value="<?php echo $row['sid']; ?>">
    <tr><td>姓名</td><td>
        <input type="text" name="name" size=20 value="<?php echo $row['name']; ?>" >*</td></tr>
    <tr><td>性别</td><td>
        <input type="radio" name="sex" <?php if ($row['sex']=='男') echo "checked=true"; ?> value="男">男
        <input type="radio" name="sex" value="女" <?php if ($row['sex']=='女') echo "checked=true"; ?> >女</td></tr>
    <tr><td>电话</td><td>
        <input type="text" name="tel" size=20 value="<?php echo $row['tel']; ?>" >*</td></tr>
    <tr><td>地址</td><td>
        <input type="text" name="address" size=30 value="<?php echo $row['address']; ?>"></td></tr>
    <tr><td>描述</td><td>
        <input type="text" name="desc" size=30 value="<?php echo $row['description']; ?>"></td></tr>
</table>
<input type="submit" value="修改供应商">
<input type="reset" value="重置">
</form>
</div>
<?php include ("../template/tail.html"); ?>
