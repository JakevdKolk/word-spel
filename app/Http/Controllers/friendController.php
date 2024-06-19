<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendUser;
use App\Models\User;

class friendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session('loggedIn')) {
            return redirect()->back()->with('failed not logged in');
        }

        $friends = FriendUser::where('user_id', session("loggedIn")->id)->orWhere('friend_user_id', session("loggedIn")->id)->orderBy('user_id', 'desc')->get();
        return view('pages.friendlist.friendlist', ['friends' => $friends]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $FriendUser = new FriendUser();
        $FriendUser->user_id = session("loggedIn")->id;
        $FriendUser->friend_user_id = $request->input('add_friend');

        $FriendUser->save();

        return redirect()->back()->with('success', 'Successfully added a friend');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
      
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
