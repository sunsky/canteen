<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

$sql = "select wid,name from worker";
$result = mysql_query ($sql,$db);
if (! $result)
    die ("查询工人数据库失败! " . mysql_error());

$acount = mysql_num_rows($result);
include ("../template/template.html");
?>
<div id="main">
    <h3>现有工人 <?php echo $acount; ?> 名</h3>
    <a href="add_worker.php">添加工人</a><br/>
    <form action = "search_worker.php" method="get">
        <p>姓名或编号 <input type="text" name="id" value="" size=20 >
            <input type="submit" value="查询"></p>
    </form>

    <table>
        <tr><th>序号</th><th>工人编号</th><th>名字</th><th>操作</th></tr>
<?php
$n = 1;
while ($row = mysql_fetch_array($result)){
    echo "<tr><td> $n </td><td align=center><a href=search_worker.php?id=".$row['wid'] .">" .
        $row['wid'] ."</a></td><td>". 
        $row['name'] ."</td><td><a onclick=\"return confirm('确定删除?'); \" href='del_worker.php?id=" .
        $row['wid'] ."'>删除</a> &nbsp;<a href='edit_worker.php?id=" . 
        $row['wid'] ."'>编辑</a></td></tr>";
    $n = $n + 1;
}

mysql_close($db);
?>
    </table>
</div>
<?php
include ("../template/tail.html");
?>
