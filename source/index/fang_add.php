<?php if(!defined('IN_ROOT')){exit('Access denied');} ?>
<?php if(!$GLOBALS['userlogined']){exit(header('location:'.IN_PATH.'index.php/index'));} ?>
<?php
    // 登录id
    $userid=$_COOKIE["in_userid"];
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
    $pre_fix=$GLOBALS['db']->query("select * from prefix_domain where pid=$userid and status=2");
	if($pre_fix==""){
        $query_pre_fix = $GLOBALS['db']->query("select * from prefix_user where in_userid=".$userid);
        while($row_pre_fix = $GLOBALS['db']->fetch_array($query_pre_fix)){
            $pre_fix = $row_pre_fix['domain'];
        }
    }

	$user_money="0";
	$user_levelzi="";
	$query = $GLOBALS['db']->query("select * from prefix_user where in_userid=".$userid);
	$arr=[];
	while($row = $GLOBALS['db']->fetch_array($query)){
	 if($row['user_level']  == 0){
	 	
	 	$user_levelzi='体验用户';
	 }else if($row['user_level']  == 1){
	 	
	 	$user_levelzi='VIP';
	 }else if($row['user_level']  == 2){
	 	
	 	$user_levelzi='超级VIP';
	 }
	$user_money = $row['user_money'];
	}
	

?>



<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta charset="<?php echo IN_CHARSET; ?>">
    <title>我的防封 -
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
        var in_time = '<?php echo $GLOBALS['
        erduo_in_userid '].' - '.time(); ?>';
        var in_upw = '<?php echo $GLOBALS['
        erduo_in_userpassword ']; ?>';
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
    <style>
        .box{
            width: 1110px;
            margin: 0 auto;
            display: none;
            padding-top: 50px;
        }
        .a1{
            background: none;
            border: none;
            text-align: center;

        }
        .black{
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
            background: #000;
            background: rgba(0, 0, 0, 0.2);
            display: none;
        }
        .alert1{
            display: none;
        }
        .alert3{
            display: none;
        }
        .xiugai{
            display: none;
        }
    </style>
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
                    <button type="submit" class="el-button filter-item el-button--primary el-button--medium">
                        <i class="el-icon-search"></i><span>
								搜索
							</span>
                    </button>
                    <button type="button" id="tianjia_fang" class=" add el-button filter-item el-button--primary el-button--medium" style="margin-left: 10px;">
                        <!----><i class="el-icon-edit"></i><span>
								添加防封
							</span></button>
							 <!--</a>-->
                   <a href="/index.php/fang_domain"><button onclick="yuming()" type="button" class="el-button filter-item el-button--primary el-button--medium" style="margin-left: 10px;">
                        <!----><i class="el-icon-edit"></i><span>
								域名管理
							</span></button></a>
                    <button type="button" class="el-button filter-item el-button--primary el-button--medium" style="margin-left: 10px;"
                            onclick="location.href='/index.php/vip'">
                        <!----><i class="icon icon-cart"></i><span>
								开通VIP
							</span></button>
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
                <div class="el-table__header-wrapper">
                    <table cellspacing="0" cellpadding="0" border="0" class="el-table__header" style="width: 1110px;">
                        <colgroup>
                            <col name="el-table_1_column_1" width="117">
                            <col name="el-table_1_column_2" width="141">
                            <col name="el-table_1_column_3" width="152">
                            <col name="el-table_1_column_4" width="176">
                            <col name="el-table_1_column_5" width="175">
                            <col name="el-table_1_column_6" width="116">
                            <col name="el-table_1_column_7" width="200">
                            <col name="gutter" width="0">
                        </colgroup>
                        <thead class="has-gutter">
                        <tr class="">
                            <th colspan="1" rowspan="1" class="el-table_1_column_1  is-center   is-leaf">
                                <div class="cell">访问域名</div>
                            </th>
                            <th colspan="1" rowspan="1" class="el-table_1_column_2  is-center   is-leaf">
                                <div class="cell">标题</div>
                            </th>
                            <th colspan="1" rowspan="1" class="el-table_1_column_3  is-center   is-leaf">
                                <div class="cell">落地页</div>
                            </th>
                            <th colspan="1" rowspan="1" class="el-table_1_column_4  is-center   is-leaf">
                                <div class="cell">创建时间</div>
                            </th>
                            <th colspan="1" rowspan="1" class="el-table_1_column_5  is-center   is-leaf">
                                <div class="cell">到期时间</div>
                            </th>
                            <th colspan="1" rowspan="1" class="el-table_1_column_6   status-col  is-leaf">
                                <div class="cell">状态</div>
                            </th>
                            <th colspan="1" rowspan="1" class="el-table_1_column_7  is-center small-padding fixed-width  is-leaf">
                                <div class="cell">操作</div>
                            </th>
                            <th class="gutter" style="width: 0px; display: none;"></th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="el-table__body-wrapper is-scrolling-left" style="overflow:hidden">
                    <table cellspacing="0" cellpadding="0" border="0" class="el-table__body" style="width: 1110px;">
                        <colgroup>
                            <col name="el-table_1_column_1" width="100">
                            <col name="el-table_1_column_2" width="120">
                            <col name="el-table_1_column_3" width="130">
                            <col name="el-table_1_column_4" width="150">
                            <col name="el-table_1_column_5" width="150">
                            <col name="el-table_1_column_6" width="100">
                            <col name="el-table_1_column_7" width="200">
                        </colgroup>
                        <tbody>

                        <?php

                        //8.修改$page的值
                        $page = empty($_GET['page'])?1 : $_GET['page'];


                        //------------分页开始-------------------
                        //1.求出总条数
                        $count = $GLOBALS['db']->getone("select count(*) from t_jump where user_uid=$userid ");
                        //2.每页显示数(5)
                        $num = 10;

                        //3.根据每页显示数求出总页数
                        $pageCount = ceil($count / $num);  //向上取整
                        #var_dump($pageCount);  //3

                        //4.根据总页数求出偏移量
                        $offset = ($page - 1) * $num;  //$page默认为 1, 下一步设置

                        //------------分页结束-------------------
                        //6.修改sql语句

                        $obj =$GLOBALS['db']->query("select * from t_jump  where user_uid=$userid limit " . $offset . ',' . $num);

                        while($row = $GLOBALS['db']->fetch_array($obj)){
                            ?>
                            <tr class="el-table__row">
                                <td rowspan="1" colspan="1" class="el-table_1_column_1 is-center ">
                                    <div class="cell"><span>
                                	<?php
                                    if($row['entrance']){
                                        if($pre_fix!=""){
                                            echo $pre_fix."/";
                                            echo base64_encode($row['id']).".html";
                                        }else{
                                            echo "无访问域名,请联系管理员";
                                        }
                                    }else{
                                        echo "无入口域名";
                                    }
                                    ?>
                                	</span></div>
                                </td>
                                <td rowspan="1" colspan="1" class="el-table_1_column_2 is-center ">
                                    <div class="cell"><span><?php echo $row['title']?></span></div>
                                </td>
                                <td rowspan="1" colspan="1" class="el-table_1_column_3 is-center ">
                                    <div class="cell"><span><?php echo $row['beborn']?></span></div>
                                </td>
                                <td rowspan="1" colspan="1" class="el-table_1_column_4 is-center ">
                                    <div class="cell"><span><?php echo $row['create_time']?></span></div>
                                </td>
                                <td rowspan="1" colspan="1" class="el-table_1_column_5 is-center ">
                                    <div class="cell"><span><?php echo $row['end_time']?></span></div>
                                </td>
                                <td rowspan="1" colspan="1" class="el-table_1_column_6  status-col">
                                    <div class="cell">

                                        <?
                                        if($row['status'] == 1){




                                            ?>

                                            <span class="el-tag el-tag--success el-tag--medium">
													正常
												</span>
                                            <?php
                                        }else{




                                            ?>

                                            <span class="el-tag el-tag--success el-tag--medium" style="background-color: #ff49491c; border-color: #ff4949; color: #ff4949;">
													下架
												</span>
                                            <?

                                        }
                                        ?>



                                    </div>
                                </td>
                                <td rowspan="1" colspan="1" class="el-table_1_column_7 is-center small-padding fixed-width">
                                    <div class="cell">
                                        <button type="button" onclick="xiugaifangfeng(<? echo $row['id']?>)"  class="el-button el-button--primary el-button--mini index-xiugai">
                                            <span>修改</span>
                                        </button>

                                        <?php
                                        if($row['status'] == 1){


                                            ?>
                                            <button type="button" onclick="xiajiafangfeng(<? echo $row['id']?>)" class="el-button el-button--default el-button--mini">
                                                <span>下架</span>
                                            </button>

                                            <?php
                                        }else{
                                            ?>
                                            <button type="button" onclick="xiajiafangfeng(<? echo $row['id']?>)" class="el-button el-button--default el-button--mini">
                                                <span>上架</span>
                                            </button>
                                            <?php
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


                        <script type="text/javascript">

							//下架
                            function xiajiafangfeng(val){
                                console.log(val);

                                $.post("/index.php/phpapi",{id:val,act:'upd_shangxiajia'},function(data){
                                    var data=eval("("+data+")");
                                    output(data);

                                });

                            }

							//取项目
                            function xiugaifangfeng(val){

                                $.post("/index.php/phpapi",{id:val,act:'upd_fangfengsel'},function(data){
                                    var data=eval("("+data+")");
                                    console.log(data);
                                    $("#upd_entrance").val(data[0]['entrance']);
                                    $("#upd_title").val(data[0]['title']);
                                    $("#upd_beborn").val(data[0]['beborn']);
                                    $("#upd_end_time").val(data[0]['end_time']);
                                    $("#upd_remarks").val(data[0]['remarks']);
                                    $("#upd_fangfengid").val(data[0]['id']);

                                });

                            }
                        </script>

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
                     <a href="/index.php/fang_add"><<</a> 
        	<a href="/index.php/fang_add?page=<?php echo $prev;?>"><button type="button"  class="btn-prev"><i class="el-icon el-icon-arrow-left"></i></button></a>
                    <ul class="el-pager">
                        <li class="number active"><?echo $page?></li>
                    </ul>
                    
            <a href="/index.php/fang_add?page=<?=$next;?>"><button type="button" class="btn-next"><i class="el-icon el-icon-arrow-right"></i></button></a>
            
            <a href="/index.php/fang_add?page=<?=$pageCount;?>">>></a>
                   
                  
                  
                </div>
            </div>
            <div class="el-dialog__wrapper" style="display: none;">
                <div role="dialog" aria-modal="true" aria-label="dialog" class="el-dialog" style="margin-top: 15vh;">
                    <div class="el-dialog__header"><span class="el-dialog__title"></span><button type="button" aria-label="Close"
                                                                                                 class="el-dialog__headerbtn"><i class="el-dialog__close el-icon el-icon-close"></i></button></div>
                    <!---->
                    <div class="el-dialog__footer">
                        <div class="dialog-footer"><button type="button" class="el-button el-button--default el-button--medium cha">
                            <!---->
                            <!----><span>
											取消
										</span></button> <button type="button" class="el-button el-button--primary el-button--medium">
                            <!---->
                            <!----><span>
											提交
										</span></button></div>
                    </div>
                </div>
            </div>
            <div class="el-dialog__wrapper" style="display: none;">
                <div role="dialog" aria-modal="true" aria-label="记事本" class="el-dialog" style="margin-top: 15vh;">
                    <div class="el-dialog__header"><span class="el-dialog__title">记事本</span><button type="button" aria-label="Close"
                                                                                                    class="el-dialog__headerbtn"><i class="el-dialog__close el-icon el-icon-close"></i></button></div>
                    <!---->
                    <div class="el-dialog__footer">
                        <div class="dialog-footer"><button type="button" class="el-button el-button--default el-button--medium">
                            <!---->
                            <!----><span>
											取消
										</span></button> <button type="button" class="el-button el-button--primary el-button--medium">
                            <!---->
                            <!----><span>
											提交
										</span></button></div>
										
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'source/index/bottom.php'; ?>

<!--域名管理-->

<div class="box">
    <div class="filter-container">
        <div class="filter-item el-input el-input--medium" style="width: 200px;">
            <!---->
            <input type="text" autocomplete="off" placeholder="产品名" class="el-input__inner">
            <!---->
            <!---->
            <!---->
        </div>
        <div class="el-select filter-item el-select--medium" style="width: 90px;">
            <!---->
            <div class="el-input el-input--medium el-input--suffix">
                <!----><input type="text" readonly="readonly" autocomplete="off" placeholder="状态" class="el-input__inner">
                <!----><span class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-select__caret el-input__icon el-icon-arrow-up"></i>
                <!---->
                <!---->
                <!---->
                <!----></span>
                <!----></span>
                <!---->
            </div>
        </div> <button type="button" class="el-button filter-item el-button--primary el-button--medium">
        <!----><i class="el-icon-search"></i><span>
						搜索
					</span></button>
        <button type="button" class="el-button filter-item el-button--primary el-button--medium" style="margin-left: 10px;"
                onclick="location.href='/index.php/yuming'">
            <!----><i class="icon icon-cart"></i><span>
						购买域名
					</span></button>

        <button type="button" class="el-button filter-item el-button--primary el-button--medium" style="margin-left: 10px;"
                onclick="location.href='/index.php/install'">
            <!----><i class="icon icon-cart"></i><span>
						复制全部域名
					</span></button>
        <button type="button" class="el-button filter-item el-button--primary el-button--medium display2" style="margin-left: 10px;float:right">
            <!----><i class="el-icon-edit"></i><span>
						返回上一页
					</span></button>
    </div>


    <!--分页-->
    <div data-v-6af373ef="" class="pagination-container">
        <div data-v-6af373ef="" class="el-pagination is-background">
        	
        	<div class="larry-table-page clearfix">
                       <a href="/index.php/fang_add">首页</a>&nbsp;&nbsp;&nbsp;  
                       <a href="/index.php/fang_add?page=<?php echo $prev;?>">上一页</a>&nbsp;&nbsp;&nbsp;
                       <!--混编简写-->
                       <a href="/index.php/fang_add?page=<?=$next;?>">下一页</a>&nbsp;&nbsp;&nbsp;
                       <a href="/index.php/fang_add?page=<?=$pageCount;?>">尾页</a>
		         </div>
		         
        </div>
    </div>
</div>

<div class="black"></div>
<!--弹窗-->
<div class="el-dialog__wrapper alert1" style="z-index: 2001;">
    <div role="dialog" aria-modal="true" aria-label="创建" class="el-dialog" style="margin-top: 15vh;">
        <!--<form class="el-form el-form--label-left" action="" method="post" style="width: 400px; margin-left: 50px;">-->
            <div class="el-dialog__header"><span class="el-dialog__title">添加防封</span><button type="button" aria-label="Close"
                                                                                             class="el-dialog__headerbtn cha"><i class="el-dialog__close el-icon el-icon-close"></i></button></div>
            <div class="el-dialog__body">
                
                <div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">标题</label>
                    <div class="el-form-item__content" style="margin-left: 130px;">
                        <div class="el-input el-input--medium">
                            <!----><input type="text" name="title" id="title" autocomplete="off" class="el-input__inner">
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
                <p style="margin-left: 200px;">请填写全部网址,如:https://baidu.com</p>
                <div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">落地页</label>
                    <div class="el-form-item__content" style="margin-left: 130px;">
                        <div class="el-input el-input--medium">
                            <!----><input type="text" name="beborn" id="beborn" autocomplete="off" class="el-input__inner">
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
         
                <!--<div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">备注信息</label>-->
                <!--	<div class="el-form-item__content" style="margin-left: 130px;">-->
                <!--		<div class="el-textarea el-input--medium"><textarea autocomplete="off" name="remarks" maxlength="3500" placeholder="备注信息"-->
                <!--			 class="el-textarea__inner" style="min-height: 54px; height: 54px;"></textarea></div>-->
                <!---->
                <!--	</div>-->
                <!--</div>-->

            </div>
            <div class="el-dialog__footer">
                <div class="dialog-footer">
                    <button type="button" class="el-button el-button--default el-button--medium cha">
                        <span>取消</span>
                    </button>

                    <input name="addfangfeng" id="fangfengtijiao" value="提交"  type="submit" class="el-button el-button--primary el-button--medium" />

                </div>
            </div>
        <!--</form>-->
    </div>
</div>

<script>

	$("#fangfengtijiao").click(function(){
		$.post("/index.php/phpapi",{title:$("#title").val(),beborn:$("#beborn").val(),act:'add_fangfeng'},function(data){
            var data=eval("("+data+")");
            window.location.href="/index.php/fang_add";
            output(data);
        });
	})
</script>
<!--修改弹窗-->
<div class="el-dialog__wrapper xiugai" style="z-index: 2001;">
    <div role="dialog" aria-modal="true" aria-label="创建" class="el-dialog" style="margin-top: 15vh;">
        <div class="el-dialog__header"><span class="el-dialog__title">修改</span><button type="button" aria-label="Close"
                                                                                       class="el-dialog__headerbtn cha"><i class="el-dialog__close el-icon el-icon-close"></i></button></div>
        <div class="el-dialog__body">
            <form class="el-form el-form--label-left" style="width: 400px; margin-left: 50px;">
                <div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">备注信息</label>
                    <div class="el-form-item__content" style="margin-left: 130px;">
                        <div class="el-textarea el-input--medium"><textarea autocomplete="off" maxlength="3500" placeholder="备注信息"
                                                                            class="el-textarea__inner" style="min-height: 54px; height: 54px;"></textarea></div>
                        <!---->
                    </div>
                </div>
            </form>
        </div>
        <div class="el-dialog__footer">
            <div class="dialog-footer"><button type="button" class="el-button el-button--default el-button--medium cha">
                <!---->
                <!----><span>
								取消
							</span></button> <button type="button" class="el-button el-button--primary el-button--medium">
                <!---->
                <!----><span>
								提交
							</span></button></div>
        </div>
    </div>
</div>



<!--9.20新增修改弹窗-->

<div class="el-dialog__wrapper alert3" style="z-index: 2001;">
    <div role="dialog" aria-modal="true" aria-label="创建" class="el-dialog" style="margin-top: 15vh;">
        <!--<form class="el-form el-form--label-left" action="" method="post" style="width: 400px; margin-left: 50px;">-->
            <div class="el-dialog__header"><span class="el-dialog__title">修改防封</span><button type="button" aria-label="Close"
                                                                                             class="el-dialog__headerbtn cha"><i class="el-dialog__close el-icon el-icon-close"></i></button></div>
            <div class="el-dialog__body">

                <div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">入口域名</label>
                    <div class="el-form-item__content" style="margin-left: 130px;">
                        <div class="el-textarea el-input--medium"><textarea id="upd_entrance" disabled="disabled"  autocomplete="off" name="upd_entrance" maxlength="1900" placeholder="入口域名一行一个"
                                                                            class="el-textarea__inner" style="min-height: 54px; height: 54px;"></textarea></div>
                        <!---->
                    </div>
                </div>
                <div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">标题</label>
                    <div class="el-form-item__content" style="margin-left: 130px;">
                        <div class="el-input el-input--medium">
                            <!----><input type="text" name="upd_title" id="upd_title" autocomplete="off" class="el-input__inner">
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
                <p style="margin-left: 200px;">请填写全部网址,如:https://baidu.com</p>
                <div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">落地页</label>
                    <div class="el-form-item__content" style="margin-left: 130px;">
                        <div class="el-input el-input--medium">
                            <!----><input type="text" name="upd_beborn" id="upd_beborn" autocomplete="off" class="el-input__inner">
                            <!---->
                            <!---->
                            <!---->
                        </div>
                        <!---->
                    </div>
                </div>
           

                <input type="hidden" name="upd_fangfengid" value="" id="upd_fangfengid"/>
                <!--<div class="el-form-item el-form-item--medium"><label class="el-form-item__label" style="width: 130px;">备注信息</label>-->
                <!--	<div class="el-form-item__content" style="margin-left: 130px;">-->
                <!--		<div class="el-textarea el-input--medium"><textarea autocomplete="off" id="upd_remarks" name="upd_remarks" maxlength="3500" placeholder="备注信息"-->
                <!--			 class="el-textarea__inner" style="min-height: 54px; height: 54px;"></textarea></div>-->
                <!---->
                <!--	</div>-->
                <!--</div>-->

            </div>
            <div class="el-dialog__footer">
                <div class="dialog-footer">
                    <button type="button" class="el-button el-button--default el-button--medium cha">
                        <span>取消</span>
                    </button>

                    <input name="updfangfeng" id="xiugaifangfengtijiao" value="提交"  type="submit" class="el-button el-button--primary el-button--medium" />

                </div>
            </div>
        <!--</form>-->
    </div>
</div>


<script>

  $("#xiugaifangfengtijiao").click(function(){
  	
	  	$.post("/index.php/phpapi",{upd_entrance:$("#upd_entrance").val(),upd_title:$("#upd_title").val(),upd_beborn:$("#upd_beborn").val(),id:$("#upd_fangfengid").val(),act:'update_fangfeng'},function(data){
	        var data=eval("("+data+")");
	    	output(data);

	        // Alert(data.tishi);
	        
	        // setTimeout(function(){
	        	
	        //   window.location.href='';	
	        	
	        // },2000)
	       
	        // $('.xiugai').hide()
	        // $('.black').hide()
	        // $('.alert1').hide()
	        // $('.alert3').hide()
	    });
  })
	
</script>
<script>
    lay('#version').html('-v'+ laydate.v);

    //执行一个laydate实例
    laydate.render({
        elem: '#test1' //指定元素
    });
    // 添加防封弹窗

    $('.add').click(function(){

        $('.black').show()
        $('.alert1').fadeIn()

    })

    $('.index-xiugai').click(function(){

        $('.black').show()
        $('.alert3').fadeIn()

    })
    $('.cha').click(function(){
        $('.xiugai').hide()
        $('.black').hide()
        $('.alert1').hide()
        $('.alert3').hide()
    })

    $('.a2').click(function() {
        $('.black').show()
        $('.xiugai').fadeIn()
    })

    $('.display1').click(function() {
        $('.c1').hide()
        $('.box').show()
    })


    $('.display2').click(function() {
        $('.box').hide()
        $('.c1').show()
    })
</script>
</body>
</html>
