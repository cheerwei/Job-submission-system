<!doctype html>
<?php  
global $conn;
$host="sqld-gz.bcehost.com:3306";
$user="6b5f2df40b524ec0af7b680e862f06b3";
$password="2ee91824934c4615b5b30e565f80f69b";
$dbname="HIZQwCwyLvUtwUKNSBtw";
// 创建连接  
$conn=mysql_connect($host,$user,$password,$dbname);//三个参数分别对应服务器名，账号，密码  
// 检测连接  
if (!$conn) {  
    die("连接服务器失败: " . mysql_connect_error());//连接服务器失败退出程序  
}   
?>