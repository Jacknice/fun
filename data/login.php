<?php
/**接收客户端提交的用户名和密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: application/json;charset=UTF-8');

$uname = $_REQUEST['uname'];
$upwd = $_REQUEST['upwd'];
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置

$sql = "SELECT u_id,u_name, u_role FROM user WHERE u_phone='$uname' AND u_password='$upwd'";
$result = mysqli_query($conn, $sql);

if($result===false){ //SQL语句执行失败
	echo 'sqlerr';
}else {  //SQL语句执行成功
	$row = mysqli_fetch_assoc($result);
	if($row){	//读取到一行记录
		//开启session
		session_start();
		//设置session;
		$_SESSION['name']=$uname;
		echo json_encode($row, JSON_UNESCAPED_UNICODE);
	}else{	//未读取到任何记录
		echo json_encode($row, JSON_UNESCAPED_UNICODE);
	}
}

