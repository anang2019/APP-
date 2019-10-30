<?php

if(!defined('IN_ROOT')){exit('Access denied');}

Administrator(6);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo IN_CHARSET; ?>" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>所有应用</title>
<link href="static/admincp/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/pack/layer/jquery.js"></script>
<script type="text/javascript" src="static/pack/layer/confirm-lib.js"></script>
<script type="text/javascript">
function del_msg(href) {
	$.layer({
		shade: [0],
		area: ['auto', 'auto'],
		dialog: {
			msg: '卸载操作不可逆，确认继续？',
			btns: 2,
			type: 4,
			btn: ['确认', '取消'],
			yes: function() {
				location.href = href;
			},
			no: function() {
				layer.msg('已取消卸载', 1, 0);
			}
		}
	});
}

	      function feng_add_domain(){
	      	var val=$('#input_2').val();
	      	var domain=$('#intdomain').val();
	      	if(domain==""){
	      		alert("没有输入域名!");
	        		return;
	      	}
	      	if(val!=""){
	      		if(val.indexOf(".")<0){
	        		alert("二级域名的主域名填写错误!");
	        		return;
	        	} 

				var ls=domain.split(String.fromCharCode(10));
				var tt="";
				for(var i=0;i<ls.length;i++){
					tt+=ls[i]+"."+val+",";
				}
				
				domain=tt;
	      	}else if(domain.indexOf(".")<0){
        		alert("域名填写错误!");
        		return;
        	} 
            $.post("/index.php/phpapi",{yumingid:domain,act:'feng_add_domain'},function(data){
                var data=eval("("+data+")");
                console.log(data)
                if(Number(data.status)>0){
                	$('#input_2').val("");
                	$('#intdomain').val("");
                	$('#aab').val(data.allnum);
                	
                	$('#aac').val(data.num);
                }
                alert("添加了 "+data.status+"个域名!");
            });
        }
</script>



</head>
<body>
<?php
$action=SafeRequest("ac","get");
if($action=="uninst"){del_plugin($_GET['id'],$_GET['dir']);}
?>
<div class="container">
<script type="text/javascript">parent.document.title = '小熊分发管理中心 - 防封管理';if(parent.$('admincpnav')) parent.$('admincpnav').innerHTML='防封管理';</script>
<div class="floattop"><div class="itemtitle"><h3>所有应用</h3></div></div><div class="floattopempty"></div>
<table class="tb tb2">
<tr><th class="partition">域名管理</th>

</tr>
<?php
$sql = "select count(*) from t_domain";
$query = $db->query($sql);

$sql = "select count(*) from t_domain where pid=0";
$query1 = $db->query($sql);

echo "<tr><th id=\"aab\" class=\"partition\">域名总数  :".$db->num_rows($query)."</th></tr>";
echo "<tr><th id=\"aac\" class=\"partition\">未使用域名:".$db->num_rows($query1)."</th></tr>";
?>
</table>
<table class="tb tb2">
<?php
global $db,$develop_auth;
$sql = "select * from ".tname('plugin')." where in_type>0 order by in_addtime desc";
$query = $db->query($sql);
$count = $db->num_rows($db->query(str_replace('*', 'count(*)', $sql)));

?>
</table>
<table class="tb tb2">
<tr><th class="partition"></th></tr>
<tr style="overflow:hidden">
	<input id="input_2" width="200px" height="400px" style="float:left" placeholder="二级域名,不是可不填"></input>
	<input type="button" value="添加域名" onclick="feng_add_domain()"  style="margin-left: 10px;float:left">
</tr>
<tr> <textarea style="height: 388px;width: 230px;margin-right: 20px;    margin-left: 20px;" id="intdomain" placeholder="输入域名"></textarea></tr>

</table>
<table class="tb tb2">
<?php


$count = $db->num_rows($db->query(str_replace('*', 'count(*)', $sql)));
if($count==0){
        echo "<tr><td colspan=\"2\" class=\"td27\">暂无扩展</td></tr>";
}else{
        while($row = $db->fetch_array($query)){
                echo "<tr class=\"hover hover\">";
                echo "<td valign=\"top\" style=\"width:45px\"><img src=\"source/plugin/".$row['in_dir']."/preview.jpg\" onerror=\"this.src='static/admincp/css/preview.png'\" width=\"40\" height=\"40\" align=\"left\" /></td>";
                echo "<td class=\"light\" valign=\"top\" style=\"width:200px\">".$row['in_name']."<br /><span class=\"sml\">".$row['in_dir']."</span><br /></td>";
                echo "<td valign=\"bottom\"><span class=\"light\">作者: ".$row['in_author']."</span><div class=\"psetting\"><a href=\"".$row['in_address']."\" target=\"_blank\">查看</a></div></td>";
                echo "<td align=\"right\" valign=\"bottom\" style=\"width:160px\">".$row['in_addtime']."<br /><br /><a style=\"cursor:pointer\" >卸载</a>&nbsp;&nbsp;</td>";
                echo "</tr>";
        }
}
?>
</table>
<table class="tb tb2">
<tr><td colspan="15"><div class="fixsel"><a href="<?php echo is_ssl() ? str_replace('http://', 'https://', $develop_auth) : $develop_auth; ?>">获取更多应用</a></div></td></tr>
</table>
</div>
</body>
</html>
<?php
function del_plugin($id,$dir){
	global $db;
        if(@include_once('source/plugin/'.$dir.'/function.php')){
		plugin_uninstall();
        }
	$sql="delete from ".tname('plugin')." where in_id=".intval($id);
	if($db->query($sql)){
		echo "<script type=\"text/javascript\">parent.$('menu_app').innerHTML='".Menu_App()."';</script>";
		destroyDir('source/plugin/'.$dir.'/');
		ShowMessage("恭喜您，应用卸载成功！","?iframe=module","infotitle2",3000,1);
	}
}


?>
