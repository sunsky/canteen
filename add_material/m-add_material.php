<?php
include ("../conn.php");
include ("../util.php");
m1_login();

utf8();
$sql_mate = "select * from material";
$sql_supp = "select * from supply";
$sql_work = "select * from worker";

$result_1 = mysql_query($sql_mate,$db);
$result_2 = mysql_query($sql_supp,$db);
$result_3 = mysql_query($sql_work,$db);

if (! $result_1)
    die ("查询食材记录失败 ! " . mysql_error());
if (! $result_2)
    die ("查询供应商失败 ! " . mysql_error());
if (! $result_3)
    die ("查询员工信息失败 ! " . mysql_error());
if (is_admin()): include ("../template/template.html");
else :
?>
<html>
    <head>
        <title>查询消费记录</title>
        <style type="text/css" media="screen">
            body{margin:0px; padding:0px; background:#f3f3f3; text-align:center;}
            #main {width:600px; background:white; margin:0 auto; margin-top:30px; padding:10px; text-align:center;}
            #main {-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius:10px; }
            td {border-bottom:1px dashed #ccc; padding:5px 25px; text-align:center;}
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
<form action="add_material_record.php" method="post">
    <b>食材进货管理 </b>
    <p><a href="show_add_material.php">查看所有进货记录</a>&nbsp;&nbsp;&nbsp;&nbsp;添加进货记录</p>
    <table >
        <tr><td>食材</td><td>
        <select name="material"><?php while ($row_1 = mysql_fetch_array($result_1)) printf ("<option value='%s'>%s</option>",$row_1['mid'],$row_1['name']); ?>
        </select></td></tr>
        <tr><td>供应商</td><td>
        <select name="supply"><?php while ($row_2 = mysql_fetch_array($result_2)) printf ("<option value='%s'>%s</option>",$row_2['sid'],$row_2['name']); ?>
        </select></td></tr>
        <tr><td>饭堂负责人</td><td>
        <select name="charge"><?php while ($row_3 = mysql_fetch_array($result_3)) printf ("<option value='%s'>%s</option>",$row_3['wid'],$row_3['name']); ?>
        </select></td></tr>
        <tr><td>单价(元/公斤)</td><td><input type="text" name="price" value=""></td></tr>
        <tr><td>数量(公斤)   </td><td><input type="text" name="account" value=""></td></tr>
    </table>
    <p><input type="submit" value="提交" ><input type="reset" value="重置"></p>
</form>
</div>
<?php include ("../template/tail.html"); ?>
