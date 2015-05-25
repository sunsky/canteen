<?php
include ("../conn.php");
include ("../util.php");
handle_login();
utf8();

if (! isset($_GET['id']))
    die ("查询工人信息，姓名或编号不能为空");
$id = remove_unsafe_char($_GET['id']);
if (is_numeric ($id))
    $sql = "select wid,worker.name wname,sex,jobs.name jname,salary from worker,jobs where worker.wid='$id'and worker.jid = jobs.jid";
else
    $sql = "select wid,worker.name wname,sex,jobs.name jname,salary from worker,jobs where worker.jid = jobs.jid and worker.name like '$id%'";

$result = mysql_query($sql,$db);
if (! $result)
    die ("查询工人信息失败" . mysql_error());

echo "<h3>员工信息</h3>";
while($row = mysql_fetch_array($result)){
    echo "<table width='200'> <tr><td>序号</td><td>" . 
        $row['wid'] . "</td><tr><tr><td>姓名</td><td>" . 
        $row['wname'] ."</td></tr><tr><td>性别</td><td>" .
        $row['sex'] . "</td></tr><tr><td>职位</td><td>" . 
        $row['jname'] . "</td></tr><tr><td>薪水</td><td>" . 
        $row['salary'] . "</td></tr></table><br/>" ;
}
mysql_close($db);
?>
