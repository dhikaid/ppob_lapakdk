<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;

class Users extends BaseController
{

    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new \App\Models\Users();
    }


    public function register()
    {
        if ($this->request->getVar('username')) {
            if ($this->validate([
                'username' => [
                    'rules' => 'trim|required|min_length[5]|max_length[12]|alpha_numeric|is_unique[users.username]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|trim',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'valid_email' => '{field} harus email',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[3]|trim|matches[password2]',
                    'errors' => [
                        'matches' => "The password dont match.",
                    ]
                ],
                'password2' => [
                    'rules' => 'required|min_length[3]|trim|matches[password]',
                    'errors' => [
                        'matches' => "The password dont match.",
                    ]
                ],
                'nohp' => [
                    'rules' => 'required|min_length[3]|trim',
                    'errors' => [
                        'matches' => "{field} harus diisi",
                    ]
                ],
            ])) {
            } else {
                return redirect()->to(base_url('/register'))->withInput()->with('validation', $this->validator->getErrors());
            }

            $username = $this->request->getVar('username');
            $email = $this->request->getVar('email');
            $nohp = $this->request->getVar('nohp');
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

            $this->usersModel->save([
                "uuid" => Uuid::uuid4()->toString(),
                "username" => $username,
                "email" => $email,
                "nohp" => $nohp,
                "password" => $password,
                "gambar" => "default.png",
            ]);

            return redirect()->to(base_url('/login'));
        }
    }

    public function login()
    {
        if ($this->request->getVar('username')) {
            if ($this->validate([
                'username' => [
                    'rules' => 'trim|required|min_length[5]|max_length[12]|alpha_numeric',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[3]|trim',
                    'errors' => [
                        'matches' => "The password dont match.",
                    ]
                ],
            ])) {
            } else {
                return redirect()->to(base_url('/login'))->withInput()->with('validation', $this->validator->getErrors());
            }

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');


            if ($userid = $this->usersModel->checkUsername($username)) {
                if (password_verify($password, $userid['password'])) {
                    $session_login = [
                        "status" => 200,
                        "isLoggedIn" => true,
                        "users" => $userid['uuid']
                    ];
                    session()->set("session_log", $session_login);
                    return redirect()->to(base_url('/dashboard'));
                }
            }

            return redirect()->to(base_url('/login'));
        }
    }
}
