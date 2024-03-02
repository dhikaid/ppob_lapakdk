<?php

namespace App\Controllers;

class BaseAPI extends BaseController
{
    protected $getAPI;
    protected $signKey;

    public function __construct()
    {

        $this->getAPI =  \Config\Services::curlrequest([
            'baseURI' => 'https://prepaid.iak.dev/',
            "verify" => false
        ]);
        $this->signKey = env("userKEY") . env("apiKEY");
    }
}
