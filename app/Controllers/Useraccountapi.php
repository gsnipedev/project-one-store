<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\CLI\Console;

class Useraccountapi extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\UserAccountModel';
    protected $format = 'json';
    public $userToken = '';



    public function tokenSignIn()
    {
        require_once 'vendor/autoload.php';
        $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($id_token);
        if ($payload) {
            $userid = $payload['sub'];
            // If request specified a G Suite domain:
            //$domain = $payload['hd'];
        } else {
            // Invalid ID token
        }
        $data = [
            'username' => $this->request->getPost('profileName'),
            'imageUrl' => $this->request->getPost('profileImage'),
            'userEmail' => $this->request->getPost('profileEmail'),
        ];

        return view('index');
    }


    public function signIn()
    {
        if (session()->has('logged_in')) {
            session_unset();
        }
        $imgModel = model('App\Models\ImgModel');
        $userdatamodel = model('App\Models\UsersModel');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ];
        $dataUser = $this->model->where(['username' => $username])->first();
        if ($dataUser) {
            $dataUser2 = $userdatamodel->where(['username' => $username])->first();
            $imgData = $imgModel->where(['img_id' => $dataUser2->img_id])->first();
            if (password_verify($password, $dataUser->password)) {

                session()->set([
                    'username' => $dataUser->username,
                    'logged_in' => TRUE,
                    'imgUrl' => $imgData->img_url,
                ]);
                cookie('isLogin', 'true');
                session()->set([
                    'cooldown' => 0,
                    'login_attemps' => 0,
                ]);
                return redirect()->to('userdataapi');
            } else {
                session()->setFlashdata('error', 'Wrong username or password');
                return redirect()->to(base_url('home/login'));
            }
        } else {
            session()->setFlashdata('error', 'Wrong username or password');
            return redirect()->to(base_url('home/login'));
        }
    }


    public function create()
    {
        $userdatamodel = model('App\Models\UsersModel'); //load model
        //return $this->respond($userdatamodel->findAll());
        // $apiKey = $this->request->getVar('apiKey');
        // if ($apiKey != 'tes') {
        //     return $this->fail('Wrong API key');
        // }
        $password = $this->request->getVar('password');
        $passwordConfirm = $this->request->getVar('password-confirm');
        if ($password != $passwordConfirm) {
            echo 'password invalid';
            return;
        }
        $data =
            [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),

            ];

        $data2 = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
        ];

        if ($data && $data2) {
            $a = $this->model->save($data);
            $b = $userdatamodel->save($data2);
            if ($a === false || $b === false) {
                $data['err_msg'] = json_encode($this->model->errors());
                return view('register_error', $data);
            }
            return redirect()->to(base_url('home/login'));
        }

        echo "gagal";
    }
}