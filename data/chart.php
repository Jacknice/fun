<?php
/**接收客户端提交的新密码，验证是否正确，向客户端输出ok或err**/
header('Content-Type: application/json;charset=UTF-8');
//连接数据库
include('0_config.php'); //包含指定文件的内容在当前位置
$uname=$_REQUEST["uname"];
	$data=array(
	'code'=>0,
	"msg"=>'',
	"data"=>array(
		"mine"=>array("username"=>null,"id"=>null,"status"=>null,"sign"=>null,"avatar"=>null),
		'friend'=>[]));
	$data['data']['mine']['username']=$uname;
    $sql = "SELECT `u_id`, `u_institue`, `sign`,`status` ,`u_picture` FROM `user` WHERE u_name='$uname'";
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
        $data['data']['mine']['id']=$result[0]['u_id'];
        $data['data']['mine']['status']=$result[0]['status'];
        $data['data']['mine']['sign']=$result[0]['sign'];
        $data['data']['mine']['avatar']=$result[0]['u_picture'];
        $data['data']['friend'][0]['groupname']=$result[0]['u_institue'];
		$data['data']['friend'][0]['id']=1;
		$data['data']['friend'][0]['online']=2;

    //$data['data']=$array;
    //var_dump($result);
    $xy=$data['data']['friend'][0]['groupname'];
    $sql = "SELECT `u_id`, `u_name`, `sign`,`u_picture` FROM `user` WHERE u_institue='$xy' AND u_name!='$uname'";
    $result1 = mysqli_query($conn,$sql);
    $result1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    for($i=0;$i<count($result1);$i++) {
        $data['data']['friend'][0]['list'][$i]['username']=$result1[$i]['u_name'];
        $data['data']['friend'][0]['list'][$i]['id']=$result1[$i]['u_id'];
        $data['data']['friend'][0]['list'][$i]['avatar']=$result1[$i]['u_picture'];
        $data['data']['friend'][0]['list'][$i]['sign']=$result1[$i]['sign'];
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
	


?>