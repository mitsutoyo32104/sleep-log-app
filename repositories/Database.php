<?php
namespace repositories;

use PDO;

// あとでSingletone Pattern実装
class Database {
  private $con;
  private $sqlResult;
    
  public const FETCH_MODE = "This is a flag to fetch data as a model object.";

  public function __construct() {
    $db_host = DB_HOST;
    $db_user = DB_USER;
    $db_password = DB_PASSWORD;
    $db_port = DB_PORT;
    $db_name = DB_NAME;
  
    $dsn = "mysql:host={$db_host};port={$db_port};dbname={$db_name}";
    $this->con = new PDO($dsn, $db_user, $db_password);

    $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }

   public function select($sql = "", $params = [], $type = '', $model = '') {
        $stmt = $this->executeSql($sql, $params);

        if($type === static::FETCH_MODE) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, $model);
        } else {
            return $stmt->fetchAll();
        }
    }

    public function execute($sql = "", $params = []) {
        $this->executeSql($sql, $params);
        return  $this->sqlResult;
    }

    public function selectOne($sql = "", $params = [], $type = '', $cls = '') {
        $result = $this->select($sql, $params, $type, $cls);
        return count($result) > 0 ? $result[0] : false;
    }

    public function begin() {
        $this->con->beginTransaction();
    }

    public function commit() {
        $this->con->commit();
    }

    public function rollback() {
        $this->con->rollback();
    }

    private function executeSql(string $sql, array $params) {
        $stmt = $this->con->prepare($sql);
        $this->sqlResult = $stmt->execute($params);
        return $stmt;
    }
}