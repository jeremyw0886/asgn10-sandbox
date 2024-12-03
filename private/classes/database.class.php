<?php
class Database {
  private static $database;
  private $connection;

  private function __construct() {
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  public static function db_connect() {
    if(self::$database == null) {
      self::$database = new self();
    }
    return self::$database;
  }

  public function query($sql) {
    $result = mysqli_query($this->connection, $sql);
    if(!$result) {
      exit("Database query failed: " . mysqli_error($this->connection));
    }
    return $result;
  }

  public function escape_string($string) {
    return mysqli_real_escape_string($this->connection, $string);
  }

  public function insert_id() {
    return mysqli_insert_id($this->connection);
  }
}
?>
