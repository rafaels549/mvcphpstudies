<?php

   class ClienteModel extends Database {
      

    public function fetchAllClientes() {
        $sql = "SELECT * FROM clientes";
        return $this->getQuery($sql);
    }
    public function findById($id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        return $this->getQuery($sql, [$id]);
    }
        
    public function createCliente($nome, $documento, $telefone, $endereco) {
     
        if ($this->isCNPJ($documento)) {
            $sql = "INSERT INTO clientes (nome, cnpj, telefone, endereco) VALUES (?, ?, ?, ?)";
        } else {
            $sql = "INSERT INTO clientes (nome, cpf, telefone, endereco) VALUES (?, ?, ?, ?)";
        }
    
    
        $params = [$nome, $documento, $telefone, $endereco];
    
 
        return $this->getQuery($sql, $params);
    }
    public function editCliente($nome, $documento, $telefone, $endereco, $id) {
        if ($this->isCNPJ($documento)) {
            $sql = "UPDATE clientes SET nome = ?, cnpj = ?, telefone = ?, endereco = ? WHERE id = ?";
        } else {
            $sql = "UPDATE clientes SET nome = ?, cpf = ?, telefone = ?, endereco = ? WHERE id = ?";
        }
    
        $params = [$nome, $documento, $telefone, $endereco, $id];
    
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