<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\FriendUser;


class userController extends Controller
{

    public function searchUser(Request $request)
    {
        $username = $request->input('searchUser');
        $users = User::where('name', 'LIKE', '%' . $username . '%')->get();

        return view('pages.friendlist.found_friends', ['users' => $users]);
    }
    public function index()
    {
        $wins = User::orderBy('wins', 'desc')->get();
        return view('pages.leaderboard', ['wins' => $wins]);
    }

    public function loginIndex()
    {
        if (Session::get('loggedIn') === null) {
            return view('pages.login.log_in');
        }
        return redirect('/')->with('error', 'User already logged in');
    }

    public function log_out()
    {
        Session::put('loggedIn', null);
        return redirect('/');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('name', $username)->first();
        if ($user) {
            // If the user exists, verify the password
            if (Hash::check($password, $user->password)) {
                Session::put('loggedIn', $user);
                // Password is correct
                // Log the user in or perform any other actions here
                return redirect('/');
            }
        }
        return redirect('/log-in')->with('error', 'Onjuiste gegevens');
    }
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
        $user->wins = 0;
        // $menu->foto = $request->input( 'afbeelding' );
        $user->save();

        return redirect('/log-in');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->get();
        return  view('pages.profile.view_user', ['user' => $user]);
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
