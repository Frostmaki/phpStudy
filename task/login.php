<?php
	session_start();
	
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	
	$db_conn=new mysqli('localhost','root','root','test');
	
	//连接失败
	if(mysqli_connect_errno()){
		echo 'Could not connect to database!';
		exit();
	}
	
	//使用数据库
	//$db_conn->select_db(test);
	
	//查询数据库中是否有相同的
	$query="select * from test.user where userName='$userName'and password='$password'";
	
	$result=$db_conn->query($query) or die('error:'.mysql_error());
	
	//检查搜索结果
	if($result->num_rows){
		//存在相同的name password
		$_SESSION['defaultUser']=$userName;
		
		$return='login success';
	}else{
		$return='login fail';
	}
	
	echo $return;
	
	//关闭连接
	$result->free();
	$db_conn->close();
	
	
	
?>