<?php
/**
 * 数据库连接时封装
 */
class Db
{
  //存储类的实例的静态成员变量
  private static $_instance;
  //数据库连接静态变量
  private static $_connectSource;
  //连接数据库的配置
  private $_dbConfig =  array(
    'host' => 127.0.0.1,
    'user' => 'root',
    'password' => '',
    'database' => 'demo',
  );
  private function __construct()
  {
    # code...
  }

  /**
  *实例化
  */
  public static function getInstance() {
    //判断是否被实例化
    if (!(self::$_instance instanceof self)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  /**
  *数据库连接
  */
  public function connect() {
    if (!self::$_connectSource) {
      //连接数据库
      self::$_connectSource = @mysql_connect($this->_dbConfig['host'],
                                             $this->_dbConfig['user'],
                                             $this->_dbConfig['password']);
      if (!self::$_connectSource) {
        throw new Exception("mysql connect error");
      }

      mysql_select_db($this->_dbConfig,self::$_connectSource);
      mysql_query("set names UTF8",self::$_connectSource);

      return self::$_connectSource;
    }
  }
}
