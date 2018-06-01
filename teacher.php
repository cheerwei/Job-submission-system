<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>作业提交系统</title>
<link href="simpleGridTemplate.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
    <h4 class="logo">欢迎使用作业提交系统</h4>
  </header>
  <!-- Hero Section -->
  <section class="intro">
    <div class="column">
			<?php
		   include_once"session_check.php";
	include_once"../connect_mysql.php";
		   $username=$_SESSION['username'];
		   		$sql2 = "select name,number from loadin where username='$username'"; 
			$result2 = mysql_query($sql2,$conn);
	$result_arr1=array();
	while($arr2=mysql_fetch_row($result2)){
		list($c,$b)=$arr2;
		$_SESSION['name']=$c;
				$_SESSION['number']=$b;
    }
		echo "<h3>'$c'</h3>";
		   ?>
      <img src="images/profile.png" alt="" class="profile"> </div>
    <div class="column">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
    </div>
  </section>
  <!-- Stats Gallery Section -->
  <div class="gallery">
	  	<?php
	include_once"session_check.php";
	include_once"../connect_mysql.php";
	$username=$_SESSION['username'];
	$sql = "select 课程代码 from lesson where 教师用户名='$username'";  
	$result = mysql_query($sql,$conn);
	$result_arr=array();
	while($arr=mysql_fetch_row($result)){
		list($a)=$arr;
        $result_arr[] = $a;
    }
	for($length=0;$length<count($result_arr);$length++){
		$sql1="select 授课教师,授课地点,授课专业,课程名,图片地址 from lesson where 课程代码='$result_arr[$length]'";
		$result1=mysql_query($sql1);
		while($arr1=mysql_fetch_array($result1)){
			$teacher=$result_arr[$length]+"o";
			echo "<div class=thumbnail>";
			echo "<a href=./lesson/$result_arr[$length]/$teacher.php><img src=images/bkg_06.jpg alt='' width=314.467 class=cards/></a>";
			echo "<h4>".$arr1['课程名']."</h4>";
			echo "<p class=tag>".$result_arr[$length]."</p>";
			echo "<p class=text_column>".$result_arr[$length].$arr1['授课专业'].$arr1['授课教师'].$arr1['授课地点']."</p>";
			echo "<form method=post action=delete_lesson.php id=add>";
			echo "<select   name=select10    style='display:none;'>";
			echo "<option  value=".$result_arr[$length].">A</option>";
			echo "</select>";
			echo "<select   name=select11    style='display:none;'>";
			echo "<option  value=".$arr1['课程名'].">A</option>";
			echo "</select>";
			echo "<div ><button class=button type=submit>退选</button> </div>";
			echo "</form>";
			echo "</div>";
			}
	}
	
?>
  </div>

  <!-- Footer Section -->
  <footer id="contact">
    <p class="hero_header">添加课程</p>
    <div class="button"><a href="all_lessons.php">所有课程 </div>
  </footer>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2015 - <strong>GRID</strong></div>
</div>
<!-- Main Container Ends -->
</body>
</html>