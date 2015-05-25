<?php
include ("../util.php");
handle_login();
utf8();
include ("../template/template.html");
?>
<div id="main">
    <p><a href="show_student.php">列出所有学生信息</a></p>
    <form action="search_student.php" method="get" >
    <p>查找学生 学号:<input type="text" name="id" value="">
    <input type="submit" value="Search"></p>
    </form>

    <form action="add_student.php" method="post" >
        <p>
            添加一个学生<br />
            学号<input type="text" name="id" value="" size=8>
            姓名<input type="text" name="name" value="" size=8>
            电话<input type="text" name="tel" value="" size=8>
            <input type="radio" name="sex" value="男" checked=true>男
            <input type="radio" name="sex" value="女">女
            <input type="submit" value="添加学生"> <input type="reset" value="清空">
        </p>
    </form>
</div>
<?php
include ("../template/tail.html");
?>


