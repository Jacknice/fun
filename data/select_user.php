<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: application/json;charset=UTF-8');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置

$sql = "SELECT u_name FROM `user`";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
if($result)
{
echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
else{
echo "sql执行失败";
}

