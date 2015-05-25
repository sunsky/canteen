<?php
header("Content-type: text/html; charset=utf-8");
?>
<html>
    <head>
        <title>模拟就餐刷卡</title>
        <style type="text/css" media="screen">
            body{margin:0px; padding:0px; background:#f3f3f3; text-align:center;}
            form {width:600px; background:white; margin:0 auto; margin-top:30px; padding:10px; text-align:center;}
            form {-moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius:10px; }
            td {border-bottom:1px dashed #ccc; padding:5px 25px; text-align:center;}
        
        </style>
    </head>
    <body>
        <form action="add_custom_record.php" method="post">
            <h3> 模拟就餐刷卡 </h3>
            <p>学号<input type="text" name="id" size=20><input type="submit" value="点菜!"> <input type="reset" value="清空"></p>
            <table >
                <tr><th> 序号 </th><th> 菜名 </th><th> 价格(元) </th><th> 描述 </th><th> 选择 </th></tr>
            <?php
                    include ("../conn.php");
                    include ("../util.php");
                    utf8();
                    $sql = "select * from food ";
                    $result = mysql_query($sql,$db);
                    if (! isset($result))
                        die("查询食物失败! <br/>".mysql_error());
                    $n = 1;
                    while ($row = mysql_fetch_array($result)){
                        printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td>",$n,$row['name'],$row['price'],$row['description']);
                        printf("<td><input type='checkbox' name='food[]' value='%s'></td></tr>",$row['fid']);
                        $n = $n + 1;
                    } 
                    mysql_close($db);
                    ?>
        </form>
    <body>
</html>
