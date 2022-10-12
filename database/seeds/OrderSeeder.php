<?php

use App\Order;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // created at date
        $created_at = [
            '2022-01-12 11:03:53',
            '2022-02-12 11:03:53',
            '2022-03-12 11:03:53',
            '2022-04-12 11:03:53',
            '2022-05-12 11:03:53',
            '2022-06-12 11:03:53',
            '2022-07-12 11:03:53',
            '2022-08-12 11:03:53',
            '2022-09-12 11:03:53',
            '2022-10-12 11:03:53',
            '2022-11-12 11:03:53',
            '2022-12-12 11:03:53',
        ];

        // for count 20 create order
        for ($i = 0; $i < 20; $i++) {
            // users random 
            $users = User::all()->random(5);

            //products
            $products = Product::all()->random(5);

            // quantity
            $num_random = rand(1, 10);

            // create new order
            $new_order = new Order();

            // foreach users
            foreach ($users as $key => $user) {
                $new_order->user_name = $user['name'];
                $new_order->user_surname = $user['surname'];
                $new_order->user_address = $user['address'];
                $new_order->user_city = $user['city'];
                $new_order->user_id = $user['id'];
            }

            // foreach products for price
            foreach ($products as $key => $product) {
                // total price
                $new_order->total_price += $product->price * $num_random;
            }

            // status payment
            $new_order->status = 1;
            
            // created at
            $new_order->created_at = $created_at[$num_random];

            // new order save
            $new_order->save();

            // attah products pivot
            foreach ($products as $product) {
                $new_order->products()->attach(
                    $product['id'],
                    [
                        'quantity' => $num_random,
                    ]
                );
            }
        }
    }
}
