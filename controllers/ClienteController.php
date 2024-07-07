<?php

 class ClienteController extends RenderView {
        public function index(){
              $clienteModel = new ClienteModel();
              $clientes = $clienteModel->fetchAllClientes()['data']; 
              $this->loadView('createcliente', [
                     'title' => 'Clientes',
                     'clientes' => $clientes
                  ]);
            
               
        }

        public function clientes() {
              $clienteModel = new ClienteModel();
              $clientes = $clienteModel->fetchAllClientes()['data']; 
        
           
              $response = [
                  'success' => true,
                  'clientes' => $clientes
              ];
          
        
              header('Content-Type: application/json');
          
           
              echo json_encode($response);
          }
       public function editCliente($id){
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                 parse_str(file_get_contents("php://input"), $_PUT);
            $nome = $_PUT['nome'] ?? null;
            $cpf_cnpj = $_PUT['cpf_cnpj'] ?? null;
            $telefone = $_PUT['telefone'] ?? null;
            $endereco = $_PUT['endereco'] ?? null;
            
          
            $clienteModel = new ClienteModel();
            
      
            $result = $clienteModel->editCliente($nome, $cpf_cnpj, $telefone, $endereco,$id[0]);
            
           
            if ($result) {
              
                echo json_encode(['success' => true, 'message' => 'Cliente criado com sucesso']);
            } else {
              
                echo json_encode(['success' => false, 'message' => 'Erro ao criar cliente']);
            }
        } else {
        
            http_response_code(405); 
            echo json_encode(['success' => false, 'message' => 'Método não permitido']);
        }
       }
        public function clienteView($id){
            $clienteModel = new ClienteModel();
        
            $cliente= $clienteModel->findById($id[0])["data"][0];
              
            $this->loadView('cliente', [
                'title' => $cliente->nome,
                'cliente' => $cliente
             ]);
           
        }
        public function clienteDelete($id){
            if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                         $clienteModel = new ClienteModel();
                        
                        $result = $clienteModel->deleteById($id[0]);

                        if($result){
                            echo json_encode(['success' => true, 'message' => 'Cliente criado com sucesso', 'data' => $result, 'id'=>$id[0]]);
                          }else{
                            echo json_encode(['success' => false, 'message' => 'Erro ao criar cliente']);
                          }
            }
      }
        public function store() {
          
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 
                  $nome = $_POST['nome'] ?? null;
                  $cpf_cnpj = $_POST['cpf_cnpj'] ?? null;
                  $telefone = $_POST['telefone'] ?? null;
                  $endereco = $_POST['endereco'] ?? null;
                  
                
                  $clienteModel = new ClienteModel();
                  
            
                  $result = $clienteModel->createCliente($nome, $cpf_cnpj, $telefone, $endereco);
                  
                 
                  if ($result) {
                    
                      echo json_encode(['success' => true, 'message' => 'Cliente criado com sucesso']);
                  } else {
                    
                      echo json_encode(['success' => false, 'message' => 'Erro ao criar cliente']);
                  }
              } else {
              
                  http_response_code(405); 
                  echo json_encode(['success' => false, 'message' => 'Método não permitido']);
              }
          }
 }