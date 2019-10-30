<?php if(!defined('IN_ROOT')){exit('Access denied');} ?>
<?php if(!$GLOBALS['userlogined']){exit(header('location:'.IN_PATH.'index.php/index'));} ?>
<?php
    // 登录id
   $userid=$_COOKIE["in_userid"];

		$codepay_id= "206049";//这里改成码支付ID
        $codepay_key="YQDFRDfUugk5FUzHhXHgCdd8r5tUK5w5"; //这是您的通讯密钥
		static $ORDERSN=array();                                        //静态变量
	    $ors=date('ymd').substr(time(),-3).rand(100000,999999);     //生成16位数字基本号
	    if (isset($ORDERSN[$ors])) {                                    //判断是否有基本订单号
	        $ORDERSN[$ors]++;                                           //如果存在,将值自增1
	    }else{
	        $ORDERSN[$ors]=rand(1,9);
	    }
	    $orderid = $ors.str_pad($ORDERSN[$ors],STR_PAD_LEFT,'0',2);     //链接字符串
		$num = 1;
        $price = $_REQUEST['price'];
	    $time=time();
        $GLOBALS['db']->query("insert INTO t_buy_log (user_id,price,time,zt,order_number) VALUES ('$userid','100','$time','0','$orderid')");
		//返回刚刚添加数据的id
		$log_id = $GLOBALS['db']->insert_id();
		
		$map = array(
                  "id" => $codepay_id,//你的码支付ID
                  "pay_id" => $orderid, //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
                  "type" => 1,//1支付宝支付 3微信支付 2QQ钱包
                  "price" =>  $price,//金额100元
                  "param" => $userid,//自定义参数
                  "notify_url"=>"https://www.92ff.cn/index.php/notify",//通知地址
                  "return_url"=>"https://www.92ff.cn/index.php/fang_add",//跳转地址
          		); //构造需要传递的参数
          		
		ksort($map); //重新排序$data数组
        reset($map); //内部指针指向数组中的第一个元素

        $sign = ''; //初始化需要签名的字符为空
        $urls = ''; //初始化URL参数为空
        foreach ($map as $key => $val) { //遍历需要传递的参数
            if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
            if ($sign != '') { //后面追加&拼接URL
                $sign .= "&";
                $urls .= "&";
            }
            $sign .= "$key=$val"; //拼接为url参数形式
            $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值

        }
        $query = $urls . '&sign=' . md5($sign .$codepay_key); //创建订单所需的参数
        
        // echo $query;
        $url = "http://api2.fateqq.com:52888/creat_order/?".$query; //支付页面
	    
		exit(header("location:".$url));
		
	// } 
?>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Title</title>-->
<!--</head>-->
<!--<body>-->
<!--<form class="el-form el-form--label-left" action="" method="post" style="width: 400px; margin-left: 50px;">-->
<!--<input name="addfangfeng" value="提交"  type="submit" class="el-button el-button--primary el-button--medium" />-->

<!--</form>-->
<!--</body>-->
<!--</html>-->