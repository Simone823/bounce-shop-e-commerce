<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request validate form 
        $request->validate([
            'user_name' => 'required|string|min:3|max:155',
            'user_surname' => 'required|string|min:3|max:155',
            'user_city' => 'required|min:3|max:100|string',
            'user_address' => 'required|string|min:3|max:255'
        ]);

        // data request all
        $data = $request->all();

        // new order
        $new_order = new Order();

        // new order user name
        $new_order->user_name = $data['user_name'];

        // new order user surname
        $new_order->user_surname = $data['user_surname'];

        // new order user city
        $new_order->user_city = $data['user_city'];

        // new order user address
        $new_order->user_address = $data['user_address'];

        // user id
        $new_order->user_id = $data['user_id'];
        
        // total cart shop new order
        $new_order->total_price = $data['total'];

        // new order save
        $new_order->save();

        // attah products pivot
        foreach ($data['cart_shop'] as $product) {
            $new_order->products()->attach(
                $product['id'],
                [
                    'quantity' => $product['quantity'],
                ]
            );
        }

        // return response json
        return response()->json([
            'order' => $new_order,
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
