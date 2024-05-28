<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('name', $username)->first();

        if ($user) {
            // If the user exists, verify the password
            if (Hash::check($password, $user->password)) {
                // Password is correct
                // Log the user in or perform any other actions here
                return redirect('/');
            }
        }
        return redirect('/log-in')->with('error', 'Onjuiste gegevens');    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new user;
        $user->name =  $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        // $menu->foto = $request->input( 'afbeelding' );
        $user->save();

        return redirect('/log-in');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
