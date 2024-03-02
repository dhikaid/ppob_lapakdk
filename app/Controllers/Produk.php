<?php

namespace App\Controllers;

class Produk extends BaseAPI
{

    public function index($slug): string
    {
        // $a = new BaseAPI();
        // $data = $a->getAPI->post("api/check-balance", [
        //     "json" => [
        //         "username" => env("userKEY"),
        //         "sign" => md5($a->signKey . "bl")
        //     ],
        // ]);

        // $a = json_decode($data->getBody(), true);
        $data = [
            "slug" => $slug
        ];
        return view('produk/index', $data);
    }

    public function pulsadata()
    {
        helper("rupiah");
        $adata = null;
        if ($prepaidnum = session()->getFlashdata("prepaidnum")) {
            $a = new BaseAPI();
            $atelp = $a->getAPI->post("api/check-operator", [
                "json" => [
                    "username" => env("userKEY"),
                    "sign" => md5($a->signKey . "op"),
                    "customer_id" => $prepaidnum
                ],
            ]);
            $operator = json_decode($atelp->getBody(), true)["data"]["operator"];
            $btelp = $a->getAPI->post("api/pricelist?operator=$operator", [
                "json" => [
                    "username" => env("userKEY"),
                    "sign" => md5($a->signKey . "pl"),
                    "status" => "active"
                ],
            ]);


            $pricelist = json_decode($btelp->getBody(), true);


            $adata = [
                "prepaidnum" => $prepaidnum,
                "operator" => $operator,
                "list" => $pricelist['data']['pricelist']
            ];
        }

        $data = [
            "datas" => $adata
        ];
        session()->setFlashdata('pagesnow', 'produk/pulsadata');
        return view('produk/pulsadata', $data);
    }

    public function postdataprepaid()
    {
        $pagesnow = session()->getFlashdata('pagesnow');

        if (!$this->validate([
            'prepaidnum' => 'required|min_length[5]',

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . $pagesnow)->withInput()->with('prepaidnum', $this->validator->getErrors());
        }

        session()->setFlashdata("prepaidnum", $this->request->getVar('prepaidnum'));
        return redirect()->to(base_url() . $pagesnow);
    }


    public function plntoken()
    {
        helper("rupiah");
        $adata = null;
        if ($prepaidnum = session()->getFlashdata("prepaidnum")) {
            $a = new BaseAPI();
            $apln = $a->getAPI->post("api/pricelist?operator=pln", [
                "json" => [
                    "username" => env("userKEY"),
                    "sign" => md5($a->signKey . "pl"),
                    "status" => "active"
                ],
            ]);
            $pricelist = json_decode($apln->getBody(), true);

            $bpln = $a->getAPI->post("api/inquiry-pln", [
                "json" => [
                    "username" => env("userKEY"),
                    "sign" => md5($a->signKey . $prepaidnum),
                    "customer_id" => $prepaidnum
                ],
            ]);
            $customerid = json_decode($bpln->getBody(), true);


            $adata = [
                "namapln" => $prepaidnum,
                "customer" => $customerid,
                "list" => $pricelist['data']['pricelist']
            ];
        }

        $data = [
            "datas" => $adata
        ];
        session()->setFlashdata('pagesnow', 'produk/plntoken');
        return view('produk/plntoken', $data);
    }
}
