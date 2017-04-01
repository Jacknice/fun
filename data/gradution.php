<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: application/json;charset=UTF-8');
//连接数据库
$data=['data'=>array(array())];
//var_dump($data[data][0][0]);
include('0_config.php'); //包含指定文件的内容在当前位置
$num=$_REQUEST["num"];
if($num==1){
    $stu_name=$_REQUEST["stu_name"];
    $stu_name=explode(',',$stu_name);
    $tea_name=$_REQUEST["stu_name"];
    for($i=0,$len=count($stu_name);$i<$len;$i++){
        $sql = "DELETE FROM `gradution` WHERE g_snumber='$stu_name[$i]'";
        $result=mysqli_query($conn,$sql);
    }
    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}
if($num==2){
    $kc_name=$_REQUEST["kc"];
    $cn_name=$_REQUEST["cn"];
    $sql = "DELETE FROM `teach_task` WHERE coures_name='$kc_name' AND this_class='$cn_name'";
    $result=mysqli_query($conn,$sql);

    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}
if($num==3){
    $kc_name=$_REQUEST["kc"];
    $cn_name=$_REQUEST["cn"];
    $sql = "DELETE FROM `pra_work` WHERE p_link='$kc_name' AND p_a_class='$cn_name'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}
if($num==4){
    $uname=$_REQUEST["uname"];
    $work_name=$_REQUEST["stu_name"];
    $sql = "DELETE FROM `dynamic` WHERE u_id='$uname' AND d_workname='$work_name'";
    echo $sql;
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "ok";
    }else{
        echo "error";
    }
}


?>