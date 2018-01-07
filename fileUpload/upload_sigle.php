<html>
<head>
	<meta charset='utf-8'>
</head>
<body>
Uploading...

<?php
	/*
	 *array $file;
	 *array $allow_type;允许上传的MIME类型
	 *array $allow_format=array();允许上传的文件格式
	 *string $path;
	 *string $error;
	 *int $max_size=2000000;
	 */

	function upload($file,$path,$allow_type,$allow_format=array(),$max_size=2000000,&$error){
		
		var_dump(isset($file['error']));
		
		//判断文件是否有效
		if(!is_array($file)||isset($file['error'])){
			//文件无效
			$error='文件无效';
			return false;
		}
		
		//判断文件存储路径是否有效
		if(!is_dir($path)){
			//路径不存在
			$error='文件存储路径不存在';
			return false;
		}
		
		//判断文件上传过程是否出错
		switch($file['error']){
			case 1:
			case 2:
				$error='文件超出服务器允许大小';
				return false;
			case 3:
				$error='文件上传过程出错，只上传了一部分';
				return false;
			case 4:
				$error='用户没有选中要上传的文件';
				return false;
			case 6:
			case 7:
				$error='文件保存失败';
				return false;
			
		}
		
		//判断MIME类型
		if(!in_array($file['type'],$allow_type)){
			//该文件不允许上传
			$error='该文件不允许上传';
			return false;
		}
		
		//判断后缀是否允许
		//取出后缀
		$ext=ltrim(strstr($file['name'],'.'),'.');
		if(!empty($allow_format)&&!in_array($ext,$allow_format)){
			//不允许上传
			$error='该文件后缀不允许上传';
			return false;
		}
		
		//判断当前文件大小是否满足当前需求
		if($file['size']>$max_size){
			//文件过大
			$error='当前上传文件超出大小限制';
			return false;
		}
	
	
		//判断文件保存的位置是否存在，若不存在则创建
		$dir=$_SERVER['DOCUMENT_ROOT'];
		$dir=$dir.'/uploads';
		if(!is_dir($dir)){
			mkdir($dir);
		}else{
			return "创建文件夹 错误";
		}
		//构建文件名字，有类型，时间，随机数组成
		$newname=strstr($file['type'],'/',true).date('Ymd');
		
		//随机数
		for($i=0;$i<4;$i++){
			$newname.=chr(mt_rand(65,90));
		}
		
		//加上文件后缀
		$newname.='.'.$ext;
		
		//上传文件
		//判断是否是上传文件
		if(is_uploaded_file($file['tmp_name'])){
			//成功
		    //是否可以有临时文件夹保存到设定的文件路径
			if(move_uploaded_file($file['tmp_name'],$path.'/'.$newname)){
				return $path.'/'.$newname;
			}else{
				return "move false";
			}
		}else{
			$error='不是上传文件';
			return false;
		}
		
	}
	echo '<pre>';
	$file=$_FILES['image'];
	$path='uploads';
	$allow_type=array('image/jpg','image/png','image/gif','image/jpeg');
	$allow_format=array('jpg','png','gif','jpeg');
	$max_size=8000000;
	
	var_dump(is_array($file));
	
	if($result=upload($file,$path,$allow_type,$allow_format,$max_size,$error)){
		echo $result;
	}else{
		echo $error;
	};
	
	
	
?>
</body>
</html>