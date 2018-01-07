<?php
	header('Content-type:text/html;charset=utf-8');

	if(!isset($_POST['userName'])||!isset($_POST['password'])||!isset($_POST['cf_password'])){
		echo '请全部填写完';
		exit();
	}
	
	if(trim($_POST['password'])!=trim($_POST['cf_password'])){
		echo '上下密码不一致，请重新填写';
		exit();
	}
	
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	
	$db_conn=new mysqli('localhost','root','root','test');
	
	//连接失败
	if(mysqli_connect_errno()){
		echo 'Could not connect to database!';
		exit();
	}
	
	//首先查询是否存在同名
	$query_select="select * from test.user where userName='$userName'";
	
	$result_select=$db_conn->query($query_select) or die();
	
	if($result_select->num_rows){
		//存在相同的name password
		$_SESSION['defaultUser']=$userName;
		
		$return='用户名已被注册，请重新填写新用户名';
		echo $return;
		
		exit();
	}
	
	//插入数据
	$query_insert="insert into test.user (userName,password) values ('$userName','$password')";
	
	$result=$db_conn->query($query_insert)or die('error:'.mysqli_error());
	
	//检查搜索结果
	if($result!=false){
		
		$return='register success';
	}else{
		$return='register fail';
	}
	
	echo $return;
	
	//关闭连接
	$db_conn->close();
?>