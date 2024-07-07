<?php

class UserController extends RenderView
{
   public function index() {

   }

   public function show($id) {
    $id_user = $id[0];
    $user = new UserModel();
    $this->loadView('users', [
        'user' => $user->fetchUserById($id_user)['data'][0]
    ]);

   }
}