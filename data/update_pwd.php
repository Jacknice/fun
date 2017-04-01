<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');
$upwd = $_REQUEST['ok_new_pwd'];
$u_name= $_REQUEST['u_name'];
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置

$sql = "UPDATE user SET u_password ='$upwd' WHERE u_name='$u_name'";
$result = mysqli_query($conn,$sql);

if($result)
{
echo "sql执行成功";
}
else{
echo "sql执行失败";
}

