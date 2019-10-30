<?php if(!defined('IN_ROOT')){exit('Access denied');} ?>
<?php if(!$GLOBALS['userlogined']){exit(header('location:'.IN_PATH.'index.php/index'));} ?>
<?php
    // 登录id
    $userid=$_COOKIE["in_userid"];
    $db = extension_loaded('pdo_mysql') ? new db_pdo(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME) : new db_mysql(IN_DBHOST, IN_DBUSER, IN_DBPW, IN_DBNAME);
	$ios = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from ".tname('app')." where in_form='iOS' and in_uid=".$GLOBALS['erduo_in_userid']));
	$android = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from ".tname('app')." where in_form='Android' and in_uid=".$GLOBALS['erduo_in_userid']));
	$home = explode('/', $_SERVER['PATH_INFO']);
	$string = isset($home[2]) ? $home[2] : NULL;
	if(empty($string)){
	$query = $GLOBALS['db']->query("select * from ".tname('app')." where in_uid=".$GLOBALS['erduo_in_userid']." order by in_addtime desc");
	}elseif(is_numeric($string)){
	$form = $string == 1 ? 'iOS' : 'Android';
	$query = $GLOBALS['db']->query("select * from ".tname('app')." where in_form='".$form."' and in_uid=".$GLOBALS['erduo_in_userid']." order by in_addtime desc");
	}else{
	$key = SafeSql(trim(is_utf8($string)));
	$query = $GLOBALS['db']->query("select * from ".tname('app')." where in_name like '%".$key."%' and in_uid=".$GLOBALS['erduo_in_userid']." order by in_addtime desc");
	}
	$sel_t_domain=$GLOBALS['db']->query("select * from t_domain where status=1 and remarks!='' and pid=".$userid);

	$sel_t_jump=$GLOBALS['db']->query("select id,remarks from t_jump where user_uid=".$userid);
	$arr=[];
	$n=0;
	while($row_t_jump = $GLOBALS['db']->fetch_array($sel_t_jump)){
		$arr[$n]=$row_t_jump;
		$n++;
	}



	while($row_t_domain = $GLOBALS['db']->fetch_array($sel_t_domain)){
          //print_r($row_t_domain);
    		for($i=0;$i<count($arr);$i++){
    			if($row_t_domain['remarks'] == $arr[$i]['id']){
    				if(stripos($arr[$i]['remarks'],$row_t_domain['domain'])===false){
    				}else{
    					echo $row_t_domain['remarks']."    ".$arr[$i]['id']."=";
    					$GLOBALS['db']->query("update t_domain set status=0 where id=".$row_t_domain['id']);
    				}
					break;
				}
    		}
			
		}
	
	
	if($_POST['addfangfeng']) {
	
	$entrance = $_POST['entrance'];
	$title = $_POST['title'];
	$beborn = $_POST['beborn'];
	$end_time = $_POST['end_time'];
	$remarks = $_POST['remarks'];
	$create_time = date('Y-m-d h:i:s',time());
	// if($entrance){
	if($title){
		
		$query22233= $db->getone("select * from t_jump where user_uid='".$userid."' and title=".$title);
		if(empty($query22233)){
			if($beborn){
				if($end_time){
					$db->query("insert INTO t_jump (entrance,title,status,beborn,end_time,remarks,user_uid,create_time) VALUES ('$entrance','$title','1','$beborn','$end_time','$remarks','$userid','$create_time')");
					echo '<meta charset="UTF-8" />';
					echo "<script>window.location.href='';</script>";
				}else{
				  echo '<meta charset="UTF-8" />';
				  echo "<script>Alert('结束时间不能为空');window.location.href='';</script>";
				}
			}else{
			  echo '<meta charset="UTF-8" />';
		 	  echo "<script>Alert('落地页不能为空');window.location.href='';</script>";
			}
		}else{
		  echo '<meta charset="UTF-8" />';
		  echo "<script>Alert('标题已存在');window.location.href='';</script>";
		}
		
	}else{
      echo '<meta charset="UTF-8" />';
	  echo "<script>Alert('标题不能为空');window.location.href='';</script>";
	}
}
	
	
	$sql = "select * from t_domain  where pid=$userid limit " . $offset . ',' . $num;
	
	
	
	
	
	$user_money="0";
	$user_levelzi="";
	$query = $db->query("select * from prefix_user where in_userid=".$userid);
	$arr=[];
	while($row = $db->fetch_array($query)){
	 if($row['user_level']  == 0){
	 	
	 	$user_levelzi='体验用户';
	 }else if($row['user_level']  == 1){
	 	
	 	$user_levelzi='VIP';
	 }else if($row['user_level']  == 2){
	 	
	 	$user_levelzi='超级VIP';
	 }
	$user_money = $row['user_money'];
	}
	
	
	if($_POST['updfangfeng']) {
		$entrance = $_POST['upd_entrance'];
		$title = $_POST['upd_title'];
		$beborn = $_POST['upd_beborn'];
		$end_time = $_POST['upd_end_time'];
		$id = $_POST['upd_fangfengid'];
		
		$db->query("update t_jump set entrance='$entrance', title='$title' , beborn='$beborn' , end_time='$end_time' where id=".$id);
		
		echo '<meta charset="UTF-8" />';
		echo "<script>Alert('修改成功');window.location.href='';</script>";
	
	}


// echo $GLOBALS['userlogined'];   登录id
?>



<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta charset="<?php echo IN_CHARSET; ?>">
    <title>我的域名 -
        <?php echo IN_NAME; ?>
    </title>
    <link href="<?php echo IN_PATH; ?>static/index/icons.css" rel="stylesheet">
    <link href="<?php echo IN_PATH; ?>static/index/bootstrap.css" rel="stylesheet">
    <link href="<?php echo IN_PATH; ?>static/index/manage.css" rel="stylesheet">

    <link href="<?php echo IN_PATH; ?>static/index/a_fang_add.css" rel="stylesheet">
    <link href="<?php echo IN_PATH; ?>static/index/a_fang_add_1.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo IN_PATH; ?>static/pack/layer/jquery.js"></script>
    <script type="text/javascript" src="<?php echo IN_PATH; ?>static/pack/layer/confirm-lib.js"></script>
    <script type="text/javascript" src="<?php echo IN_PATH; ?>static/index/uploadify.js"></script>
    <script type="text/javascript" src="<?php echo IN_PATH; ?>static/index/profile.js"></script>
    <script type="text/javascript" src="<?php echo IN_PATH; ?>static/index/laydate.js"></script>
    <script type="text/javascript">
        var in_path = '<?php echo IN_PATH; ?>';
        var home_link = '<?php echo IN_PATH.'index.php / home '; ?>';
        var in_time = '<?php echo $GLOBALS['erduo_in_userid '].' - '.time(); ?>';
        var in_upw = '<?php echo $GLOBALS['erduo_in_userpassword ']; ?>';
        var in_uid = <?php echo $GLOBALS['erduo_in_userid']; ?>;
        var in_id = 0;
        var in_size = <?php echo intval(ini_get('upload_max_filesize')); ?>;
        var remote = {
            'open': '<?php echo IN_REMOTE; ?>',
            'dir': '<?php echo IN_REMOTEPK; ?>',
            'version': '<?php echo version_compare(PHP_VERSION, '
            5.5 .0 '); ?>'
        };
    </script>

</head>
<body>
<div class="navbar-wrapper ng-scope">
    <div class="ng-scope ">
        <div class="navbar-header-wrap">
            <div class="middle-wrapper">
                <sidebar class="avatar-dropdown">
                    <img class="img-circle" src="<?php echo getavatar($GLOBALS['erduo_in_userid']); ?>">
                    <div class="name"><span class="ng-binding">
									<?php echo substr($GLOBALS['erduo_in_username'], 0, strpos($GLOBALS['erduo_in_username'], '@')); ?></span></div>
                    <div class="email"><span class="ng-binding">
									<?php echo $GLOBALS['erduo_in_username']; ?></span></div>
                    <div class="dropdown-menus">
                        <ul>
                            <li><a class="ng-binding">余额：<? echo $user_money?>元</a></li>
                            <li><a class="ng-binding">等级：<? echo $user_levelzi?></a></li>
                            <li><a href="<?php echo IN_PATH.'index.php/profile_info'; ?>" class="ng-binding">个人资料</a></li>
                            <li><a href="<?php echo IN_PATH.'index.php/profile_pwd'; ?>">修改密码</a></li>
                            <li><a href="<?php echo IN_PATH.'index.php/profile_avatar'; ?>">更新头像</a></li>
                            <li><a href="<?php echo IN_PATH.'index.php/logout'; ?>" class="ng-binding">退出</a></li>
                        </ul>
                    </div>
                </sidebar>
                <nav>
                    <h1 class="navbar-title logo"><span onclick="location.href='/index.php/index'">
									<?php echo $_SERVER['HTTP_HOST']; ?></span></h1>
                    <i class="icon-angle-right"></i>
                    <div class="navbar-title primary-title"><a href="<?php echo IN_PATH.'index.php/fang_add'; ?>" class="ng-binding" style="color: #000;">我的防封</a></div>
                    <div class="navbar-title primary-title"><a href="<?php echo IN_PATH.'index.php/home'; ?>" class="ng-binding" >我的分发</a></div>
                    

                    <div class="navbar-title primary-title"><a href="http://app.92ff.cn" target="view_window" class="ng-binding" style="color: #F44336 !important;"> <img style="    width: 22px;position: absolute;transform: rotate(-42deg);margin-top: -9px;margin-left: -13px;"  src="<?php echo IN_PATH; ?>static/index/huangguan1.png">超级签名</a></div>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="ng-scope" id="dialog-uploadify" style="display:none">
    <div class="upload-modal-mask ng-scope"></div>
    <div class="upload-modal-container ng-scope">
        <div class="flip-container flip">
            <div class="modal-backend plane-ready upload-modal">
                <div class="btn-close" onclick="location.reload()"><i class="icon-cross"></i></div>
                <div class="plane-wrapper">
                    <img class="plane" src="<?php echo IN_PATH; ?>static/index/plane.svg">
                    <div class="rotate-container">
                        <img class="propeller" src="<?php echo IN_PATH; ?>static/index/propeller.svg">
                    </div>
                </div>
                <div class="progress-container">
                    <p class="speed ng-binding" id="speed-uploadify"></p>
                    <p class="turbo-upload"></p>
                    <div class="progress">
                        <div class="growing" style="width:0%"></div>
                    </div>
                </div>
                <div class="redirect-tips ng-binding" style="display:none">正在解析应用，请稍等...</div>
            </div>
        </div>
    </div>
</div>

<section class="ng-scope c1">
    <div class="page-apps ng-scope" style="width:1110px;margin:0 auto">
        <div data-v-92459f82="" class="app-container">
            <div class="filter-container">
                <form action="" method="post">
                    <div class="filter-item el-input el-input--medium" style="width: 200px;">
                        <!---->
                        <input type="text" name="title"autocomplete="off" placeholder="标题" class="el-input__inner">
                        <!---->
                        <!---->
                        <!---->
                    </div>
                    <div class="el-select filter-item el-select--medium" style="width: 90px;">
                        <div class="el-input el-input--medium el-input--suffix">
                            <input type="text"  readonly="readonly" autocomplete="off" placeholder="状态" class="el-input__inner">
                            <span class="el-input__suffix">
									<span class="el-input__suffix-inner">
										<i class="el-select__caret el-input__icon el-icon-arrow-up"></i>

									</span>
								</span>

                        </div>
                    </div>
                    <button type="button" class="el-button filter-item el-button--primary el-button--medium">
        <!----><i class="el-icon-search"></i><span>
						搜索
					</span></button>
        <button type="button" class="el-button filter-item el-button--primary el-button--medium" style="margin-left: 10px;"
                onclick="location.href='/index.php/yuming'">
            <!----><i class="icon icon-cart"></i><span>
						购买域名
					</span></button>


      <a href="/index.php/fang_add">
      	
      	<button type="button" class="el-button filter-item el-button--primary el-button--medium display2" style="margin-left: 10px;float:right">
            <!----><i class="el-icon-edit"></i><span>
						返回上一页
					</span></button>
      </a>  
                </form>
            </div>
            <div class="el-table el-table--fit el-table--border el-table--scrollable-x el-table--enable-row-hover el-table--enable-row-transition el-table--medium"
                 style="width: 1110px;text-align:center;">
                <div class="hidden-columns">
                    <div max-width="200px"></div>
                    <div max-width="200px"></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
              
                <div class="el-table__body-wrapper is-scrolling-left" style="overflow:hidden">
                    <table cellspacing="0" cellpadding="0" border="0" class="el-table__header" style="width: 1110px;">
                <colgroup>
                    <col name="el-table_1_column_1" width="264">
                    <col name="el-table_1_column_2" width="238">
                    <col name="el-table_1_column_3" width="172">
                    <col name="el-table_1_column_4" width="238">
                    <col name="el-table_1_column_5" width="204">
                    <col name="el-table_1_column_6" width="116">
                    <col name="el-table_1_column_7" width="200">
                    <col name="gutter" width="0">
                </colgroup>
                <thead class="has-gutter">
                <tr class="">


                    <th colspan="1" rowspan="1" class="el-table_1_column_3  is-center   is-leaf">
                        <div class="cell">域名</div>
                    </th>
                    <th colspan="1" rowspan="1" class="el-table_1_column_4  is-center   is-leaf">
                        <div class="cell">购买时间</div>
                    </th>
                    <th colspan="1" rowspan="1" class="el-table_1_column_6   status-col  is-leaf">
                        <div class="cell">状态</div>
                    </th>
                    <th colspan="1" rowspan="1" class="el-table_1_column_7  is-center small-padding fixed-width  is-leaf">
                        <div class="cell">备注</div>
                    </th>
                    <th colspan="1" rowspan="1" class="el-table_1_column_5  is-center   is-leaf">
                        <div class="cell">操作</div>
                    </th>
                    <th class="gutter" style="width: 0px; display: none;"></th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="el-table__body-wrapper is-scrolling-left" style="overflow:hidden">
            <table cellspacing="0" cellpadding="0" border="0" class="el-table__body" style="width: 1332px;">
                <colgroup>
                    <col name="el-table_1_column_1" width="200">
                    <col name="el-table_1_column_2" width="180">
                    <col name="el-table_1_column_3" width="130">
                    <col name="el-table_1_column_4" width="180">
                    <col name="el-table_1_column_5" width="150">
                    <col name="el-table_1_column_6" width="30">
                    <col name="el-table_1_column_7" width="140">
                </colgroup>
              

                <?php 
                          //5.设置$page的默认值
                          #$page = 1;

                          //8.修改$page的值
                          $page = empty($_GET['page'])?1 : $_GET['page'];
                          $conn = mysqli_connect("localhost","92fenfa","Drj3sTB54YN2mmmZ");
                          if(!$conn){
                              echo "失败";
                          }
                          mysqli_select_db($conn,"92fenfa");


                          //------------分页开始-------------------
                          //1.求出总条数
                          $sql = "select count(*) as count from t_domain where status<2 and pid=".$userid;
                          $result = mysqli_query($conn,$sql);
                          $pageRes = mysqli_fetch_assoc($result);
                          #var_dump($pageRes);   //13
                          $count = $pageRes['count'];

                          //2.每页显示数(5)
                          $num = 10;

                          //3.根据每页显示数求出总页数
                          $pageCount = ceil($count / $num);  //向上取整
                          #var_dump($pageCount);  //3

                          //4.根据总页数求出偏移量
                          $offset = ($page - 1) * $num;  //$page默认为 1, 下一步设置

                          //------------分页结束-------------------
                          //6.修改sql语句

						  $sql = "select * from t_domain  where status<2 and pid=$userid limit " . $offset . ',' . $num;
						  
                          $obj = mysqli_query($conn,$sql);
                      ?>
                      



                <!---->
                <tbody>
               <?php
                 while($row = mysqli_fetch_assoc($obj)){
               ?>
                <tr class="el-table__row">
                    <td rowspan="1" colspan="1" class="el-table_1_column_3 is-center ">
                        <div class="cell"><span><? echo $row['domain']?></span></div>
                    </td>
                    <td rowspan="1" colspan="1" class="el-table_1_column_4 is-center ">
                        <div class="cell"><span><? echo date('Y-n-j H:i:s',$row['buy_time'])?></span></div>
                    </td>
                    <td rowspan="1" colspan="1" class="el-table_1_column_6  status-col">
                        <div class="cell">

                            <?php
                             if($row['status'] == 1){
                            ?>
                            <span class="el-tag el-tag--success el-tag--medium">正常</span>
                            <?php
                             }else{
                            ?>
                            
                            <span class="el-tag el-tag--success el-tag--medium" style="background-color: #ff49491c; border-color: #ff4949; color: #ff4949;">已屏蔽</span>
                            <?php
                             }
                            ?>

                        </div>
                    </td>
                    <td rowspan="1" colspan="1" class="el-table_1_column_5 is-center ">

                        <select data-fangfengyumingid="<? echo $row['id']?>" class="fangfengyumingduoxuankuang" style="width:80%;border:none;text-align:center;">


                            <?php


							   if($row['remarks']){
								$query5 = $db->query("select * from t_jump where user_uid=".$userid);
	                            while($row5 = $db->fetch_array($query5)){
	                            	if($row5['id']  == $row['remarks']){
                            ?>

                            <option value ="<? echo $row5['id']?>"><? echo $row5['title']?></option>



                            <?
							    	}
								}
						    ?>

                            <?
							  }else{
							?>
                            <option value ="请选择">请选择</option>
                            <?
								}
						       ?>



                            <?php

							      $query6 = $db->query("select * from t_jump where user_uid=".$userid);

                            while($row6 = $db->fetch_array($query6)){
                            ?>
                            <?php
							       if($row6['id']  != $row['remarks']){
							     ?>
                            <option value ="<? echo $row6['id']?>"><? echo $row6['title']?></option>
                            <?php
							       }
							     ?>
                            <?php
							      }
							  ?>





                            </select>
                    </td>
                    <td rowspan="1" colspan="1" class="el-table_1_column_7 is-center small-padding fixed-width">
                        <!--a2-->
                        <div class="cell">



                            <?
							   if($row['status'] == 1){
							?>

                            <?
                              if($row['remarks']){
                              	
                              	
                              
                            
                            ?>
                            
                            <button type="button" style="background-color: #ebeceecf;border-color: #ebeceecf;" class="el-button el-button--primary el-button--mini ">
                                <span style="color: #333333b3;">保存</span>
                            </button>
                            
                            <?php
                              }else{
                            ?>
                            <button type="button" onclick="fangfengyumingupda(<? echo $row['id']?>)" class="el-button el-button--primary el-button--mini ">
                                <span>保存</span>
                            </button>
                            <?php
                            
                              }
                            ?>
                            
                            <?php
							   }else{
							?>

                            <button type="button" onclick="shanchuyuming(<? echo $row['id']?>)" class="el-button el-button--default el-button--mini shanchu">
                                <span>删除</span>
                            </button>
                            <?
							   }
							?>

                        </div>
                    </td>
                </tr>

                <?php
                
                 }
                 
                  $prev = $page - 1;
	              $next = $page + 1;
	
	              //11.设置页数限制
	              if($prev<1){
	                  $prev = 1;
	              }
	              if($next>$pageCount){
	                  $next = $pageCount;
	              }
                          
                ?>


                <!---->
                </tbody>
                
                
                
			         
            </table>
                    <!---->
                    <!---->
                </div>
                <!---->
                <!---->
                <!---->
                <!---->
                <div class="el-table__column-resize-proxy" style="display: none;"></div>
            </div>
            <div data-v-6af373ef="" class="pagination-container">
             
        <div data-v-6af373ef="" class="el-pagination is-background">
        	
        	<span class="el-pagination__total">共 <?php echo $count?> 条</span><span class="el-pagination__sizes">
                     <a href="/index.php/fang_domain"><<</a> 
        	<a href="/index.php/fang_domain?page=<?php echo $prev;?>"><button type="button"  class="btn-prev"><i class="el-icon el-icon-arrow-left"></i></button></a>
                    <ul class="el-pager">
                        <li class="number active"><?echo $page?></li>
                    </ul>
                    
            <a href="/index.php/fang_domain?page=<?=$next;?>"><button type="button" class="btn-next"><i class="el-icon el-icon-arrow-right"></i></button></a>
            
            <a href="/index.php/fang_domain?page=<?=$pageCount;?>">>></a>

		         
        </div>
    </div>
    </div>
</section>
<?php include 'source/index/bottom.php'; ?>

<!--域名管理-->


    <script>
    //删除域名
    function shanchuyuming(id){
    	
    	
    	$.post("/index.php/phpapi",{id:id,act:'del_yumingdomain'},function(data){
            var data=eval("("+data+")");
            output(data);

        });
                    
    }
	
	//加入口 
    function fangfengyumingupda(val){
    	for(var i=0; i<$(".fangfengyumingduoxuankuang").length;i++){
	        if($(".fangfengyumingduoxuankuang").eq(i).data("fangfengyumingid")  == val){
	            var index=$(".fangfengyumingduoxuankuang").eq(i).val();
	            if(index!="请选择"){
	                layer.confirm('提交后不能更改,您确定提交吗？', function(){
	                $.post("/index.php/phpapi",{xuanzeid:index,yumingid:val,act:'upd_fangfengyumingupdate'},function(data1){
	                        var data1=eval("("+data1+")");
	                        output(data1);
	                    });
	                },"提示");
	            }else{
	            	layer.msg("请选择项目!",2,0);
	            }
	            return;
	        }
	    }
	}
    </script>


        </form>
    </div>
</div>

<script>
    lay('#version').html('-v'+ laydate.v);

    //执行一个laydate实例
    laydate.render({
        elem: '#test1' //指定元素
    });
    // 添加防封弹窗

</script>
</body>
</html>
