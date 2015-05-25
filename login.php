<?php
include ("conn.php");
include ("util.php");
if(is_admin() == 1){
    header('location: /admin_manage.php');
}

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>北京大学食堂管理系统</title>
    <style type="text/css" media="screen">
        body{
background: url(/weimh.jpeg) no-repeat center #CCDCFD;
            text-align:center}
        form{
margin: 150px 100px;
  padding: 10px;
  width: 300px;
  height: 200px;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
  background: rgba(117, 134, 152,0.6);
  color: #fff;
  border: solid;
  border-radius: 30px;
  -webkit-box-shadow: 0 0 30px #fff;
        }
.str-input{
      font-size: 14px;
        padding-left: 20px;
}
    </style>
</head>
<body >
    <form action="./auth_login.php" method="post" accept-charset="utf-8" >
        <p style="padding: 10px 30px;
          text-align: center;
            font-size: 20px;;text-align:center">北京大学食堂管理系统</p>
        <p class="str-input">用户: <input type="text" name="username" value="" size=30></p>
        <p class="str-input">密码: <input type="password" name="password" value="" size=30></p>
        <p style="text-align:center"><input type="submit" value="登录"> <input type="reset" value="重置"></p>
    </form>
</body>
</html>

