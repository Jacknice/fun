<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: text/plain');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$num=$_REQUEST["num"];
   $d1=$_REQUEST['class_name'];
   $d2=$_REQUEST['score'];
   $d3=$_REQUEST['nianji'];
   $d4=$_REQUEST['zhuanye'];
   $d5=$_REQUEST['class_type'];
   $d6=$_REQUEST['banji'];
   $d7=$_REQUEST['kaishi'];
   
   $d9=$_REQUEST['study_time'];
   $d10=$_REQUEST['uname'];
if($num==1){
	$d8=$_REQUEST['stu_num'];
   $sql="INSERT INTO `teach_task`(`coures_name`, `credits`, `grade`, `pro`, `type2`, `this_class`, `test_way`, `stu_num`, `total_hours`,  `teacher_name`,  `note`) VALUES (
   '$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','未审核')";
}else if($num==2){
   $b1=$_REQUEST['d1'];
   $b2=$_REQUEST['d2'];
   $d8=$_REQUEST['stu_num'];
   $sql="UPDATE `teach_task` SET `coures_name`='$d1',`credits`='$d2',`grade`='$d3',`pro`='$d4',`type2`='$d5',`this_class`='$d6',`test_way`='$d7',`stu_num`='$d8',`total_hours`='$d9',`note`='未审核' WHERE coures_name='$b1' AND this_class='$b2'";
}else if($num==3){
   $b1=$_REQUEST['d1'];
   $b2=$_REQUEST['d2'];
   $d8=$_REQUEST['stu_num'];
   $sql="UPDATE `pra_work` SET `p_link`='$d1',`p_score`='$d5',`p_type`='$d2',`p_class`='$d9',`p_major`='$d3',`p_a_class`='$d4',`p_stunum`='$d6',`p_week`='$d7',`p_start`='$d8',`p_teacher`='$d10',`p_note`='未审核'  WHERE p_link='$b1' AND p_a_class='$b2'";
}else if($num==4){
	$d8=$_REQUEST['stu_num'];
   $sql="INSERT INTO `pra_work`(`id`, `p_link`, `p_score`, `p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,  `p_note`) VALUES (null,'$d1','$d5','$d2','$d9','$d3','$d4','$d6','$d7','$d8','$d10','未审核')";
}else if($num==5){
   $sql="INSERT INTO `gradution`(`g_id`, `g_term`, `u_name`,`g_institute`, `g_sclass`, `g_snumber`, `g_sname`,  `g_project`, `g_note`, `g_zt`)  VALUES (null,'$d1','$d5','$d2','$d9','$d3','$d4','$d6','$d7','未审核')";
}else if($num==6){
	$b1=$_REQUEST['d1'];
   $sql="UPDATE `gradution` SET `g_id`=null,`g_term`='$d1',`u_name`='$d5',`g_institute`='$d2',`g_sclass`='$d9',`g_snumber`='$d3',`g_sname`='$d4',`g_project`='$d6',`g_note`='$d7' WHERE g_snumber='$b1'";
}

   $result = mysqli_query($conn,$sql);
      if($result){
         echo "ok";
      }else{
         echo "error";
      }
?>























