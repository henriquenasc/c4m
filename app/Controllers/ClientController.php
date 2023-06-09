<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use CodeIgniter\Router\Exceptions\RedirectException;

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
        if (!$this->request->isAJAX()) {
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

        foreach ($clients as $client) {
            $data[] = [
                'company' => $client->company,
                'company_name' => $client->company_name,
                'cnpj_cpf' => $client->cnpj_cpf,
                'email' => $client->email,
                'active' => ($client->active ?
                    '<span class="badge badge-success">ATIVO</span>' :
                    '<span class="badge badge-dark">INATIVO</span>'),
                'actions' => "<div class='dropdown'>
                                <button class='btn btn-info
                                    btn-sm dropdown-toggle'
                                    type='button'
                                    id='dropdownMenuButton'
                                    data-toggle='dropdown'
                                    aria-haspopup='true'
                                    aria-expanded='false'>
                                Ações
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' href='clients/profile/$client->id'>Ver perfil</a>
                                    <a class='dropdown-item' href='clients/edit/$client->id'>Editar</a>
                                    <a class='dropdown-item' href='clients/changeStatus/$client->id'>Inativar</a>
                                </div>
                              </div>",
            ];
        }

        $response = [
            'data' => $data,
        ];

        return $this->response->setJSON($response);
    }

    public function getClient($id)
    {
        $client = $this->clientModel->find($id);
        $data = [
            'title' => 'Perfil usuário',
            'client' => $client,
        ];
        return view('clients/profile', $data);
    }
}
