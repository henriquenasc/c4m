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
        $data = [
            'title' => 'Listagem de clientes',
            'clients' => $this->clientModel->all(),
        ];
        return view('clients/index', $data);
    }
}
