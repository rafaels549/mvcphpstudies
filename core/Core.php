<?php 

class Core {
    public function run($routes) {
        $url = '/';
        isset($_GET['url']) ? $url .= $_GET['url'] : '';
        ($url != '/') ? $url = rtrim($url, '/') : $url;
        $routerFound = false;
        foreach($routes as $path => $routeConfig) {
            $controller = $routeConfig['controller'];
            $middleware = isset($routeConfig['middleware']) ? $routeConfig['middleware'] : null;
            
            $pattern = '#^'.preg_replace('/{id}/', '(\w+)', $path).'$#';
            if(preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $routerFound = true;
                
              
                if ($middleware === 'auth') {
                    if (!$this->checkAuth()) {
                        $this->redirect('/mvcphp/login'); 
                        return;
                    }
                }
                
                if ($middleware === 'guest') {
                    if ($this->checkAuth()) {
                        $this->redirect('/mvcphp/'); 
                        return;
                    }
                }
                
                [$currentController, $action] = explode('@', $controller);
                require_once __DIR__ . "/../controllers/$currentController.php";
                $newController = new $currentController();
                $newController->$action($matches);
            }
        }

        if(!$routerFound) {
            require_once __DIR__ . "/../controllers/NotFoundController.php"; 
            $controller =  new NotFoundController();
            $controller->index();
        }
    }
    
    private function checkAuth() {
        
        return isset($_SESSION['usuario']);
    }
    
    private function redirect($url) {
        header("Location: $url");
        exit();
    }
}
