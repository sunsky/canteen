<?php
function is_user(){
    @session_start();
    if (isset($_SESSION['user']))
        return 1;
    else
        to_login();
}

function is_admin(){
    @session_start();
    if (isset($_SESSION['admin']))
        return 1;
    else
        return 0;
}

function to_login(){
    Header("Location: /login.php");
    exit;
}
function handle_login(){
    if (is_admin() == 0)
        to_login();
}

function m1_login(){
    session_start();
    if (!isset($_SESSION['m1']) and !isset($_SESSION['admin'])){
        Header("Location: /login.php");
        exit;
    }
}

function m2_login(){
    session_start();
    if (!isset($_SESSION['m2']) and !isset($_SESSION['admin'])){
        Header("Location: /login.php");
        exit;
    }
}

function has_unsafe_char($str){
    $chars = array(" ","%","/","\\",'"',"'","=",">",'<');
    foreach ($chars as $value)
        if (strpos($str,$value))
            return 1;
    return 0;
}

function remove_unsafe_char($str){
    $temp = $str;
    $chars = array(" ","%","/","\\",'"',"'","=",">",'<');
    foreach ($chars as $value)
        $temp = str_replace($value,'',$temp);
    return $temp;
}

function referer ($str){
    if (! isset ($_SERVER['HTTP_REFERER']))
        $url = $str;
    else
        $url = $_SERVER['HTTP_REFERER'];
    return $url;
}

function jumpto($str){
    Header("Location: $str");
} 

function utf8(){
    header("Content-type: text/html; charset=utf-8");
}
?>
