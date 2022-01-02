<?php
class Database{
    private $pdo;
    function __construct($hostname, $user, $password, $database){
        $this->pdo = new PDO("mysql:host=$hostname;dbname=$database;", $user, $password);
    }

    function createRow($table, array $values){
        $sql = "INSERT INTO $table(";
        $fields = array_keys($values);
        
        foreach($fields as $field){
            $sql .= $field.', ';
        }
        $sql = substr($sql, 0, strlen($sql)-2);
        $sql .= ') VALUES (';

        foreach($fields as $field){
            $sql .= ':'.$field.', ';
        }
        $sql = substr($sql, 0, strlen($sql)-2);
        $sql .= ')';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
    }

    function getRows($table, array $requirements = null){
        $sql = "SELECT * FROM $table ";
        if(isset($requirements)){
            $sql .= 'WHERE ';

            $keys = array_keys($requirements);
            foreach($keys as $key){
                $sql .= $key.'=:'.$key.' AND ';
            }
            $sql = substr($sql, 0, strlen($sql)-5);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($requirements);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteRows($table, array $requirements = null){
        $sql = "DELETE FROM $table ";
        if(isset($requirements)){
            $sql .= 'WHERE ';

            $keys = array_keys($requirements);
            foreach($keys as $key){
                $sql .= $key.'=:'.$key.' AND ';
            }
            $sql = substr($sql, 0, strlen($sql)-5);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($requirements);
    }
}