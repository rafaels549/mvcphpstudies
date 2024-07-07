<?php 

class OrdemServicoModel extends Database {
    public function fetchAllOrdensServico() {
        $sql = "SELECT 
            os.descricao AS descricao_ordem_servico,
            os.orcamento,
            c.nome AS nome_cliente,
            c.telefone,
            c.cpf AS cliente_cpf,
            os.cliente_id,
            c.cnpj AS cliente_cnpj
        FROM ordem_servico os
        INNER JOIN clientes c ON os.cliente_id = c.id";
        return $this->getQuery($sql);
    }


    public function createOrdemServico($id_cliente, $descricao, $orcamento){
       
    
                $sql = "INSERT INTO ordem_servico (descricao, cliente_id, orcamento) VALUES (?, ?, ?)";
           
        
        
            $params = [$descricao, $id_cliente, $orcamento];
        
     
            return $this->getQuery($sql, $params);
        
         
    }
}