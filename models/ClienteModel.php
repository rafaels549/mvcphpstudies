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

    public function findByEmail($email) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        return $this->getQuery($sql, [$id]);
    }
     
    
 
     
   }