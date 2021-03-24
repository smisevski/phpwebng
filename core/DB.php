<?php

namespace core {

  class DB {

    private $db_type;
    private $db_hostname;
    private $db_port;
    private $db_user;
    private $db_password;
    private $db_name;
    private $conn;
    public $result;

    function __construct() {
      $this->db_type = DBMS;
      $this->db_hostname = DB_HOST;
      $this->db_port = DB_PORT;
      $this->db_user = DB_USER;
      $this->db_password = DB_PASSWORD;
      $this->db_name = DB_NAME;

    }

    public function connect() {
      $this->conn =  mysqli_connect($this->db_hostname, $this->db_user, $this->db_password, $this->db_name, $this->db_port);
      if (!$this->conn) {
        echo "Failed to connect: " .mysqli_connect_error();
        exit();
      }
      return $this;
    }

    public function query($sql) {
       if ($this->conn->query($sql)) {
          $response = mysqli_query($this->conn, $sql);
          mysqli_fetch_assoc($response);
          $this->result = $response;
       }
       $this->close();
       return $this;
    }

    public function get() {
      return $this->result;
    }

    private function close() {
      $this->conn->close();
    }



  }
}
