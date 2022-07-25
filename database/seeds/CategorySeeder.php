<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array categories
        $categories = [
            [
                'category_name' => 'Magliette',
            ],

            [
                'category_name' => 'Felpe',
            ],

            [
                'category_name' => 'Cappelli',
            ],

            [
                'category_name' => 'Toppe',
            ],
        ];

        // foreach array categories
        foreach ($categories as $key => $category) {
            
            // creo una nuova categoria
            $new_category = new Category();

            // assegno i valori
            $new_category->category_name = $category['category_name'];

            // Slug product name
            $slug = Str::slug($category['category_name']);

            // Slug base
            $slug_base = $slug;

            // product slug
            $new_category->slug = $slug_base;

            // save
            $new_category->save();
        }
    }
}
