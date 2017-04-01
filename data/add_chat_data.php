<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$num=$_REQUEST["num"];
   
if($num==1){
	$sign=$_REQUEST["sign"];
	$uname=$_REQUEST["uname"];
   	$sql="UPDATE `user` SET `sign` = '$sign' WHERE `user`.`u_name` = '$uname'";
	$result = mysqli_query($conn,$sql);
    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}else if($num==5){
	$zt=$_REQUEST["zt"];
	$uname=$_REQUEST["uname"];
   	$sql="UPDATE `user` SET `status` = '$zt' WHERE `user`.`u_name` = '$uname'";
	$result = mysqli_query($conn,$sql);
    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}else if($num==2){
	$who=$_REQUEST["who"];
	$send=$_REQUEST["send"];
	$id=$_REQUEST["id"];
	$type=$_REQUEST["type"];
	$avatar=$_REQUEST["avatar"];
	$content=$_REQUEST["content"];
	$zt=$_REQUEST["zt"];
	$sql="INSERT INTO `chat`(`mine`, `send`, `content`,`id`, `type`, `avatar`, `zt`) VALUES ('$who','$send','$content','$id','$type','$avatar','$zt')";
	$result = mysqli_query($conn,$sql);
    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}
else if($num==3){
	$send=$_REQUEST["send"];
	$sql="SELECT `mine`, `send`, `content`,`id`, `type`, `avatar`, `zt` FROM `chat` WHERE send='$send'";
	$result = mysqli_query($conn,$sql);
	$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
	$sql="DELETE FROM `chat`  WHERE send='$send'";
	$result = mysqli_query($conn,$sql);
}

?>























