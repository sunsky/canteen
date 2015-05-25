<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("职位编号不能为空");

$id = $_GET['id'];
if (! is_numeric($id))
    die ("职位编号一定要是数字!");

$id = remove_unsafe_char($id);
$sql = "select * from jobs where jid='$id'";

$result = mysql_query($sql,$db);
if (! $result)
    die ("查询职位失败" . mysql_error());

$row = mysql_fetch_array($result);
if (! $row)
    die ("没有该职位!");

mysql_close($db);
include ("../template/template.html");
?>
<div id="main">
<h3>编辑职位</h3>
<form action="save_edit_post.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['jid']; ?>">
<p>职位名称<input type="text" name="name" value="<?php echo $row['name']; ?>" size=20>
薪水<input type="text" name="salary" value="<?php echo $row['salary']; ?>" size=20>
    <input type="submit" value="修改职位"><input type="reset" value="重置">
    </p>
</form>
</div>
</body>
</html>
