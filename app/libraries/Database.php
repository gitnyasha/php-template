<?php
namespace App\libraries;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "test";

    private $statement;
    private $dbhandler;
    private $error;

    public function __construct() {
        $conn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbhandler = new PDO($conn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql) {
        $this->statement = $this->dbhandler->prepare($sql);
    }

    public function exec($sql) {
        $this->statement = $this->dbhandler->exec($sql);
    }

    public function bind($para, $value, $type = null) {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($para, $value, $type);
    }

    public function execute() {
        return $this->statement->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount() {
        $this->execute();
        return $this->statement->rowCount();
    }

}