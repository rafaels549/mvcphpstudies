<?php 

class HomeController extends RenderView
 {
    public function index() {
         $ordem_servico=  new OrdemServicoModel();
      $cliente = new ClienteModel();
      var_dump($ordem_servico->fetchAllOrdensServico()['data']);
      $this->loadView('home', [
         'title' => 'Ordens de Serviço',
         'ordens_servico' =>  $ordem_servico->fetchAllOrdensServico()['data'],
         'clientes' => $cliente->fetchAllClientes()['data']
      ]);
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
}