<?php
include ("../util.php");
include ("../conn.php");
utf8();
if (! isset($_POST['id']) or $_POST['id']=="")
    die ("请输入学号!");

$id = remove_unsafe_char($_POST['id']);
if (! is_numeric($id))
    die ("学号要为数字!");
if (! isset($_POST['food']))
    die ("请选择饭菜!");
$foods = $_POST['food'];
if (! $foods)
    die ("请选择饭菜!");

$sql = "select * from custom where cid=$id";
$result = mysql_query ($sql,$db);
if (! $result)
    die ("查询消费者信息出错<br/>" . mysql_error());

$custom = mysql_fetch_array($result);
if (! $custom)
    die ("没有该消费者的信息");

$money = 0;
foreach ($foods as $food){
    if (! is_numeric($food))
        die ("出错");
    $food = remove_unsafe_char($food);
    $result2 = mysql_query("select price from food where fid=$food");
    if (! $result2)
        die ("查询食物价格出错!<br/>" . mysql_error());
    $row2 = mysql_fetch_row($result2);
    if (! $row2)
        die ("没有该食物!");
    $money += $row2[0];
}
if ($money > $custom['cur_money'])
    die ("当前金额不够，请先冲值!");
else {
    $sql_sub = "update custom set cur_money = cur_money-$money where cid=$id";
    $result3 = mysql_query($sql_sub,$db);
    if (! $result3)
        die ("修改消费者金额失败! " . mysql_error());
    
    $result4 = mysql_query("insert into add_custom_record (cid,money,operator,add_time,add_date) values ('$id',$money,1,now(),curdate())");
    if (! $result4)
         die ("添加消费记录失败" . mysql_error());
    mysql_close($db);
}
?>

<html>
    <head>
        <title>模拟就餐刷卡</title>
        <style type="text/css" media="screen">
            body{margin:0px; padding:0px; background:#f3f3f3; text-align:center;}
            #main {width:600px; height:150px; background:white; margin:0 auto; margin-top:30px; padding:10px; text-align:center;}
            #main {-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius:10px; }
        </style>
    </head>
    <body>
        <div id="main">
            <h3>点菜成功</h3>
            <p>您本次消费</span> <?php echo $money; ?> 元</p>
            <p>您当前的帐号余额为 <?php echo $custom['cur_money']-$money; ?> 元</p>
            <a href='add_eating.php' style="font-size:13px;">返回</a>
        </div>
    </body>
</html>
