<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Session\Session;

class UserController extends BaseController
{
    public object $userModel;
    public Session $session;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $id = $this->session->get('id');
        $data['user'] = $this->userModel->where('id', $id)->first();
        return view('user/profile', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        if(!empty($this->request->getPost('password')))
        {
            $user = $this->request->getPost();
            $this->userModel->update($id, $user);
        } else {
            $user = [
                'name' => $this->request->getPost('name'),
                'phone'  => $this->request->getPost('phone'),
                'gender'  => $this->request->getPost('gender'),
                'date_of_birth'  => $this->request->getPost('date_of_birth'),
            ];
            $this->userModel->update($id, $user);
        }
        return redirect()->to('user/profile');
    }

    public function uploadProfileImage($id)
    {
        $user = $this->userModel->find($id);

        $validate = $this->validate([
            'profile_image' =>
                "uploaded[profile_image]|ext_in[profile_image,jpeg,png,jpg]|max_size[profile_image,4096]|max_dims[profile_image,920,650]"
        ],[
            'profile_image' => [
                'uploaded' => 'Selecione uma imagem!',
                'ext_in' => 'Tipo de arquivo não suportado!',
                'max_size' => 'Tamanho máximo de imagem suportada: 4MB',
                'max_dims' => 'Resolução máxima suportada: 920x650',
            ],
            
        ]);

        if(!$validate)
        {
            $data = ['user' => $user];
            session()->setFlashdata('errors', $this->validator->getErrors());
            return view('user/profile', $data);
        } else {

            $image = $this->request->getFile('profile_image');
            
            if($image->isValid() && !$image->hasMoved())
            {
                $oldImageName = $user->avatar;
                if(file_exists('uploads/users/images/'.$oldImageName))
                {
                    unlink('uploads/users/images/'.$oldImageName);
                }
            }
            
            $newUploadImageName = $image->getRandomName();
            $dataImage['avatar'] = $newUploadImageName;
            
            $image->move(ROOTPATH.'public/uploads/users/images', $newUploadImageName);
            $this->userModel->update($id, $dataImage);

            return redirect()->to('user/profile')->with('success', 'imagem atualizada com sucesso!');
        }
    }
}
