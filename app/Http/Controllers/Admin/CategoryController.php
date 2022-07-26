<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // user auth
        $user_auth = Auth::user();

        // Categories
        $categories = Category::orderBy('category_name', 'asc')->paginate(6);

        // return view admin categories index
        return view('admin.categories.index', compact('user_auth', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        // user auth
        $user_auth = Auth::user();

        // return view admin categories create
        return view('admin.categories.create', compact('user_auth', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data request all
        $data =  $request->all();

        // request validate
        $request->validate(
            [
                'category_name' => 'required|string|unique:categories,category_name|min:3|max:250',
            ],
            [
                'category_name.required' => 'Il campo Nome categoria è obbligatorio.',
                'category_name.string' => 'Il campo Nome categoria deve essere una stringa',
                'category_name.unique' => 'Il Nome della categoria è già esistente.',
                'category_name.min' => 'Il nome della categoria deve essere composto da almeno 4 caratteri.',
                'category_name.max' => 'Il nome della categoria può contenere al massimo 250 caratteri.',
            ]
        );

        // creo una nuova categoria
        $new_category = new Category();

        // $new category fill data
        $new_category->fill($data);

        // Slug category name
        $slug = Str::slug($data['category_name']);

        // Slug base
        $slug_base = $slug;

        // category slug
        $new_category->slug = $slug_base;

        // new category save
        $new_category->save();

        // return redirect route admin categories index
        return redirect()->route('admin.categories.index');
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
    public function edit(Category $category)
    {
        //user auth
        $user_auth = Auth::user();

        // return view admin categories edit
        return view('admin.categories.edit', compact('user_auth', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // data request all
        $data = $request->all();

        // reuest validate
        $request->validate([
            'category_name' => 'required|string|min:3|max:250',
        ],
        [
            'category_name.required' => 'Il campo Nome categoria è obbligatorio.',
            'category_name.string' => 'Il campo Nome categoria deve essere una stringa',
            'category_name.min' => 'Il nome della categoria deve essere composto da almeno 4 caratteri.',
            'category_name.max' => 'Il nome della categoria può contenere al massimo 250 caratteri.',
        ]);

        // Slug category name
        $slug = Str::slug($data['category_name']);

        // Slug base
        $slug_base = $slug;

        // Counter slug
        $counter = 1;

        // Product present
        $product_present = Category::where('slug', $slug)->first();

        // While post present
        while ($product_present) {
            $slug = $slug_base . '-' . $counter;
            $counter++;
            $product_present = Category::where('slug', $slug)->first();
        }

        // category slug
        $category->slug = $slug;

        // category update data
        $category->update($data);

        // retur redirect route admin categories index
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //category delete
        $category->delete();

        // return redirect route admin categories index
        return redirect()->route('admin.categories.index');
    }
}
