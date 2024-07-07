<?php 

class OrdemServicoModel extends Database {
    public function fetchAllOrdensServico() {
        $sql = "SELECT 
            os.id,
            os.descricao AS descricao_ordem_servico,
            os.orcamento,
            c.nome AS nome_cliente,
            c.telefone AS cliente_telefone,
            c.cpf AS cliente_cpf,
            os.cliente_id,
            c.cnpj AS cliente_cnpj
        FROM ordem_servico os
        INNER JOIN clientes c ON os.cliente_id = c.id
        ORDER BY os.created_at DESC"; // Ordenando pelo campo created_at de forma decrescente
        return $this->getQuery($sql);
    }

    public function findById($id) {
        $sql = "SELECT * FROM ordem_servico WHERE id = ?";
        return $this->getQuery($sql, [$id]);
    }

    public function deleteById($id) {
        $sql = "DELETE FROM ordem_servico WHERE id = ?";
        $params = [$id];
        return $this->getQuery($sql, $params);
    }

    public function createOrdemServico($id_cliente, $descricao, $orcamento){
       
    
                $sql = "INSERT INTO ordem_servico (descricao, cliente_id, orcamento) VALUES (?, ?, ?)";
           
        
        
            $params = [$descricao, $id_cliente, $orcamento];
        
     
            return $this->getQuery($sql, $params);
        
         
    }

    public function updateOrdemServico($id, $id_cliente, $descricao, $orcamento) {
        $sql = "UPDATE ordem_servico SET descricao = ?, cliente_id = ?, orcamento = ? WHERE id = ?";
        $params = [$descricao, $id_cliente, $orcamento, $id];
        return $this->getQuery($sql, $params);
    }
}