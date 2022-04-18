<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserdataAPI extends ResourceController
{
    protected $modelName = 'App\Models\UsersModel';
    protected $format = 'json';


    public function index()
    {
        $session = session();
        $username = $session->get('username');
        $dataUser = $this->model->where(['username' => $username])->first();
        if ($dataUser) {
            session()->set([
                'email' => $dataUser->email,
                'first_name' => $dataUser->first_name,
                'last_name' => $dataUser->last_name,
            ]);

            return redirect()->to(base_url('home'));
        } else {
            echo 'failed';
        }
    }
}
