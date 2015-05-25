<?php
$username = "www";
$password = "p@ssw0rd";
$hostname = "localhost";

$db_name = "canteen"; // 餐厅

$db = mysql_connect($hostname, $username,$password);
mysql_select_db($db_name,$db);

//学生表
$student = "create table if not exists student (
    sid char(10) primary key,
    name char(10) not null,
    sex char(3) not null,
    tel varchar(13)) engine=innodb";

// 消费者
$custom = "create table if not exists custom (
    cid char(10) primary key ,
    cur_money float,
    foreign key (cid) references student(sid) on delete cascade on update cascade ) engine=innodb";

//供应商
$supply = "create table if not exists supply (
    sid int primary key auto_increment,
    name char(10) not null,
    sex char(3) not null,
    tel varchar(13), 
    address char(100), 
    description char(200),
    add_time datetime)";

//职位
$jobs = "create table if not exists jobs ( 
    jid int primary key auto_increment,
    name char(100) not null,
    salary float )";   //薪水

//饭堂员工
$worker = "create table if not exists worker (
    wid int primary key auto_increment,
    name char(10) not null,
    sex char(3) ,
    jid int,
    birth date,
    foreign key (jid) references jobs(jid))";

// 食材
$material = "create table if not exists material (
    mid int primary key auto_increment,
    name char(20),
    description char(200))";

// 食物
$food = "create table if not exists food (
    fid int primary key auto_increment,
    name char(20),
    description char(200),
    price float not null)";

// 食材进货表
$add_material = "create table if not exists add_material (
    aid int primary key auto_increment,
    mid int,
    sid int,
    price float not null,
    amount float not null,
    add_time datetime,
    charge int,
    foreign key (mid) references material(mid),
    foreign key (sid) references supply(sid),
    foreign key (charge) references worker(wid))";

// 消费记录
$custom_record = "create table if not exists add_custom_record (
    id int primary key auto_increment,
    cid char(10),
    money float not null,
    operator int not null,
    add_time datetime,
    add_date date,
    foreign key (cid) references custom(cid))";

// 帐号表
$manage = "create table if not exists manage (
    id int primary key auto_increment,
    username char(20) not null unique,
    password char(32) not null ,
    proi int not null )";

function create_table ($sql,$table){
    global $db;
    $result = mysql_query($sql,$db);
    if (! $result){
        echo mysql_error(), '<br/>';
        mydie("创建表 $table 失败<br>");
    }else
        echo "成功创建表 $table<br>";
} 


function mydie($info){
    echo $info;
    exit();
}

create_table($student,"student");
create_table($custom,"custom");
create_table($supply,"supply");
create_table($jobs,"jobs");
create_table($worker,"worker");
create_table($material,"material");
create_table($food,"food");
create_table($add_material,"add materail");
create_table($custom_record,"add custom record");
create_table($manage,"manage");


function add_jobs () {
    $sql = "insert into jobs (name) values ('系统管理员')";
    if (! mysql_query ($sql,$db))
        mydie("创建职位失败<br>");
    else
        echo "成功创建一条职位记录<br>";
}

function add_worker (){
    $sql = "insert into worker (name) values ('系统管理员')";
    if (! mysql_query ($sql,$db))
        mydie("创建员工失败<br>");
    else
        echo "成功创建一个员工<br>";
}


function add_admin (){
    global $db;
    $canteen_admin = "wuqj";
    $canteen_admin_pass = "hello";
    $canteen_admin_pass_cry = md5($canteen_admin_pass);
    $sql = "insert into manage (username,password,proi) values ('$canteen_admin','$canteen_admin_pass_cry',0)";
    if (! mysql_query($sql,$db))
        echo ("创建管理员失败<br>");
    else
        echo "<b>成功创建管理员帐号! 用户名: $canteen_admin, 密码: $canteen_admin_pass</b><br>";
}

add_admin();
?>
<br/><a href="login.php">登录</a>

