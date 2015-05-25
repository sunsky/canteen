<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select * from food";
$result = mysql_query($sql,$db);
if (! $result)
    die ("查询食物失败 !" . mysql_error());
$n = 1;
include ("../template/template.html");
?>
<div id="main">
<form action="add_food.php" method="post">
<h3>添加食物</h3>
<table>
    <tr><td>名称</td><td><input type="text" name="name" value="" size=20></td></tr>
    <tr><td>价格</td><td><input type="text" name="price" value="" size=20>元</td></tr>
    <tr><td>描述</td><td><input type="text" name="desc" value="" size=40></td></tr>
</table>
<input type="submit"  value="添加食物">
<input type="reset"  value="重置">
</form>
<table>
    <tr><th>序号</th><th>食物名称</th><th>价格</th><th>描述</th><th>操作</th></tr>
<?php
while ( $row = mysql_fetch_array($result) ){
    printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td><a href='del_food.php?id=%d' onclick=\"return confirm('确定删除?'); \" >删除</a>  <a href='edit_food.php?id=%d'>编辑</a></td></tr>",$n,$row['name'],$row['price'],$row['description'],$row['fid'],$row['fid']);
    $n = $n + 1;
}

mysql_close($db);
?>
</table>
</div>
<?php include ("../template/tail.html"); ?>
