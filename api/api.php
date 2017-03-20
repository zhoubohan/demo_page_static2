<?php 
	
	//连接数据库获取数据
	require_once('../db.php');
	$connect = Db::getInstance()->connect();
	$sql = "SELECT * FROM DBNAME WHERE CONDITION";
	$result = mysql_query($sql);
	$arrs = array();
	while ($row = mysql_fetch_array($result)) {
		$arrs[] = $row;
	}

	pageShow(1,'success',$arrs);

	function pageShow($code = 0,$message = 'error',$data = array())
	{
		$result = array(
				'code' => $code,
				'message' => $message,
				'data' => $data
			);
		echo json_encode($result);
	}