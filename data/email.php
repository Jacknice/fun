<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$num=$_REQUEST["num"];
if($num==1){
    $send=$_REQUEST["send"];
    $received=$_REQUEST["received"];
    $sendtime=$_REQUEST["sendtime"];
    $theme=$_REQUEST["theme"];
    $content=$_REQUEST["content"];
    $isread=$_REQUEST["isread"];
    $sql = "INSERT INTO `email` VALUES (null,'$send','$received','$sendtime','$theme','$content','$isread')";
        $result = mysqli_query($conn,$sql);
    if($result){
        echo "ok";
    }
    else{
        echo "sql执行失败";
    }
}else if($num==2){
     $theme=$_REQUEST["theme"];
     $send=$_REQUEST["send"];
     $sql = "DELETE FROM `email` WHERE send='$send' AND theme='$theme'";
     $result = mysqli_query($conn,$sql);
        if($result){
            echo "ok";
        }
        else{
            echo "sql执行失败";
        }

}
