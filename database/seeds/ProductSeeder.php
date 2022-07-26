<?php

use App\Category;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categoria magliette
        $category_magliette = Category::where('category_name', '=', 'Magliette')->first();

        // Categoria felpe
        $category_felpe = Category::where('category_name', '=', 'Felpe')->first();

        // Categoria cappelli
        $category_cappelli = Category::where('category_name', '=', 'Cappelli')->first();

        // Categoria toppe
        $category_toppe = Category::where('category_name', '=', 'Toppe')->first(); 

        // array products
        $products = [
            [
                'name' => 'Prodotto 1',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_magliette['id']
            ],

            [
                'name' => 'Prodotto 2',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_magliette['id']
            ],

            [
                'name' => 'Prodotto 3',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_felpe['id']
            ],

            [
                'name' => 'Prodotto 4',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_felpe['id']
            ],

            [
                'name' => 'Prodotto 5',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_cappelli['id']
            ],

            [
                'name' => 'Prodotto 6',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_cappelli['id']
            ],

            [
                'name' => 'Prodotto 7',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_toppe['id']
            ],

            [
                'name' => 'Prodotto 8',
                'description' => 'hvbehvbhveb',
                'price' => 3.99,
                'image' => 'uploads/no_image_icon.svg',
                'visibility' => 1,
                'category' => $category_toppe['id']
            ],
        ];

        // superAdministrator user
        $admin = User::where('email', '=', 'superadministrator@app.com')->first();

        // foreach products
        foreach ($products as $key => $product) {

            // Creo nuovo prodotto
            $new_product = new Product();

            // Slug product name
            $slug = Str::slug($product['name']);

            // Slug base
            $slug_base = $slug;

            // product slug
            $new_product->slug = $slug_base;

            // propripetà
            $new_product->product_name = $product['name'];
            $new_product->description = $product['description'];
            $new_product->price = $product['price'];
            $new_product->visibility = $product['visibility'];
            $new_product->image = $product['image'];
            $new_product->user_id = $admin->id;

            // salvo il nuovo prodotto
            $new_product->save();

            // new product categories attach 
            $new_product->categories()->attach($product['category']);
        }
    }
}
