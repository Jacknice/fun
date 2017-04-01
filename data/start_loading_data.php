<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: application/json;charset=UTF-8');
//连接数据库
$num=$_REQUEST["num"];
$uname=$_REQUEST["name"];
include('0_config.php'); //包含指定文件的内容在当前位置
if($num=="1"){
    $data=['data'=>array(array())];
    //var_dump($data[data][0][0]);
    $sql = "SELECT  `p_link`, `p_score`, `p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,`p_note` FROM `pra_work` where p_teacher='$uname'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array=[];
    for($i=0;$i<count($result);$i++) {
        $data['data'][$i][0]=$result[$i]['p_link'];
        $data['data'][$i][1]=$result[$i]['p_score'];
        $data['data'][$i][2]=$result[$i]['p_type'];
        $data['data'][$i][3]=$result[$i]['p_class'];
        $data['data'][$i][4]=$result[$i]['p_major'];
        $data['data'][$i][5]=$result[$i]['p_a_class'];
        $data['data'][$i][6]=$result[$i]['p_stunum'];
        $data['data'][$i][7]=$result[$i]['p_week'];
        $data['data'][$i][8]=$result[$i]['p_start'];
        $data['data'][$i][9]=$result[$i]['p_teacher'];
        $data['data'][$i][10]=$result[$i]['p_note'];
    }

    //$data['data']=$array;
    //var_dump($result);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
if($num=="2"){
    $data=['data'=>array(array())];
    //var_dump($data[data][0][0]);
    $sql = "SELECT `g_term`, `g_institute`, `g_sclass`, `g_snumber`, `g_sname`, `u_name`, `g_project`, `g_note`, `g_zt` FROM `gradution` where u_name='$uname'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array=[];
    for($i=0;$i<count($result);$i++) {
        $data['data'][$i][0]=$result[$i]['g_term'];
        $data['data'][$i][1]=$result[$i]['u_name'];
        $data['data'][$i][2]=$result[$i]['g_institute'];
        $data['data'][$i][3]=$result[$i]['g_sclass'];
        $data['data'][$i][4]=$result[$i]['g_snumber'];
        $data['data'][$i][5]=$result[$i]['g_sname'];
        $data['data'][$i][6]=$result[$i]['g_project'];
        $data['data'][$i][7]=$result[$i]['g_note'];
        $data['data'][$i][8]=$result[$i]['g_zt'];
    }

    //$data['data']=$array;
    //var_dump($result);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
if($num=="3"){
    $data=['data'=>array(array())];
    //var_dump($data[data][0][0]);
    $sql = "SELECT `coures_name`, `credits`, `grade`, `pro`,  `type2`, `this_class`, `test_way`, `stu_num`, `total_hours`,`note` FROM `teach_task` where teacher_name='$uname'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array=[];
    for($i=0;$i<count($result);$i++) {
        $data['data'][$i][0]=$result[$i]['coures_name'];
        $data['data'][$i][1]=$result[$i]['credits'];
        $data['data'][$i][2]=$result[$i]['grade'];
        $data['data'][$i][3]=$result[$i]['pro'];
        $data['data'][$i][4]=$result[$i]['type2'];
        $data['data'][$i][5]=$result[$i]['this_class'];
        $data['data'][$i][6]=$result[$i]['test_way'];
        $data['data'][$i][7]=$result[$i]['stu_num'];
        $data['data'][$i][8]=$result[$i]['total_hours'];
        $data['data'][$i][9]=$result[$i]['note'];
    }

    //$data['data']=$array;
    //var_dump($result);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
if($num=="4"){
    $data=['data'=>array(array())];
    //var_dump($data[data][0][0]);
    $sql = "SELECT  `d_term`, `d_workname`, `d_value`, `u_id`, `d_state` FROM `dynamic` where u_id='$uname'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array=[];
    for($i=0;$i<count($result);$i++) {
        $data['data'][$i][0]=$result[$i]['d_term'];
        $data['data'][$i][1]=$result[$i]['u_id'];
        $data['data'][$i][2]=$result[$i]['d_workname'];
        $data['data'][$i][3]=$result[$i]['d_value'];
        $data['data'][$i][4]=$result[$i]['d_state'];
    }

    //$data['data']=$array;
    //var_dump($result);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
?>