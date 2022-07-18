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
        $super_admin_users = [
            [
                'name' => 'Simone',
                'surname' => 'Daglio',
                'city' => 'Sale (AL)',
                'address' => 'Via Dante',
                'email' => 'simone.daglio823@outlook.com',
                'password' => 'prova1234',
                'super_admin' => 1
            ]
        ];

        // Foreach array super admin users
        foreach ($super_admin_users as $user) {
            
            // Creo un nuovo utente
            $new_user = new User();

            // Imposto i valori all'utente
            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->city = $user['city'];
            $new_user->address = $user['address'];
            $new_user->email = $user['email'];
            $new_user->password = Hash::make($user['password']);
            $new_user->super_admin = $user['super_admin'];

            // Save user
            $new_user->save();
        }
    }
}
