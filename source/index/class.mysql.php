<?php
// we use the old mysql
	class dbmysql {
		var $link = null;

		function __construct()
		{
			include('config.mysql.php');
			$this->link = @mysql_connect($db_host.':'.$db_port,$db_user,$db_pass);
			if (!$this->link) die('Connect Error (' . mysql_errno() . ') '.mysql_error());
			mysql_select_db($db_database, $this->link) or die(mysql_error($this->link));

			mysql_query("set sql_mode = ''");
			//字符转换，读库
			mysql_query("set character set 'utf8'");
			//写库
			mysql_query("set names 'utf8'"); 

			return true;
		}
		/*function __construct($db_host,$db_user,$db_pass,$db_name,$db_port)
		{

			$this->link = @mysql_connect($db_host.':'.$db_port, $db_user, $db_pass);
			if (!$this->link) die('Connect Error (' . mysql_errno() . ') '.mysql_error());
			mysql_select_db($db_name, $this->link) or die(mysql_error($this->link));

			mysql_query("set sql_mode = ''");
			//字符转换，读库
			mysql_query("set character set 'utf8'");
			//写库
			mysql_query("set names 'utf8'"); 

			return true;
		}*/
		function fetch($q)//参数是记录集
		{
			return mysql_fetch_assoc($q);  //从结果集中取得一行作为关联数组
		}
		function get_jlj($q){//参数是sql
			return mysql_query($q, $this->link);  //返回记录集
		}
		function get_row($q){//参数是sql
			$result = mysql_query($q, $this->link);
			if($result==false){
				return false;
			}
			return mysql_fetch_assoc($result);//函数从结果集中取得一行作为关联数组 如果没有更多行，则返回 false。

		}
		function get_sl($q){//参数是sql
			$result = mysql_query($q, $this->link);
			return mysql_num_rows($result);//函数从结果集中取得一行作为关联数组 如果没有更多行，则返回 false。

		}
		function count($q){
			$result = mysql_query($q, $this->link);
			$count = mysql_fetch_array($result);
			return $count[0];
		}
        function sql($q){
			return mysql_query($q, $this->link);//发送一条 MySQL 查询
			//仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，如果查询执行不正确则返回 FALSE。
		}
		function sqlgl($str){//过滤不安全字符
			return mysql_real_escape_string($str, $this->link);
		}
		function qyxh(){
			return mysql_affected_rows($this->link);//函数返回前一次 MySQL 操作所影响的记录行数
		}
		function qsybid($q){//取得上一步 INSERT 操作产生的 ID
			if(mysql_query($q, $this->link))
				return mysql_insert_id($this->link);
			return false;
		}
		function crjl($table,$array){//插入记录   参数2为关联数组
			$q = "INSERT INTO `$table`";
			$q .=" (`".implode("`,`",array_keys($array))."`) ";
			$q .=" VALUES ('".implode("','",array_values($array))."') ";

			if(mysql_query($q, $this->link))
				return true;
			return false;
		}
		/*function update($table,$tj,$xm){//刷新记录   参数2为关联数组
			$q = "UPDATE `$table`";
			$q .=" SET".$xm;
			if($tj!=''){
				$q .=" WHERE ".$tj;
			}

			if(mysql_query($q, $this->link))
				return true;
			return false;
		}*/
		function error(){
			$error = mysql_error($this->link);
			$errno = mysql_errno($this->link);
			return '['.$errno.'] '.$error;
		}
		function close(){
			$q = mysql_close($this->link);
			return $q;
		}
	}
?>