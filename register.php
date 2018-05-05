<!doctype html>
<?php
header("Content-type:text/html;charset=utf-8");
include_once"connect_mysql.php";
$username=$_POST["username"];
$password=$_POST["password"];
$password2=$_POST["password2"];
$usertype=$_POST["radio1"];
if($username == "" || $password == "")  {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
       }  
else if($password==$password2){
	$sql="insert into loadin(usertype,username,password) values('$usertype','$username','$password2')";
    $result=mysql_query($sql,$conn);
	if($result && strcmp($usertype,"teacher")==0){
		echo "<script> alert('注册成功！');parent.location.href='teacher.html'; </script>";}
	else if($result && strcmp($usertype,"student")==0){
		echo "<script> alert('注册成功！');parent.location.href='student.html'; </script>";
	}	
    else{
	echo("insert error!");}
} 
else{
	echo "<script>alert('输入错误，请重新输入'); history.go(-1);</script>";
}
?>