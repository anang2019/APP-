<?php
if(!defined('IN_ROOT')){exit('Access denied');}
Administrator(1);
$serverip = gethostbyname($_SERVER['SERVER_NAME']);
$serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;
$serverinfo .= @ini_get('safe_mode') ? ' Safe Mode' : NULL;
$serversoft = $_SERVER['SERVER_SOFTWARE'];
$servermysql = $GLOBALS['db']->mysql_version();
$diskspace = function_exists('disk_free_space') ? floor(disk_free_space(IN_ROOT) / (1024*1024)).'M' : '<span style="color:#C00">unknow</span>';
$attachmentupload = @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '<span style="color:#C00">unknow</span>';
$check_mbstring = extension_loaded('mbstring') ? '<span style="color:#090">[√]</span>' : '<span style="color:#C00">[×]</span>';
$check_pdo_mysql = extension_loaded('pdo_mysql') ? '<span style="color:#090">[√]</span>' : '<span style="color:#C00">[×]</span>';
$check_allow_url_fopen = @ini_get('allow_url_fopen') ? '<span style="color:#090">[√]</span>' : '<span style="color:#C00">[×]</span>';
$check_fsockopen = function_exists('fsockopen') ? '<span style="color:#090">[√]</span>' : '<span style="color:#C00">[×]</span>';
$check_curl_init = function_exists('curl_init') ? '<span style="color:#090">[√]</span>' : '<span style="color:#C00">[×]</span>';
$sign = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from ".tname('sign')." where in_status=1"));
$signlog = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from ".tname('signlog')." where in_status=1"));
$user = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from ".tname('user')));
$app = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from ".tname('app')));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo IN_CHARSET; ?>" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>首页</title>
<link href="static/admincp/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">function $(obj) {return document.getElementById(obj);}</script>
<script type="text/javascript" src="static/admincp/js/ajax.js"></script>
<script type="text/javascript">window.onload = CheckBuild;</script>
</head>
<body>
<div class="container"><script type="text/javascript">parent.document.title = '小熊分发管理中心 - 首页';if(parent.$('admincpnav')) parent.$('admincpnav').innerHTML='首页';</script><div class="itemtitle"><h3>小熊分发管理中心</h3></div>
<?php if($sign > 0 || $signlog > 0){ ?>
<table class="tb tb2 nobdb fixpadding">
<tr><td><h3 class="left margintop">待处理事项:</h3>
<?php if($sign > 0){ ?><p class="left difflink"><a href="?iframe=sign&status=1">全网正在签名</a>(<em class="lightnum"><?php echo $sign; ?></em>)</p><?php } ?>
<?php if($signlog > 0){ ?><p class="left difflink"><a href="?iframe=signlog&status=1">本站正在签名</a>(<em class="lightnum"><?php echo $signlog; ?></em>)</p><?php } ?>
<div class="clear"></div></td></tr>
</table>
<?php } ?>
<table class="tb tb2 nobdb fixpadding">
<tr><th colspan="15" class="partition">数据统计</th></tr>
<tr>
<td><a href="?iframe=user">用户</a>(<em class="lightnum"><?php echo $user; ?></em>)</td>
<td><a href="?iframe=app">应用</a>(<em class="lightnum"><?php echo $app; ?></em>)</td>
</tr>
</table>
<table class="tb tb2 fixpadding">
<tr><th colspan="15" class="partition">系统信息</th></tr>
<tr><td class="vtop td24 lineheight">软件授权</td><td class="lineheight smallfont">小熊科技</td></tr>
<tr><td class="vtop td24 lineheight">程序版本</td><td class="lineheight smallfont">EarCMS <?php echo IN_VERSION; ?> 简体中文<?php echo strtoupper(IN_CHARSET); ?> <?php echo IN_BUILD; ?></td></tr>
<tr><td class="vtop td24 lineheight">服务器IP地址</td><td class="lineheight smallfont"><?php echo $serverip; ?></td></tr>
<tr><td class="vtop td24 lineheight">服务器系统及 PHP</td><td class="lineheight smallfont"><?php echo $serverinfo; ?></td></tr>
<tr><td class="vtop td24 lineheight">服务器软件</td><td class="lineheight smallfont"><?php echo $serversoft; ?></td></tr>
<tr><td class="vtop td24 lineheight">服务器 MySQL 版本</td><td class="lineheight smallfont"><?php echo $servermysql; ?></td></tr>
<tr><td class="vtop td24 lineheight">磁盘空间</td><td class="lineheight smallfont"><?php echo $diskspace; ?></td></tr>
<tr><td class="vtop td24 lineheight">附件上传</td><td class="lineheight smallfont"><?php echo $attachmentupload; ?></td></tr>
<tr><td class="vtop td24 lineheight">mbstring</td><td class="lineheight smallfont"><?php echo $check_mbstring; ?></td></tr>
<tr><td class="vtop td24 lineheight">pdo_mysql</td><td class="lineheight smallfont"><?php echo $check_pdo_mysql; ?></td></tr>
<tr><td class="vtop td24 lineheight">allow_url_fopen</td><td class="lineheight smallfont"><?php echo $check_allow_url_fopen; ?></td></tr>
<tr><td class="vtop td24 lineheight">fsockopen()</td><td class="lineheight smallfont"><?php echo $check_fsockopen; ?></td></tr>
<tr><td class="vtop td24 lineheight">curl_init()</td><td class="lineheight smallfont"><?php echo $check_curl_init; ?></td></tr>
</table>

</div>
</body>
</html>