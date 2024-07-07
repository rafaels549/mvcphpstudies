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