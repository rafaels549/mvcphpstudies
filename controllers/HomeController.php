<?php 

class HomeController extends RenderView
 {
    public function index() {
         $ordem_servico=  new OrdemServicoModel();
      $cliente = new ClienteModel();

      $this->loadView('home', [
         'title' => 'Ordens de Serviço',
         'ordens_servico' =>  $ordem_servico->fetchAllOrdensServico()['data'],
         'clientes' => $cliente->fetchAllClientes()['data']
      ]);
      }  

      
      public function ordens() {
        $ordemServicoModel = new OrdemServicoModel();
        $ordensServico = $ordemServicoModel->fetchAllOrdensServico()['data']; 
  
     
        $response = [
            'success' => true,
            'ordensServico' => $ordensServico
        ];
    
      
        header('Content-Type: application/json');
    
     
        echo json_encode($response);
    }

    public function ordemView($id){
      $ordemModel = new OrdemServicoModel();
      $cliente = new ClienteModel();
      $ordemServico = $ordemModel->findById($id[0])["data"][0];
        
      $this->loadView('ordem', [
          'title' => $ordemServico->descricao,
          'ordemServico' => $ordemServico,
          'clientes' => $cliente->fetchAllClientes()['data']
       ]);
     
  }

  public function ordemEdit($id){
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
      parse_str(file_get_contents("php://input"), $_PUT);
      $ordemModel = new OrdemServicoModel();
      $id_ordem = $id[0];
      $id_cliente= $_PUT['cliente'] ?? null;
      $descricao = $_PUT['descricao'] ?? null;
      $orcamento= $_PUT['orcamento'] ?? null;
      $result = $ordemModel->updateOrdemServico($id_ordem, $id_cliente, $descricao, $orcamento);
      if($result){
        echo json_encode(['success' => true, 'message' => 'Cliente criado com sucesso']);
      }else{
        echo json_encode(['success' => false, 'message' => 'Erro ao criar cliente']);
      }
    } else{
      http_response_code(405); 
      echo json_encode(['success' => false, 'message' => 'Método não permitido']);
     }
   
}

      public function store(){
                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                          $ordem_servico = new OrdemServicoModel();
                          $id_cliente= $_POST['cliente'] ?? null;
                          $descricao = $_POST['descricao'] ?? null;
                          $orcamento= $_POST['orcamento'] ?? null;
                        
                          
                          $result = $ordem_servico->createOrdemServico($id_cliente, $descricao, $orcamento);

                               if($result){
                                 echo json_encode(['success' => true, 'message' => 'Cliente criado com sucesso']);
                               }else{
                                 echo json_encode(['success' => false, 'message' => 'Erro ao criar cliente']);
                               }

                 }else{
                  http_response_code(405); 
                  echo json_encode(['success' => false, 'message' => 'Método não permitido']);
                 }
      }

      public function ordemDelete($id) {
        $ordemModel = new OrdemServicoModel();
       $result = $ordemModel->deleteById($id[0]);
       if($result){
        echo json_encode(['success' => true, 'message' => 'Cliente criado com sucesso', 'data' => $result]);
      }else{
        echo json_encode(['success' => false, 'message' => 'Erro ao criar cliente']);
      }
      }
}