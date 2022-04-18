<?php

namespace App\Controllers;

use App\Models\UserAccountModel;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function Collections()
    {
        return view('all-collections');
    }

    public function Pictures()
    {
        return view('pictures');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->back();
    }

    public function signIn()
    {
        $model = new UserAccountModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ];
        $dataUser = $model->where(['username' => $username])->first();

        if ($dataUser) {

            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'user_id' => $dataUser->user_id,
                    'username' => $dataUser->username,
                    'logged_in' => TRUE
                ]);

                echo 'berhasil login';
            } else {
                session()->setFlashdata('error', 'Wrong username or password');
                echo ($username . "---" . $password);

                echo $dataUser->username;
                echo $dataUser->password;

                echo ("is success?" . password_verify($password, $dataUser->password));
            }
        } else {
            session()->setFlashdata('error', 'Wrong username or password');
            echo 'fail 2';
        }
    }
}