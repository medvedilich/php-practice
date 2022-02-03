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

    private function identify(&$sql, array $conditions){
        if($conditions == null)
            return;
        $sql .= ' WHERE ';
        $parameters = [];
        foreach($conditions as $i){
            if($i[1] === null){
                if($i[2] == '=')
                    $sql .= $i[0].' IS NULL AND ';
                elseif($i[2] == '!=')
                    $sql .= $i[0].' IS NOT NULL AND ';
            }
            else{
                if(!isset($i[2]))
                    $i[2] = '=';
                $index = array_search($i, $conditions);
                $sql .= $i[0].$i[2].':a'.$index.' AND ';
                $parameters["a$index"] = $i[1];
            }
        }
        $sql = substr($sql, 0, strlen($sql)-5);
        return $parameters;
    }

    function getRows($table, $field = null, ...$conditions){
        if($field === null)
            $field = '*';

        $sql = "SELECT $field FROM $table";

        if($conditions != null && is_array($conditions[0][0]))
            $conditions = $conditions[0];

        $parameters = $this->identify($sql, $conditions);
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

        if($field === '*')
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    function deleteRows($table, ...$conditions){
        $sql = "DELETE FROM $table ";

        if($conditions != null && is_array($conditions[0]))
            $conditions = $conditions[0];

        $parameters = $this->identify($sql, $conditions);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
    }
}
$db = new Database('localhost', 'root', '', 'shop');
