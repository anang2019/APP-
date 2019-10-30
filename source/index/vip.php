<?php if(!defined('IN_ROOT')){exit('Access denied');} ?>
<?php

$userid=$_COOKIE["in_userid"];
	$post = $_REQUEST;
	$ac=$_REQUEST['act'];
	
	$db = extension_loaded('pdo_mysql') ? new db_pdo(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME) : new db_mysql(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME);
	



					
					


					
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="<?php echo IN_CHARSET; ?>">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
<meta name="keywords" content="<?php echo IN_KEYWORDS; ?>">
<meta name="description" content="<?php echo IN_DESCRIPTION; ?>">
<title>分发价格 - <?php echo IN_NAME; ?></title>
<link href="<?php echo IN_PATH; ?>static/index/icons.css" rel="stylesheet">
<link href="<?php echo IN_PATH; ?>static/index/bootstrap.css" rel="stylesheet">
<link href="<?php echo IN_PATH; ?>static/index/main.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo IN_PATH; ?>static/index/main.js"></script>
<script type="text/javascript" src="<?php echo IN_PATH; ?>static/pack/layer/jquery.js"></script>

<script type="text/javascript" src="<?php echo IN_PATH; ?>static/pack/layer/lib.js"></script>

   <script type="text/javascript" src="<?php echo IN_PATH; ?>static/index/laydate.js"></script>
    <script type="text/javascript" src="<?php echo IN_PATH; ?>static/pack/layer/confirm-lib.js"></script>
    
<script type="text/javascript" src="<?php echo IN_PATH; ?>static/index/lib.js"></script>
<script type="text/javascript">var in_path = '<?php echo IN_PATH; ?>';</script>
</head>
<body class="page-Pricing">
<nav class="navbar navbar-transparent" role="navigation">
<div class="navbar-header">
	<a class="navbar-brand" href="/index.php/index"><i class="icon-" style="font-size:<?php echo checkmobile() || strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') ? 30 : 40; ?>px;font-weight:bold"><?php echo $_SERVER['HTTP_HOST']; ?></i></a>
</div>
<style type="text/css">
	.black{
		    width: 100%;
		    height: 100%;
		    position: fixed;
		    top: 0;
		    z-index: 999;
		    background: #00000024;
		    display: none;
	}
	.alert{
		    width: 290px;
		    position: fixed;
		    top: 44%;
		    background: #fff;
		    height: 170px;
		    z-index: 1000;
		    left: 50%;
		    margin-left: -145px;
		    margin-top: -65px;
		    display: none;
	}
	.alert h1{
		    width: 100%;
		    height: 40px;
		    margin: 0;
		    background: #313639;
		    font-size: 16px;
		    line-height: 40px;
		    color: #fff;
		    padding-left: 4%;
	}
	.alert p{
    text-align: center;
    font-size: 14px;
    margin-top: 30px;
	}
	.alert-btn{
		    width: 40%;
		    height: 40px;
		    margin: 0 auto;
		    text-align: center;
		    background: #f8ba0b;
		    line-height: 40px;
		    border-radius: 4px;
		    color: #fff;
		    position: absolute;
		    left: 30%;
		    	cursor: pointer;
		    bottom: 10%;
	}
</style>

<div class="collapse navbar-collapse navbar-ex1-collapse" ng-controller="NavbarController">
	<div class="dropdown">
		<div>
			<i class="icon-brace-left"></i>
			<ul class="navbar-bracket">
				<li><a href="/index.php/index">首页</a><i class="icon-comma"></i></li>
				<li><a href="<?php echo IN_PATH.'index.php/install'; ?>">分发价格</a><i class="icon-comma"></i></li>
				<?php if(IN_SIGN){ ?><li><a href="<?php echo IN_PATH.'index.php/sign'; ?>">签名价格</a><i class="icon-comma"></i></li><?php } ?>
				<li><a href="<?php echo IN_PATH.'index.php/webview'; ?>">封装价格</a><i class="icon-comma"></i></li>
				<?php if($GLOBALS['userlogined']){ ?>
				<li><a href="<?php echo IN_PATH.'index.php/fang_add'; ?>">我的防封</a><i class="icon-comma"></i></li>
				<li class="signup"><a href="<?php echo IN_PATH.'index.php/logout'; ?>">退出</a></li>
				<?php }else{ ?>
				<li><a href="<?php echo IN_PATH.'index.php/login'; ?>">立即登录</a><i class="icon-comma"></i></li>
				<li class="signup"><a href="<?php echo IN_PATH.'index.php/reg'; ?>">免费注册</a></li>
				<?php } ?>
			</ul>
			<i class="icon-brace-right"></i>
		</div>
	</div>
</div>
</nav>
<div class="menu-toggle">
	<i class="icon-menu"></i>
</div>
<menu>
<ul>
	<li><a href="<?php echo IN_PATH; ?>">首页</a></li>
	<li><a href="<?php echo IN_PATH.'index.php/install'; ?>">分发价格</a></li>
	<?php if(IN_SIGN){ ?><li><a href="<?php echo IN_PATH.'index.php/sign'; ?>">签名价格</a></li><?php } ?>
	<li><a href="<?php echo IN_PATH.'index.php/webview'; ?>">封装价格</a></li>
	<?php if($GLOBALS['userlogined']){ ?>
	<li><a href="<?php echo IN_PATH.'index.php/home'; ?>">应用管理</a></li>
	<li><a href="<?php echo IN_PATH.'index.php/logout'; ?>">退出</a></li>
	<?php }else{ ?>
	<li><a href="<?php echo IN_PATH.'index.php/reg'; ?>">免费注册</a></li>
	<li><a href="<?php echo IN_PATH.'index.php/login'; ?>">立即登录</a></li>
	<?php } ?>
</ul>
</menu>
<div id="root-packages">
	<div class="banner banner-packages">
		<h1>
		<div class="brackets">
			<i class="icon-brace-left"></i><span>Vip充值</span><i class="icon-brace-right"></i>
		</div>

		</h1>
		<div class="pattern-bg"></div>
	</div>
	<div class="section packages-content">
		<h3>
		<div>开通VIP</div>
		</h3>
		<div class="package-cards-wrap">
			<div class="package-cards" id="package_content">
				<?php
				    $db = extension_loaded('pdo_mysql') ? new db_pdo(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME) : new db_mysql(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME);
					$query = $db->query("select * from prefix_vipprice where type=1");
					while($row = $db->fetch_array($query)){
					
				?>
				<div class="package-card">
					<div class="package-header">
						<h2><?php echo $row['name']?></h2>
					</div>
					<div class="package-content">
						<div>￥<?php echo $row['price']?>/月</div>
					</div>
					<div class="package-action">
						<button class="btn" onclick="goumai(<?php echo $row['id']?>)">购买</button>
					</div>
				</div>
				
				<?php
				
					}
				?>
				

				
			</div>
		</div>
		
		<script>
		
		function goumai(val){
			
		
			
			$.post("/index.php/phpapi",{id:val,act:'vipchongzhi'},function(data){
			      var data=eval("("+data+")"); 
			      console.log(data);
	               
	               
	               if(data.status =="success"){
	               	 
	               	layer.msg(data.message,3,1,function(){
	               	 	window.location.href="/index.php/fang_add";
	               	 });
	               	 
	    
	               	 
	               }else if(data.status =="yujing"){
	               	 alert("域名不够还差"+data.message+"个，请联系管理员");
	               }else if(data.status =="error"){
	               	
	               	 $("#haixuyuan").text(data.message);
	                 $('.black').show()
			         $('.alert').show()
	               	
	               }else if(data.status =="not"){
	               	
	                 alert(data.message);
	               	
	               }
	               
	               
	               
	               
	               
			 });
			
			
		}
		
		
		
	</script>
	
		<small>防封效果一流，可联系客服测试效果。每次购买可延长30天vip使用期限，如需包年或私有方案定制，请联系&nbsp;<a href="mailto:<?php echo IN_MAIL; ?>"><?php echo IN_MAIL; ?></a></small>
	</div>
	<div class="section packages-cert">
		<div class="cert-header">
			<i class="icon icon-users"></i>
		</div>
		<div class="cret-row-wrap">
			<div class="cert-row">
				<div class="half text-right">
					<div class="cert-item">每日登录</div>
					<ul class="list-unstyled cert-list">
						<li><?php echo IN_LOGINPOINTS; ?> 免费下载点数</li>
						<li>先体验后选择</li>
					</ul>
				</div>
				<div class="half text-left">
					<div class="cert-item">充值汇率</div>
					<ul class="list-unstyled cert-list">
						<li><?php echo IN_RMBPOINTS; ?> 下载点数/每元</li>
						<li>签约微信支付</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!--弹窗-->
	<div class="black"></div>
	<div class="alert">
		<h1>余额不足</h1>
		<p>您还需充值<span id="haixuyuan"></span>元购买此商品</p>
		<div class="alert-btn" id="gochongzhi">前往充值</div>
	</div>
	<script type="text/javascript">
		$(function(){
			
			$("#gochongzhi").click(function(){
				
				  console.log($("#haixuyuan").text());
				  window.location.href="/index.php/alipay?price="+$("#haixuyuan").text();
				 // $.post("https://www.92ff.cn/index.php/notify",{price:$("#haixuyuan").text()},function(data){
				 //      var data=eval("("+data+")"); 
				 //      console.log(data);
	    //               alert(data.message);
	                   
	    //               window.location.href="";
	                   
				 //});
								 
				  //alert();
				
			})
			
			$('.black').click(function(){
				$('.black').hide()
				$('.alert').hide()
			})
		})
	</script>
	
	<?php include 'source/index/faq.php'; ?>
</div>
<div class="dialog-mask" style="display:none"></div>
<div class="dialog buy-confirm" style="display:none">
	<header class="text-center">微信扫码支付</header>
	<div class="content"><center><img id="qrcode"></center></div>
	<div class="actions text-center">
		<button class="btn btn-default" style="margin-bottom:10px" onclick="$('.dialog-mask').hide(),$('.buy-confirm').hide()">放弃购买</button><button class="btn btn-yellow" style="margin-bottom:10px" onclick="location.href='<?php echo IN_PATH.'index.php/home'; ?>'">购买成功，马上查看</button>
	</div>
</div>
<?php include 'source/index/bottom.php'; ?>

</body>
</html>