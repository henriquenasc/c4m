<?php

namespace App\Database\Seeds;

use App\Models\ClientModel;
use CodeIgniter\Database\Seeder;

class ClientsFakerSeeder extends Seeder
{
    public function run()
    {
        $clientModel = new ClientModel();
        $faker = \Faker\Factory::create('pt_BR');

        $clientsCreate = 1000;
        $clientsPush = [];

        for($c = 0; $c < $clientsCreate; $c++)
        {
            array_push($clientsPush, [
                'company' => $faker->name(),
                'company_name' => $faker->company(),
                'cnpj_cpf' => $faker->cnpj(false),
                'phone' => $faker->phone(false),
                'cel_phone' => $faker->cellphone(false),
                'email' => $faker->unique()->email,
                'active' => $faker->numberBetween(0, 1),
            ]);
        }

        $clientModel->skipValidation(true)
                  ->protect(false)
                  ->insertBatch($clientsPush);
        echo "$clientsCreate users successfully created!";
    }
}
