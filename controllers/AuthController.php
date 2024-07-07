<?php

class AuthController extends RenderView {
    public function loginpage() {
        $this->loadView('login', [
            'title' => 'Login'
        ]);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
            $this->error(400, 'Requisição inválida');
        }

        $email = $_POST["email"] ?? null;
        $senha = $_POST["password"] ?? null;

        if (empty($email) || empty($senha)) {
            $this->error(400, 'Preencha todos os campos');
        }

        $userModel = new UserModel();
        $result = $userModel->findByEmail($email);

        if ($result['status'] === 'error') {
            $this->error(500, 'Erro interno no servidor');
        }

        if (count($result['data']) === 0) {
            $this->error(401, 'Email ou senha inválidos');
        }

        if (!password_verify($senha, $result['data'][0]->password)) {
            $this->error(401, 'Email ou senha inválidos');
        }
        $usuario = (object) [
            'id' => $result['data'][0]->id,
            'name' => $result['data'][0]->name,
            'email' => $result['data'][0]->email,
            
        ];
        $_SESSION["usuario"] = $usuario;
        echo json_encode(['success' => true]);
        exit;
    }

    public function registerpage() {
        $this->loadView('register', [
            'title' => 'Register'
        ]);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->error(400, 'Método de requisição inválido');
        }

        $name = $_POST["name"] ?? null;
        $username = $_POST["username"] ?? null;
        $email = $_POST["email"] ?? null;
        $senha = $_POST["password"] ?? null;

        if (empty($email) || empty($senha) || empty($username)) {
            $this->error(400, 'Preencha todos os campos');
        }

     
        $userModel = new UserModel();
        $existingUser = $userModel->findByEmail($email);

        if ($existingUser['status'] !== 'error' && count($existingUser['data']) > 0) {
            $this->error(400, 'Email já cadastrado');
        }

        

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
         $userModel->createUser($username,$name, $email, $senhaHash); 
         $result = $userModel->findByEmail($email);
     
        if ($result['status'] === 'error') {
            $this->error(500, 'Erro ao registrar usuário');
        }
        $usuario = (object) [
            'id' => $result['data'][0]->id,
            'name' => $result['data'][0]->name,
            'email' => $result['data'][0]->email,
            
        ];
       
        $_SESSION["usuario"] = $usuario;
        echo json_encode(['success' => true]);
        exit;
    }

    public function error($errorCode, $errorMessage) {
        http_response_code($errorCode);
        echo json_encode(['error' => $errorMessage]);
        exit;
    }
}

?>
