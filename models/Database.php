<?php

class Database {
    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=rede-social;host=127.0.0.1", "root", "");
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

    public function createQuery($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            

            if (strpos(strtoupper($sql), 'INSERT') === 0) {
                $lastId = $this->pdo->lastInsertId();
                $getUserSql = "SELECT * FROM users WHERE id = ?";
                $getUserStmt = $this->pdo->prepare($getUserSql);
                $getUserStmt->execute([$lastId]);
                $user = $getUserStmt->fetchAll(PDO::FETCH_CLASS);
                return [
                    "status" => "success",
                    "data" => $user
                ];
            } else {
                return [
                    "status" => "success",
                    "data" => null
                ];
            }
        } catch(PDOException $err) {
            return [
                "status" => "error",
                "data" => $err->getMessage()
            ];
        }
    }
   
}

?>
