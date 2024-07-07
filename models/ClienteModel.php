<?php

   class ClienteModel extends Database {
      

    public function fetchAllClientes() {
        $sql = "SELECT * FROM clientes WHERE user_id = ?";
        return $this->getQuery($sql, [$_SESSION['usuario']->id]);
    }
    public function findById($id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        return $this->getQuery($sql, [$id]);
    }

    public function createCliente($nome, $documento, $telefone, $endereco) {
     
        if ($this->isCNPJ($documento)) {
            $sql = "INSERT INTO clientes (user_id, nome, cnpj, telefone, endereco) VALUES (?, ?, ?, ?, ?)";
        } else {
            $sql = "INSERT INTO clientes (user_id, nome, cpf, telefone, endereco) VALUES (?, ?, ?, ?, ?)";
        }
    
        $user_id = $_SESSION['usuario']->id;
    
        $params = [$user_id, $nome, $documento, $telefone, $endereco];
    
 
        return $this->getQuery($sql, $params);
    }
 
    private function isCNPJ($documento) {
     
        $documento = preg_replace('/[^0-9]/', '', $documento);
        if (strlen($documento) > 11) {
            return true;
        }
        return false;
    }
 
     
   }