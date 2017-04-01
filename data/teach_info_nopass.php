<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: application/json;charset=UTF-8');
//连接数据库
$data=['data'=>array(array())];
//var_dump($data[data][0][0]);
include('0_config.php'); //包含指定文件的内容在当前位置
$sql = "SELECT  `teacher_id`, `class_id`, `class_name`, `class_type`, `grade`, `study_hours`, `week_num`, `xueyuan`, `banji`, `ext_people`, `shiji_people`, `note` FROM `teach_info_nopass`";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);
$array=[];
for($i=0;$i<count($result);$i++) {
    $data['data'][$i][0]=$result[$i]['teacher_id'];
    $data['data'][$i][1]=$result[$i]['class_id'];
    $data['data'][$i][2]=$result[$i]['class_name'];
    $data['data'][$i][3]=$result[$i]['class_type'];
    $data['data'][$i][4]=$result[$i]['grade'];
    $data['data'][$i][5]=$result[$i]['study_hours'];
    $data['data'][$i][6]=$result[$i]['week_num'];
    $data['data'][$i][7]=$result[$i]['xueyuan'];
    $data['data'][$i][8]=$result[$i]['banji'];
    $data['data'][$i][9]=$result[$i]['ext_people'];
    $data['data'][$i][10]=$result[$i]['shiji_people'];
    $data['data'][$i][11]=$result[$i]['note'];
}

//$data['data']=$array;
//var_dump($result);
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>