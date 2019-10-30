<?php
require_once 'config.inc.php';
function back_path($uid,$path,$super){
	if(!$uid){
		$uid=$GLOBALS['db']->getone("select in_id from ".tname('app')." where in_plist='$path' ORDER BY in_id DESC");
	}
	
	$id=$GLOBALS['db']->getone("select id from prefix_path where uid=$uid");

	if($id){
		$text="";
		if($path){
			if($path==""||strpos($path,IN_DOMAIN)!==false)
				$text="path='$path'";
		}
		$text1="";
		if($super&&$super!=""&&strpos($super,IN_DOMAIN)!==false){
			$text1="super='$super'";
		}
		if($text1!=""){
			$text=$text.",".$text1;
		}else if($text=="")
			return;
		$GLOBALS['db']->query("update prefix_path set $text where id=$id");
	}else{
		if(strpos($super,IN_DOMAIN)===false)$super="";
		if(strpos($path,IN_DOMAIN)===false)$path="";
		$GLOBALS['db']->query("Insert INTO prefix_path (uid,path,super) values($uid,'$path','$super')");
		
	}
	
}


function back_path_su($uid,$super){
	if(strpos($super,IN_DOMAIN)===false)return;
	$id=$GLOBALS['db']->getone("select id from prefix_path where uid=$uid");

	if($id){
		$GLOBALS['db']->query("update prefix_path set super='$super' where id=$id");
	}else{

		$GLOBALS['db']->query("Insert INTO prefix_path (uid,super) values($uid,'$super')");
		
	}
	
}


function back_path_now(){
	$data=$GLOBALS['db']->getall("select in_id,in_plist,in_ios_super from ".tname('app'));
	foreach ($data as $value){
		back_path($value['in_id'],$value['in_plist'],$value['in_ios_super']);
	}
	
}

?>