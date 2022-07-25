<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array products
        $products = [
            [
                'name' => 'Prodotto 1',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 2',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 3',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 4',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 5',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 6',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 7',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],

            [
                'name' => 'Prodotto 8',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => '',
                'visibility' => 1
            ],
        ];

        // superAdministrator user
        $admin = User::where('email', '=', 'superadministrator@app.com')->first();

        // foreach products
        foreach ($products as $key => $product) {

            // Creo nuovo prodotto
            $new_product = new Product();

            // propripetà
            $new_product->product_name = $product['name'];
            $new_product->slug = $product['name'];
            $new_product->description = $product['description'];
            $new_product->price = $product['price'];
            $new_product->visibility = $product['visibility'];
            $new_product->user_id = $admin->id;

            // salvo il nuovo prodotto
            $new_product->save();
        }
    }
}
