<?php
include ("../util.php");
include ("../conn.php");
handle_login();
utf8();
include ("../template/template.html");
?>
<style type="text/css" media="screen">
tr td,th { margin:5px 10px; padding:5px 10px;}
</style>
<div id="main">
<form action="add_supply.php" method="post">
<h3>添加供应商</h3>
<table>
    <tr><td>姓名</td><td><input type="text" name="name" size=20>*</td></tr>
    <tr><td>性别</td><td><input type="radio" name="sex" checked=true value="男">男
        <input type="radio" name="sex" value="女" >女</td></tr>
    <tr><td>电话</td><td><input type="text" name="tel" size=20>*</td></tr>
    <tr><td>地址</td><td><input type="text" name="address" size=30></td></tr>
    <tr><td>描述</td><td><input type="text" name="desc" size=30></td></tr>
</table>
<input type="submit" value="增加供应商">
<input type="reset" value="重置">
</form>

<?php
$sql = "select * from supply";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询供应商失败" . mysql_error());
$n = 1;
echo "<h3>所有供应商</h3>";
echo "<table ><tr><th>序号</th><th>编号</th><th>姓名</th><th>性别</th><th>电话</th><th>地址</th><th>描述</th><th>最后修改时间</th><th>操作</th></tr>";
while ($row = mysql_fetch_array($result)) {
    printf("<tr><td>%d</td><td><a href='show_supply.php?id=%d'>%d</a></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><a href='del_supply.php?id=%d' onclick=\"return confirm('确定删除?'); \">删除</a>  &nbsp;<a href='edit_supply.php?id=%d'>编辑</a></td></tr>" ,$n,$row['sid'],$row['sid'],$row['name'],$row['sex'],$row['tel'],$row['address'],$row['description'],$row['add_time'],$row['sid'],$row['sid']);
    $n = $n + 1;
}
echo "</table>";
mysql_close($db);
?>
</div>
<?php include ("../template/tail.html"); ?>
