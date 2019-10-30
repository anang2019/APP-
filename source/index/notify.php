<?php 

// echo "123456";
    $db = extension_loaded('pdo_mysql') ? new db_pdo(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME) : new db_mysql(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME);
    
    $post = $_REQUEST;
	ksort($post); //排序post参数
	reset($post); //内部指针指向数组中的第一个元素
	$codepay_key="YQDFRDfUugk5FUzHhXHgCdd8r5tUK5w5"; //这是您的密钥
	$sign = '';//初始化
	foreach ($post as $key => $val) { //遍历POST参数
	if ($val == '' || $key == 'sign') continue; //跳过这些不签名javascript:;
	if ($sign) $sign .= '&'; //第一个字符串签名不加& 其他加&连接起来参数
	$sign .= "$key=$val"; //拼接为url参数形式
	}
	// var_dump($post);
	if (!$post['pay_no'] || md5($sign . $codepay_key) != $post['sign']) { //不合法的数据
            exit('fail1');  //返回失败 继续补单
    } else { //合法的数据
        //业务处理
        
        $pay_id = $post['pay_id']; //需要充值的ID 或订单号 或用户名
        //$money = (float)$post['money']; //实际付款金额
        $price =  $post['price']; //订单的原价
        $param = $post['param']; //自定义参数
       // $pay_no = $post['pay_no']; //流水号
        $query = $db->query("select * from t_buy_log where order_number=".$pay_id." and zt='0' ");
	
		// $row = $db->fetch_array($query);
		
		while($row = $db->fetch_array($query)){
		
	
			if($row){
				// echo "1111";
				// $db->query('UPDATE '.tname($tablename).' SET '.$setsql.' WHERE '.$where, $silent ? 'SILENT' : '');
				$db->query("update t_buy_log set zt= 1 where order_number=".$pay_id);
				
            	$db->query("update prefix_user set user_money=user_money+".$price." where in_userid=".$row['user_id']);
            	
			   	exit('success');	
			}else{
				exit('fail');
				 //return 'fail';
			}
		}
		
		
    }
          
?>