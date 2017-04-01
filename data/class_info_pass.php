<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$cla_name=$_REQUEST["cla_name"];
$y_or_no=$_REQUEST["y_or_no"];
$a=explode(',',$cla_name);
//var_dump($result[0]);
for($i=0,$len=count($a);$i<$len;$i++){
$sql = "SELECT `class_id`,`class_name`, `class_type`, `grade`, `study_hours`, `week_num`, `xueyuan`, `banji`, `ext_people`, `shiji_people`, `note` FROM `teach_info_nopass`WHERE class_id='$a[$i]'";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_row($result);

$sql = "DELETE FROM `teach_info_nopass` WHERE class_id='$a[$i]'";
mysqli_query($conn,$sql);

$sql = "INSERT INTO `teach_info_pass`(`id`, `class_id`, `class_name`, `class_type`, `grade`, `study_hours`, `week_num`, `xueyuan`, `banji`, `ext_people`, `shiji_people`, `isnot_pass`, `note`) VALUES (null,'$result[0]','$result[1]','$result[2]','$result[3]','$result[4]','$result[5]','$result[6]','$result[7]','$result[8]','$result[9]','$y_or_no','$result[10]')";
$result = mysqli_query($conn,$sql);
}
if($result){
   echo "数据已审核!!!";
}else{
   echo "SQL语句错误!!!";
}

?>























