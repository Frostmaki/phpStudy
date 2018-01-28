<?php

$config=include '../config.php';
$m=new Model();

$m->limit('0,5')->table('user')->field('userID,userName,password')->order('userID desc')->where('userID>0')->select;

var_dump($m->sql);

class Model{
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
		
		//连接数据库
		$this->link=$this->connect();
		
		//获得数据表名
		$this->tableName=$this->getTableName();
		
		//初始化Options数组
		$this->initOptions();
	}
	
	//连接数据库
	protected function connect(){
		$link=mysqli_connect($this->host,$this->user,$this->pwd);
		
		if(!$link){
			die('数据库连接失败');
		}
		
		mysqli_select_db($link,$this->db_name);
		
		mysqli_set_charset($link,$this->charset);
		
		return $link;
	}
	
	//获得数据表名
	//userModel--->user
	protected function getTableName(){
		if(!empty($this->tableName)){
			return $this->tableName;
		}
		
		$className=get_class($this);
		
		$table=strtolower(substr($className,0,-5));
		
		return $this->$table;
	}
	
	//初始化Options数组
	protected function initOptions(){
	
		$arr=['table','where','field','order','group','having','limit'];
		
		foreach($arr as $value){
			$this->options[$value]='';
			
			//设置表名字
			if($value=='table'){
				$this->options['value']=$this->tableName;
			}
		}
	}
	
	//field方法
	function field($field){
		//若不为空，继续
		if(!empty($field)){
			//若是字符串，直接传入
			if(is_string($field)){
				$this->options['field']=$field;
			}else if(is_array($field)){
				//若是数组，用，将数组拼接成字符串
				$this->options['field']=join(',',$field);
			}
		}
		return $this;
	}
	
	//table
	function table($table){
		if(!empty($table)){
			$this->options['table']=$table;
		}
		return $this;
	}
	
	//where
	function where($where){
		if(!empty($where)){
			$this->options['where']='where '.$where;
		}
		return $this;
	}
	
	//group
	function group($group){
		if(!empty($group)){
			$this->options['group']='group by '.$group;
		}
		return $this;
	}
	
	//having
	function having($having){
		if(!empty($having)){
			$this->options['having']='having '.$having;
		}
		return $this;
	}
	
	//order
	function order($order){
		if(!empty($order)){
			$this->options['order']='order by '.$order;
		}
		return $this;
	}
	
	//limit
	function limit($limit){
		if(!empty($limit)){
			if(is_string($limit)){
				$this->options['limit']='limit '.$order;
			}else if(is_array($limit){
				$this->options['limit']='limit '.join(',',$limit);
			}
		}
		return $this;
	}
	
	//select
	function select(){
		//带占位符的sql语句
		$sql='select %FIELD% from %TABLE% %where% %GROUP% %HAVING% %ORDER% %LIMIT%';
		
		//替换占位符
		$sql=str_replace(
		['%FIELD%','%TABLE%','%where%','%GROUP%','%HAVING%','%ORDER%','%LIMIT%'],
		[$this->options['field'],$this->options['table'],$this->options['where'],$this->options['group'],$this->options['having'],$this->options['order'],$this->options['limit']],
		$sql);
		
		//保存一份sql语句
		$this->sql=$sql;
		
		return $this->query($sql);
	}
	
	//query
	function query(){
		
	}
	//exec
	
	function _get($name){
		if($name=='sql'){
			return $this->sql;
		}
		return false;
	}
}