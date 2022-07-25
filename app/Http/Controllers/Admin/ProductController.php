<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // User auth
        $user_auth = Auth::user();

        // Products
        $products = Product::orderBy('created_at', 'desc')->paginate(6);

        // return view admin products index
        return view('admin.products.index', compact('user_auth', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        // user auth
        $user_auth = Auth::user();

        //return view admin products create
        return view('admin.products.create', compact('user_auth', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data reuqest all
        $data = $request->all();

        // request validate
        $request->validate([
            'product_name' => 'required|unique:products,product_name|string|min:4|max:250',
            'description' => 'required',
            'price' => 'required|numeric',
            'visibility' => 'required|boolean',
            'image' => 'nullable|file|image|mimetypes:image/jpeg,image/png,image/svg|max:2048', 
        ],
        [
            'product_name.required' => 'Il campo Nome Prodotto è obbligatorio.',
            'product_name.unique' => 'Il Nome del prodotto è già esistente.',
            'product_name.string' => 'Il campo Nome prodotto deve essere una stringa',
            'product_name.min' => 'Il nome del prodotto deve essere composto da almeno 4 caratteri.',
            'product_name.max' => 'Il nome del prodotto può contenere al massimo 250 caratteri.',
            'description.required' => 'Il campo Descrizione è obbligatorio',
            'price.required' => 'Il campo Prezzo è obbligatorio',
            'price.numeric' => 'Il campo Prezzo deve essere un numero',
            'visibility.required' => 'Il campo Visibile è obbligatorio',
            'visibility.boolean' => 'Il campo visibile deve essere un valore vero o falso',
        ]);

        $user_auth = Auth::user();

        // Creo nuovo prodotto
        $new_product = new Product();

        // Slug product name
        $slug = Str::slug($data['product_name']);

        // Slug base
        $slug_base = $slug;

        // product slug
        $new_product->slug = $slug_base;

        // fill data
        $new_product->fill($data);

        // user_id
        $new_product->user_id = $user_auth->id;

        // new product save
        $new_product->save();

        // return redirect route admin products index
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // User auth
        $user_auth = Auth::user();

        // return view admin products show
        return view('admin.products.show', compact('user_auth', 'product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // user auth
        $user_auth = Auth::user();

        // return view admin porducts edit
        return view('admin.products.edit', compact('user_auth', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // data request
        $data = $request->all();

        // Validazione request
        $request->validate([
            'product_name' => 'required|string|min:4|max:250',
            'description' => 'required',
            'price' => 'required|numeric',
            'visibility' => 'required|boolean',
            'image' => 'nullable|file|image|mimetypes:image/jpeg,image/png,image/svg|max:2048', 
        ],
        [
            'product_name.required' => 'Il campo Nome Prodotto è obbligatorio.',
            'product_name.string' => 'Il campo Nome prodotto deve essere una stringa',
            'product_name.min' => 'Il nome del prodotto deve essere composto da almeno 4 caratteri.',
            'product_name.max' => 'Il nome del prodotto può contenere al massimo 250 caratteri.',
            'description.required' => 'Il campo Descrizione è obbligatorio',
            'price.required' => 'Il campo Prezzo è obbligatorio',
            'price.numeric' => 'Il campo Prezzo deve essere un numero',
            'visibility.required' => 'Il campo Visibile è obbligatorio',
            'visibility.boolean' => 'Il campo visibile deve essere un valore vero o falso',
        ]);

        // Slug product name
        $slug = Str::slug($data['product_name']);

        // Slug base
        $slug_base = $slug;

        // Counter slug
        $counter = 1;

        // Product present
        $product_present = Product::where('slug', $slug)->first();

        // While post present
        while ($product_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $product_present = Product::where('slug', $slug)->first();
        }

        // product slug
        $product->slug = $slug;

        // Auth id superadministrator account
        $product->user_id = Auth::id();

        // product update
        $product->update($data);

        // return redirect route admin products index
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //delete product
        $product->delete();

        // return redirect admin products index
        return redirect()->route('admin.products.index');
    }
}
