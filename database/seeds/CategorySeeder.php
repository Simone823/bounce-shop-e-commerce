<?php

use App\Category;
use Illuminate\Database\Seeder;

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

            // save
            $new_category->save();
        }
    }
}
