<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class ClientController extends BaseController
{
    public object $clientModel;
    public function __construct()
    {
        $this->clientModel = new ClientModel();
    }

    public function index()
    {
        $data = ['title' => 'Listagem de clientes'];
        return view('clients/index', $data);
    }

    public function getAllClients()
    {
        if(!$this->request->isAJAX())
        {
            return redirect()->back();
        }

        $attrs = [
            'id',
            'company',
            'company_name',
            'cnpj_cpf',
            'email',
            'active',
        ];

        $clients = $this->clientModel->select($attrs)->findAll();
        $data = [];

        foreach($clients as $client)
        {
            $data[] = [
                'company' => $client->company,
                'company_name' => $client->company_name,
                'cnpj_cpf' => $client->cnpj_cpf,
                'email' => $client->email,
                'active' => ($client->active ?
                '<span class="badge badge-success">ATIVO</span>' :
                '<span class="badge badge-dark">INATIVO</span>'),
            ];
        }

        $response = [
            'data' => $data,
        ];

        return $this->response->setJSON($response);
    }
}
