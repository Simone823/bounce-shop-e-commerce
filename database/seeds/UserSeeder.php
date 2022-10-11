<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array user super admin
        $users = [
            [
                'name' => 'Matteo',
                'surname' => 'Pane',
                'city' => 'Milano (MI)',
                'address' => 'Via Dante',
                'email' => 'matteo.pa@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-01-11 15:46:44'
            ],

            [
                'name' => 'Giacomo',
                'surname' => 'Testa',
                'city' => 'Seveso (MI)',
                'address' => 'Via Cava',
                'email' => 'giacomo.te@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-01-11 15:46:44'
            ],

            [
                'name' => 'Alessio',
                'surname' => 'Misa',
                'city' => 'Salerno (SA)',
                'address' => 'Via Struzzo',
                'email' => 'alessio.misa@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-02-11 15:46:44'
            ],

            [
                'name' => 'Matteo',
                'surname' => 'Conti',
                'city' => 'Milano (MI)',
                'address' => 'Via Garba',
                'email' => 'matteo.co@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-03-11 15:46:44'
            ],

            [
                'name' => 'Simone',
                'surname' => 'Allegri',
                'city' => 'Torino (TO)',
                'address' => 'Via Dante',
                'email' => 'simone.a@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-03-11 15:46:44'
            ],

            [
                'name' => 'Ilenia',
                'surname' => 'Zicca',
                'city' => 'Rimini',
                'address' => 'Via Dante',
                'email' => 'ilenia.zi@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-03-11 15:46:44'
            ],

            [
                'name' => 'Silvia',
                'surname' => 'Stusi',
                'city' => 'Torino (TO)',
                'address' => 'Via Vernia',
                'email' => 'silvia.stusi@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-04-11 15:46:44'
            ],

            [
                'name' => 'Andrea',
                'surname' => 'Faggio',
                'city' => 'Monza (MB)',
                'address' => 'Via Dante',
                'email' => 'andrea.faggio@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-05-11 15:46:44'
            ],

            [
                'name' => 'Alberto',
                'surname' => 'Pane',
                'city' => 'Milano (MI)',
                'address' => 'Via Dante',
                'email' => 'alberto.pa@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-05-11 15:46:44'
            ],

            [
                'name' => 'Stefano',
                'surname' => 'Naso',
                'city' => 'Milano (MI)',
                'address' => 'Via Dante',
                'email' => 'stefano.nas@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-06-11 15:46:44'
            ],

            [
                'name' => 'Giada',
                'surname' => 'Rea',
                'city' => 'Sassari (SS)',
                'address' => 'Via Merlo',
                'email' => 'giada.rea@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-07-11 15:46:44'
            ],

            [
                'name' => 'Michele',
                'surname' => 'Fattori',
                'city' => 'Palermo (PA)',
                'address' => 'Via Sussu',
                'email' => 'michele.fattori@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-07-11 15:46:44'
            ],

            [
                'name' => 'Gigi',
                'surname' => 'Pierlo',
                'city' => 'Torino (TO)',
                'address' => 'Via Madda',
                'email' => 'gigi.pierlo@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-08-11 15:46:44'
            ],

            [
                'name' => 'Beatrice',
                'surname' => 'Campa',
                'city' => 'Pisa (PI)',
                'address' => 'Via Bruni',
                'email' => 'beatrice.campa@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-09-11 15:46:44'
            ],

            [
                'name' => 'Livio',
                'surname' => 'Dazio',
                'city' => 'Pisa (PI)',
                'address' => 'Via Fresca',
                'email' => 'livio.dazio@test.com',
                'password' => 'prova1234',
                'role' => 'user',
                'created_at' => '2022-12-11 15:46:44'
            ]
        ];

        // Foreach array super admin users
        foreach ($users as $user) {
            
            // Creo un nuovo utente
            $new_user = new User();

            // Imposto i valori all'utente
            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->city = $user['city'];
            $new_user->address = $user['address'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->image = 'uploads/user_logo.svg';
            $new_user->created_at = $user['created_at'];

            // Save user
            $new_user->save();

            if($user['role'] == 'superadministrator') {
                
                // Attach role superadministrator
                $new_user->attachRole('superadministrator');
                
            } else if($user['role'] == 'user') {

                // Attach role user
                $new_user->attachRole('user');
            }
        }
    }
}
