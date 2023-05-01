<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class SignInController extends BaseController
{
    public Session $session;
    public Model $userModel;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        return view('auth/login');
    }

    public function signAuth()
    {
        $email = $this->request->getVar('email');
        $passwd = $this->request->getVar('passwd');

        $user = $this->userModel->where('email', $email)->first();
        if($user)
        {
            $password = $user->password;
            $userAuthPassword = password_verify($passwd, $password);
            
            if($userAuthPassword)
            {
                $session_data = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'isLoggedIn' => true,
                ];
                $this->session->set($session_data);
                return redirect()->to('dashboard');
            } else {
                $this->session->setFlashdata('msg', 'E-mail ou senha incorreto!');
                return redirect()->to('/login');
            }
        } else {
            $this->session->setFlashdata('msg', 'E-mail não cadastrado no sistema!');
            return redirect()->to('/login');
        }
    }

    public function logOut()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
