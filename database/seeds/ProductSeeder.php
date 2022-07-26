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
                'name' => 'T-Shirt nera con logo',
                'description' => 'maglietta con logo, tessuto cotone',
                'price' => 22.99,
                'image' => 'uploads/t-shirt_black_1.png',
                'visibility' => 1,
                'category' => $category_magliette['id']
            ],

            [
                'name' => 'T-Shirt bianca',
                'description' => 'maglietta bianca con testo sul retro',
                'price' => 15.99,
                'image' => 'uploads/t-shirt_white_1.png',
                'visibility' => 1,
                'category' => $category_magliette['id']
            ],

            [
                'name' => 'Felpa  rosa con cappuccio',
                'description' => 'felpa con cappuccio e logo nero sul retro',
                'price' => 25.00,
                'image' => 'uploads/felpa_rosa_1.png',
                'visibility' => 1,
                'category' => $category_felpe['id']
            ],

            [
                'name' => 'Felpe nere',
                'description' => 'felpe nere con scritta riflettente nera',
                'price' => 30.99,
                'image' => 'uploads/felpe_black.png',
                'visibility' => 1,
                'category' => $category_felpe['id']
            ],

            [
                'name' => 'Cappello grigio con logo',
                'description' => 'cappello grigrio con aletta',
                'price' => 10.00,
                'image' => 'uploads/cappello_gray_1.png',
                'visibility' => 1,
                'category' => $category_cappelli['id']
            ],

            [
                'name' => 'Cuffia di lana nera',
                'description' => 'cuffia di lana con logo',
                'price' => 11.99,
                'image' => 'uploads/cappello_dark_1.png',
                'visibility' => 1,
                'category' => $category_cappelli['id']
            ],

            [
                'name' => 'Patch per pantaloni',
                'description' => 'patch',
                'price' => 3.99,
                'image' => 'uploads/toppe_1.png',
                'visibility' => 1,
                'category' => $category_toppe['id']
            ],

            [
                'name' => 'Patch Las Vegas',
                'description' => 'patch las vegas',
                'price' => 5.99,
                'image' => 'uploads/toppe_2.png',
                'visibility' => 1,
                'category' => $category_toppe['id']
            ],

            [
                'name' => 'Patch nere',
                'description' => 'patch con scritte nere',
                'price' => 3.99,
                'image' => 'uploads/toppe_1.png',
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
