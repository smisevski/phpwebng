<?php
namespace core;

use PDO;
use PDOException;

  class DB {

      public PDO $pdo;

      public function __construct() {
          $connParams = Configuration::get('connectionParametersMysql');
        //   print_r($connParams);die;
          $this->connect($connParams);
      }

      private function connect($params) {
          try {
              $this->pdo = new PDO($params['dataSourceName'], $params['user'], $params['password']);
          } catch (PDOException $e) {
              throw new \PDOException($e->getMessage(), (int)$e->getCode());
          }
      }
}
