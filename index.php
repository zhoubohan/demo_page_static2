<?php
  //判断文件失效时间并判断是否生成静态文件
  if (is_file('index.shtml') && (time() - filemtime('index.shtml') < 300)) {
    require_once('index.shtml');
  }else {
    require_once('db.php');

    //连接数据库获取数据
    $connect = Db::getInstance()->connect();
    $sql = "SELECT * FROM DBNAME WHERE CONDITION";
    $result = mysql_query($sql);
    $arrs = array();
    while ($row = mysql_fetch_array($result)) {
      $arrs[] = $row;
    }

    //开启缓冲区
    ob_start();

    //引入模板文件
    require_once('templates/temp.php');
    file_put_contents('index.shtml',ob_get_contents());
  }
