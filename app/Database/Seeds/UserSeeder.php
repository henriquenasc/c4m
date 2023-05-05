<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $user = [
            'name'      => 'ADM',
            'email'     => 'admin@c4m.com',
            'password'  => password_hash('12345678', PASSWORD_BCRYPT),
            'avatar' => 'default-avatar.png'
        ];

        $userModel->insert($user);
        echo "Admin user successfully created!";
    }
}
