<?php
include ("../conn.php");
include ("../util.php");
m1_login();
utf8();

$sql = "select add_material.price amprice,account,, from add_material,material,supply,worker where add_material.mid=material.mid and add_material.sid=supply.sid and add_material.charge=worker.wid ";

$sql2 = "select * from add_material,material where material.mid=add_material.mid";
$result = mysql_query($sql2,$db);
if (!$result)
    die ("查询进货记录失败!<br/>" . mysql_error());
if (is_admin()) : include ("../template/template.html");
else :
?>
<html>
    <head>
        <title>查询消费记录</title>
        <style type="text/css" media="screen">
            body{margin:0px; padding:0px; background:#f3f3f3; text-align:center;}
            #main {width:700px; background:white; margin:0 auto; margin-top:30px; padding:10px; text-align:center;}
            #main {-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius:10px; }
            td {border-bottom:1px dashed #ccc; padding:5px 15px; text-align:center;}
            tr td,th { margin:5px 15px; padding:5px 15px;}
            ul {margin:0px; padding:0px;}
            ul li {float:left; list-style:none; margin-left:20px;}
            #nav {height: 20px; margin-top:20px;}
        </style>
    </head>
    <body>
    <div id="nav">
        <ul>
            <li>你好 <?php echo $_SESSION['user']; ?>!</li>
            <li><a href="m-add_material.php">管理</a></li>
            <li><a href="/update_password.php">修改密码</a></li>
            <li><a href="/logout.php">注销</a></li>
        </ul>
    </div>
<?php endif; ?>
<div id="main">
<style type="text/css" media="screen">
    tr td,th {margin:5px 15px; padding:5px 15px;}
</style>
<p>食材进货记录</p>
<table ><tr><th>序号</th><th>食材</th><th>供应商</th><th>负责人</th><th>单价</th><th>数量</th><th>进货日期</th></tr>
<?php
$n = 1;
while ($row=mysql_fetch_array($result)){
    printf ("<tr><td>%s</td><td>%s</td><td><a href='../supply/show_supply.php?id=%s'>%s</a></td><td><a href='../worker/search_worker.php?id=%s'>%s</a></td><td>%s</td><td>%s</td><td>%s</td><tr>",$n,$row['name'],$row['sid'],$row['sid'],$row['charge'],$row['charge'],$row['price'],$row['amount'],$row['add_time']);
    $n = $n+1;
}
mysql_close($db);
?>
</table>
</div>
<?php include ("../template/tail.html");
?>
