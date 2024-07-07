<?php

class Database {
    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=micromidia;host=127.0.0.1", "root", "afklol57");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            exit;
        }
    }

    

    protected function getQuery($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_CLASS);
            return [
                "status" => "success",
                "data" => $results
            ];
        } catch(PDOException $err) {
            return [
                "status" => "error",
                "data" => $err->getMessage()
            ];
        }
    }


   
}

?>
