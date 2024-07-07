<?php 

class HomeController extends RenderView
 {
    public function index() {
    $users =  new UserModel();

    $this->loadView('home', [
       'title' => 'Ordens de Serviço',
       'users' => $users->fetchAllUsers()['data']
    ]);
    }
}