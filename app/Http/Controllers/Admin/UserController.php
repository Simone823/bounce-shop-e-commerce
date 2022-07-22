<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Auth user
        $user_auth = Auth::user();

        // All users
        $users = User::orderBy('created_at', 'desc')->get();

        // return view admin users index
        return view('admin.users.index', compact('user_auth', 'users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        // User auth
        $user_auth = Auth::user();

        // return view admin users show
        return view('admin.users.show', compact('user_auth', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // User Auth
        $user_auth = Auth::user();

        // Roles
        $roles = Role::all();

        // return view admin users edit
        return view('admin.users.edit', compact('user_auth', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Request data
        $data = $request->all();

        // request validate
        $request->validate([
            'roles' => 'required|exists:roles,id'
        ]);

        // Controllo se esiste il ruolo lo aggiorno
        if (array_key_exists('roles', $data)) {
            // Sync roles
            $user->roles()->sync($data['roles']);
        }

        // Aggiorno i dati
        $user->update();

        // redirect route admin users show
        return redirect()->route('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // User delete
        $user->delete();

        // redirect route admin users index
        return redirect()->route('admin.users.index');
    }
}
