<?php
include ("../util.php");
handle_login();
utf8();
include ("../template/template.html");
?>
<div id="main">
    <p><a href="show_custom.php">列出所有消费者信息</a></p>

    <form action="search_custom.php" method="get" >
        <p>查找消费者 编号:<input type="text" name="id" value="">
        <input type="submit" value="Search"></p>
    </form>

    <form action="add_custom.php" method="post" >
        <p>
        添加一个消费者<br />
        编号<input type="text" name="id" value="" size=8>
        金额(元)<input type="text" name="money" value="" size=8>
        <input type="submit" value="添加消费者"> <input type="reset" value="清空">
        </p>
    </form>
</div>
<?php
include ("../template/tail.html");
?>



