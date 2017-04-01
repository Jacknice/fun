<?php
/**此页面需要被其它页面包含**/
$db_url = '127.0.0.1';
$db_user = "root";
$db_pwd = '';
$db_name = 'teacher_work';
$db_port = 3306;

$conn = mysqli_connect($db_url, $db_user, $db_pwd, $db_name, $db_port);
//设置编码方式
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);