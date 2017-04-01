<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$type=$_REQUEST["type"];
if(trim($type, " \t.")=="-请选择工作量类型-"){
	echo "errtype";
	return;
}
$name=$_REQUEST["name"];
$num=$_REQUEST["num"];
switch($type){
      case "答辩":$score=3.0; break;
      case "项目":$score=4.0; break;
      case "论文":$score=5.0; break;
      case "评估":$score=6.0; break;
}
$type.='工作量';
if($num==1){
   $sql="SELECT `d_term` FROM `dynamic` WHERE d_workname='$type' AND u_id='$name'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
   if($row){
      echo "repeat";
   }else{
      echo "error";
   }
}else if($num==2){
   $sql="INSERT INTO `dynamic`(`d_id`, `d_term`, `d_workname`, `d_value`, `u_id`, `d_state`) VALUES (null,'2016-2017','$type','$score','$name','未审核')";
   $result = mysqli_query($conn,$sql);

   if($result){
      echo "ok";
   }else{
      echo "error";
   }
 }


?>























