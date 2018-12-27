<?php

date_default_timezone_set('Asia/Shanghai');
error_reporting(E_ALL);

define('DS',DIRECTORY_SEPARATOR);

define('SYS_UNIXTIME',time());

// define('ENVIRONMENT','test');//online-生产环境 test-开发环境
define('ENVIRONMENT','online');//online-生产环境 test-开发环境

// 获取url参数
$parse = $_GET['s'];

$parse_arr = explode(DS, $parse);

if (count($parse_arr) < 2) {
	echo "system error";
	exit;
}

$class_type = $parse_arr[0]; // 项目分类
$class_name = $parse_arr[1]; // 类名
$extra_parame = isset($parse_arr[2]) ? $parse_arr[2] : 0; // 参数

switch ($class_type) {
	case 'app':
		include ('../app.php');
		break;
	case 'h5':
		include ('../h5.php');
		break;
	case 'lecturer':
		include ('../lecturer.php');
		break;
	case 'admin':
		include ('../admin.php');
		break;
	default:
		echo "system error";
		exit;
		break;
}
