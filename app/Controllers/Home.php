<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // $a = new BaseAPI();
        // $data = $a->getAPI->post("api/check-balance", [
        //     "json" => [
        //         "username" => env("userKEY"),
        //         "sign" => md5($a->signKey . "bl")
        //     ],
        // ]);

        // $a = json_decode($data->getBody(), true);
        // session()->destroy('prepaidnum');
        // session()->destroy('pagesnow');
        // session()->
        return view('home/index');
    }
}
