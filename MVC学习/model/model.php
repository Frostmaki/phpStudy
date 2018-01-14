<?php
include '../config.php';

class model{
	//主机名
	protected $host;
	
	//用户名
	protected $user;
	
	//用户密码
	protected $pwd;
	
	//数据库名
	protected $dbname;
	
	//字符集
	protected $charset;
	
	
	//数据库连接资源
	protected $link;
	
	//数据表名
	protected $tableName;
	
	
	//sql语句
	protected $sql;
	
	
	//操作数组
	protected $options;
	
	
	//构造方法，初始化
	function _construct($config){
		$this->host=$config['DB_HOST'];
		$this->user=$config['DB_USER'];
		$this->pwd=$config['DB_PWD'];
		$this->dbname=$config['DB_NAME'];
		$this->charset=$config['DB_CHARSET'];
		
		$this->link=$this->connect();
		
		$this->tableName=$this->getTableName();
		
		$this->initOptions();
	}
	
	protected function connect(){
		$link=mysqli_connect($this->host,$this->user,$this->pwd);
		
		if(!$link){
			die('数据库连接失败');
		}
		
		mysqli_select_db($link,$this->db_name);
		
		mysqli_set_charset($link,$this->charset);
		
		return $link;
	}
	
	protected function getTableName(){
		if(!empty($this->tableName)){
			return $this->tableName;
		}
		
		$className=get_class($this);
		
		$table=strtolower(substr($className,0,-5));
		
		return $this->$table;
	}
	
	protected function initOptions(){
		$arr=['table','where','field','order','group','having','limit'];
	}
}