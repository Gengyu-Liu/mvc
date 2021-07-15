<?php

require 'DatabaseInterface.php';

class Database extends PDO implements DatabaseInterface {
    
    public function __construct() {
        $cfg = Config::getInstance();
        parent::__construct($cfg->get('dsn'),$cfg->get('username'),$cfg->get('password'));
        
    }
    
    public function delete($table, $where) {
        // DELETE FROM kunde WHERE id=3
        $query = "DELETE FROM $table WHERE $where";
        return $this->exec($query);
    }

    public function get($table) {
        // SELECT * FROM kunde
        $query = "SELECT * FROM $table";
        $stmt = $this->query($query);
        return $stmt->fetchAll();
    }

//    public function insert($table, array $data) {
//        // INSERT INTO kunde (vorname,nachname) VALUES ('Max','Mustermann')
//        foreach ($data as $key => $value) {
//            $cols[] = $key;
//            $values[] = "'" . $value . "'";
//        }
//        $query = "INSERT INTO $table (".implode(',',$cols).") VALUES (".implode(',',$values).")";
//        return $this->exec($query);
//    }
    
    public function insert($table, array $data) {
        // INSERT INTO kunde (spalte1,spalte2) VALUES (:spalte1,:spalte2)
        foreach ($data as $key => $value) {
            $cols[]   = $key;
            $values[] = $value;
            $placeholder[] = ':'.$key;
        }
        $query = "INSERT INTO $table (".implode(',',$cols).") VALUES (".implode(',',$placeholder).")";
        $stmt = $this->prepare($query);
        foreach ($values as $key => $value) {
            $stmt->bindParam($placeholder[$key], $values[$key]);
        }
        return $stmt->execute();
    }
    
    public function update($table, array $data, $where) {
        // UPDATE kunde SET spalte1=:spalte1, spalte2=:spalte2 WHERE id=4
        foreach ($data as $key => $value) {
            $values[] = $value;
            $placeholder[] = ':'.$key;
            $set[] = $key . '=:' . $key;
        }
        $query = "UPDATE $table SET " . implode(',',$set) . " WHERE $where";
        $stmt = $this->prepare($query);
        foreach ($values as $key => $value) {
            $stmt->bindParam($placeholder[$key], $values[$key]);
        }
        return $stmt->execute();
    }
}
