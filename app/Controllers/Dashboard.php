<?php

namespace App\Controllers;

use Config\App;

class Dashboard extends BaseController
{

    protected $usersModel;
    protected $session;

    public function __construct()
    {
        $this->usersModel =  new \App\Models\Users();
        $this->session = session()->get('session_log');
    }

    public function index()
    {
        $dataSession = $this->session;
        $user = $this->usersModel->getUserByUUID($dataSession['users']);
        $data = [
            "username" => $user['username']
        ];
        return view("dashboard/index", $data);
    }


    public function login()
    {
        return view("dashboard/login");
    }

    public function register()
    {
        $data = [
            "validation" => session()->get("validation")
        ];
        return view("dashboard/register", $data);
    }

    public function produk()
    {
        $dataSession = $this->session;
        $user = $this->usersModel->getUserByUUID($dataSession['users']);
        $data = [
            "username" => $user['username']
        ];
        return view('dashboard/produk', $data);
    }

    public function create($produk)
    {
        $mode = ['produk', 'kategori', 'transaksi'];
        if (isset($produk) && in_array(strtolower($produk), $mode)) {
            $data = [
                "jenis" => $produk,
            ];
            return view('dashboard/create', $data);
        } else {
            return redirect()->to(base_url("/dashboard"));
        }
    }
}
