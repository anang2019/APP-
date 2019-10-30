<?php
	$userid=$_COOKIE["in_userid"];
	$post = $_REQUEST;
	$ac=$_REQUEST['act'];

	if($ac == 'upd_fangfengsel'){
		$query = $GLOBALS['db']->query("select * from t_jump where id=".$post['id']);
		$arr=[];									
		while($row = $GLOBALS['db']->fetch_array($query)){
			array_push($arr,$row);
		}
		echo json_encode($arr);
	}else if($ac == 'upd_fangfengyumingupdate'){
		$id = $_REQUEST['yumingid'];
		$xuanzeid = $_REQUEST['xuanzeid'];
		$yuming = $GLOBALS['db']->query("select * from t_domain where id=".$id);
		while($yumingrow = $GLOBALS['db']->fetch_array($yuming)){
			
			$query = $GLOBALS['db']->query("select * from t_jump where id=".$xuanzeid);
			$domainneirong = $yumingrow['domain'];
			while($row = $GLOBALS['db']->fetch_array($query)){
					
			   
			   if($row['entrance']){
			   	
			   	$yuan=$row['entrance']."\n".$domainneirong;
			   }else{
			   	
			   	$yuan=$domainneirong;
			   }
                $GLOBALS['db']->query("update t_jump set entrance='$yuan' where id=".$xuanzeid);
			}
		   
		}

        $GLOBALS['db']->query("update t_domain set remarks='$xuanzeid' where id=".$id);
        
        $arr=array('status'=>'success','message'=>'修改成功');
        
        echo json_encode($arr);

	}else if($ac == 'fenfachongzhi'){
		$price = $_REQUEST['price'];
		
		$num = $_REQUEST['num'];
		$query = $GLOBALS['db']->query("select * from prefix_user where in_userid=".$userid);
		$arr=[];									
		while($row = $GLOBALS['db']->fetch_array($query)){
			
			if($row['user_money'] >= $price){

                $GLOBALS['db']->query("update prefix_user set user_money=user_money-".$price." where in_userid=".$userid);

                $GLOBALS['db']->query("update prefix_user set in_points=in_points+".$num." where in_userid=".$userid);
				$arr=array('status'=>'success','message'=>'购买成功');
        
                
			}else{
				$haicha=$price - $row['user_money'];
				$arr=array('status'=>'error','message'=> $haicha);
				
			}
		
		}
        
        echo json_encode($arr);
	}else if($ac == 'upd_shangxiajia'){
		$id = $_REQUEST['id'];
		$query = $GLOBALS['db']->query("select * from t_jump where id=".$id);
		$arr=[];									
		while($row = $GLOBALS['db']->fetch_array($query)){
			
			if($row['status'] == 0){
				//更改为上架
                $GLOBALS['db']->query("update t_jump set status=1  where id=".$id);
				$arr=array('status'=>'success','message'=>'更改成功');
        
                
			}else{
				
				//更改为下架
                $GLOBALS['db']->query("update t_jump set status=0  where id=".$id);
		    	$arr=array('status'=>'success','message'=>'更改成功');
				
			}
		
		}
        
        echo json_encode($arr);
	}else if($ac == 'del_shanyuming'){
		$id = $_REQUEST['id'];
		$query = $GLOBALS['db']->query("select * from t_jump where id=".$id);
		$arr=[];									
		while($row = $GLOBALS['db']->fetch_array($query)){
			
			if($row['status'] == 0){
				//更改为上架
                $GLOBALS['db']->query("update t_jump set status=1  where id=".$id);
				$arr=array('status'=>'success','message'=>'更改成功');
        
                
			}else{
				
				//更改为下架
                $GLOBALS['db']->query("update t_jump set status=0  where id=".$id);
		    	$arr=array('status'=>'success','message'=>'更改成功');
				
			}
		
		}
        
        echo json_encode($arr);
        
	}else if($ac == 'vipchongzhi'){
		$id = $_REQUEST['id'];
		$query = $GLOBALS['db']->query("select * from prefix_vipprice where id=".$id);
								
		while($row = $GLOBALS['db']->fetch_array($query)){
			
			$query111 = $GLOBALS['db']->query("select * from prefix_user where in_userid=".$userid);
			
			while($row111 = $GLOBALS['db']->fetch_array($query111)){
				if($row['id']  == 1  &&  $row111['user_level'] == 2){
					 
					$haicha=$row['price'] - $row111['user_money'];
					$arr=array('status'=>'not','message'=> '超级VIP不可充值普通VIP');
					
					echo json_encode($arr);
					
					exit;
				}
				if($row111['user_money'] >= $row['price']){
					
					$time=time();
					$month=30*86400;
					$end_time=$time + $month;
					$vip_level=0;
					$num=0;
				    if($row['id'] == 1){
				    	$vip_level=1;
				    	$num=10;
				    }else if($row['id'] == 2){
				    	$vip_level=2;
				    	$num=50;
				    }

                    $GLOBALS['db']->query("update prefix_user set user_money=user_money-".$row['price']." where in_userid=".$userid);
					
					if($row111['end_time']){
						$end_time=$row111['end_time']+$month;
					}
					
					$zhuyumingnumshu="0";
					$zhuyuming = $GLOBALS['db']->getrow("select * from t_domain where pid=$userid and status=2 limit 1");
					
					$zhuyumingname="";
				    if($zhuyuming){
				    	
				    	$zhuyumingname=$zhuyuming['domain'];
					
				    }else{
				    
						$selyuming222 = $GLOBALS['db']->getrow("select * from t_domain where pid=0 limit 1");
			            
						if($selyuming222){
							
							$zhuyumingname=$selyuming222['domain'];
						
					    	$updquery=$GLOBALS['db']->query("update t_domain set buy_time=".time().",pid=".$userid.",status=2 where id=".$selyuming222['id']);
						
						}else{
							$zhuyumingname="";
							$zhuyumingnumshu++;
						}
				
				    	
				    }

                    $GLOBALS['db']->query("update prefix_user set end_time=".$end_time.",user_level=".$vip_level.",domain='".$zhuyumingname."' where in_userid=".$userid);
                    $GLOBALS['db']->query("update t_jump set end_time=".$end_time." where userid=".$userid);
					
					$s_num = 0;
					
					if($zhuyumingnumshu == 0){
						
						$znum= 0;
					    for($i=0;$i<$num;$i++){
					    	
					    	$selyuming = $GLOBALS['db']->query("select * from t_domain where pid=0 limit 1");
					
							while($rowyuming = $GLOBALS['db']->fetch_array($selyuming)){
								
								$updquery=$GLOBALS['db']->query("update t_domain set buy_time=".time().",pid=".$userid." where id=".$rowyuming['id']);
								
								$znum ++;
								
							}
					    }
						$s_num = $num-$znum;
					}else{
						$s_num = $num+1;
					}
					
					if($s_num == 0){
						
						$arr=array('status'=>'success','message'=>'购买成功');
						
					}else{
					
						// $time=time();
						$time = date('Y-m-d H:i:s',time());
                        $GLOBALS['db']->query("insert INTO prefix_buy_cha_log (uid,c_num,time) VALUES ('$userid','$s_num','$time')");
						
						$arr=array('status'=>'yujing','message'=>$s_num);
					}
					
				}else{
					$haicha=$row['price'] - $row111['user_money'];
					$arr=array('status'=>'error','message'=> $haicha);
					
				}
				
				
			}
			
		
		}
        
        echo json_encode($arr);
        
	}else if($ac == 'yumingchongzhi'){
		
		$num = $_REQUEST['num'];
        $price = $_REQUEST['price'];
		$query111 = $GLOBALS['db']->query("select * from prefix_user where in_userid=".$userid);
		
		while($row111 = $GLOBALS['db']->fetch_array($query111)){
			
			if($row111['user_money'] >= $price){
				$arr=[];
				
				
				$s_num = 0;

				$znum= 0;
			    for($i=0;$i<$num;$i++){
			    	
			    	$selyuming = $GLOBALS['db']->query("select * from t_domain where pid=0 limit 1");
			
					while($rowyuming = $GLOBALS['db']->fetch_array($selyuming)){
						
						$updquery=$GLOBALS['db']->query("update t_domain set buy_time=".time().",pid=".$userid." where id=".$rowyuming['id']);
						
						$znum ++;
						
					}
			    }
				$s_num = $num-$znum;

                $GLOBALS['db']->query("update prefix_user set user_money=user_money-".$price." where in_userid=".$userid);
				
				if($s_num == 0){

			    	$arr=array('status'=>'success','message'=>'购买成功');
				}else{
					$time = date('Y-m-d H:i:s',time());
                    $GLOBALS['db']->query("insert INTO prefix_buy_cha_log (uid,c_num,time) VALUES ('$userid','$s_num','$time')");
						
				    $arr=array('status'=>'yujing','message'=>$s_num);
				}
			
					
                
				
			}else{
				$haicha=$price - $row111['user_money'];
				$arr=array('status'=>'error','message'=> $haicha);
			}
			
			
		}
		
        echo json_encode($arr);
	}else if($ac == 'del_yumingdomain'){
		
		$id = $_REQUEST['id'];
		
        $GLOBALS['db']->query("delete from t_domain where id=".$id);
        
		$arr=array('status'=>'success','message'=>'删除成功');
        echo json_encode($arr);
	}else if($ac == 'feng_test'){
		$url = $_REQUEST['yumingid'];
		$url='http://119.23.59.104/index/checkwxurl.html?appkey=ARM2Js5Q&url='.$url;
		$html = file_get_contents($url);
		echo $html;
	
        //echo json_encode($arr);
	}else if($ac == 'feng_add_domain'){
		$url = $_REQUEST['yumingid'];
		$arr=explode(",",$url);
		$sql="insert into t_domain (domain) values ";
		
		foreach($arr as $ym){
			if(!empty($ym)){
				$sql=$sql."('".$ym."'),";
			}
		}
		$sql=substr($sql,0,strlen($sql)-1);
		$jg=$GLOBALS['db']->query($sql);
		
		$zs=$GLOBALS['db']->query("select count(*) from t_domain");
		$zs1=$GLOBALS['db']->query("select count(*) from t_domain where pid=0");
		
		$arr=array('status'=>$jg,'allnum'=> $GLOBALS['db']->num_rows($zs),'num'=> $GLOBALS['db']->num_rows($zs1));
		
		echo json_encode($arr);
	}else if($ac == 'add_fangfeng'){
		$title = $_REQUEST['title'];
		$beborn = $_REQUEST['beborn'];
		$create_time = date('Y-m-d H:i:s',time());
		
		$query111 = $GLOBALS['db']->query("select * from prefix_user where in_userid=".$userid);
					
		while($row111 = $GLOBALS['db']->fetch_array($query111)){
			if($row111['user_level'] != 0){
				
			    if($row111['user_level'] == 1){
					$sql_num = $GLOBALS['db']->num_rows($GLOBALS['db']->query("select count(*) from t_jump where user_uid=".$userid));
					if($sql_num>=1){
						$arr=array('status'=>'error','message'=> 'vip用户仅可设置1个网站');
						echo json_encode($arr); exit;
					}
				}
				
				$end_time = date('Y-m-d H:i:s',$row111['end_time']);
				if($title){
					$query22233= $GLOBALS['db']->getone("select * from t_jump where user_uid='".$userid."' and title=".$title);
				
				
					if(empty($query22233)){
						if($beborn){

                            $GLOBALS['db']->query("insert INTO t_jump (entrance,title,status,beborn,end_time,remarks,user_uid,create_time,update_time) VALUES ('$entrance','$title','1','$beborn','$end_time','$remarks','$userid','$create_time','$create_time')");
		
				         	$arr=array('status'=>'success','message'=> '添加成功');
						}else{
						   $arr=array('status'=>'error','message'=> '落地页不能为空');
						}
					}else{
				    	$arr=array('status'=>'error','message'=> '标题已存在');
					}
				}else{
				  $arr=array('status'=>'error','message'=> '标题不能为空');
				}
			}else{
				$arr=array('status'=>'error','message'=> '未授权用户');
			}
		}
		
		echo json_encode($arr);
		
	}else if($ac == 'update_fangfeng'){
		
		$upd_entrance = $_REQUEST['upd_entrance'];
		$upd_title = $_REQUEST['upd_title'];
		$upd_beborn = $_REQUEST['upd_beborn'];
		$upd_fangfengid= $_REQUEST['id'];
		$update_time = date('Y-m-d H:i:s',time());
        $GLOBALS['db']->query("update t_jump set update_time='$update_time', title='$upd_title' , beborn='$upd_beborn' where id=".$upd_fangfengid);
		
		$arr=array('status'=>'success','message'=> '修改成功');
		echo json_encode($arr);
		
	}
	
	
?>