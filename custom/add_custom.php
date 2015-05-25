<?php 
include ("../conn.php"); 
include ("../util.php");
handle_login();
header('Content-Type:text/html;charset=utf-8');

if (isset($_POST['id']) and isset($_POST['money']) ){
    $id = $_POST['id'];
    $money = $_POST['money'];
    if (has_unsafe_char($id) or has_unsafe_char($money))
        die ("不允许加入特殊字符!<br>");

    $id = remove_unsafe_char($id);
    $money = remove_unsafe_char($money);
    $sql = "insert into custom values ('$id','$money')";
    $result = mysql_query($sql,$db);
    if (! $result)
        die ("添加消费者信息失败<br/>" . mysql_error());
    else{
        $url = referer("m-custom.php");
        echo "成功添加一个消费者信息!<br/>";
        echo "<a href='$url'>返回</a>";
    } 
}


?>
