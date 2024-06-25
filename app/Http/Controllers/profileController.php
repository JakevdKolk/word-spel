<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;


class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $userId = $request->query('id');
        $user = User::find($userId);
        $gameResults = Game::where('game_user_id', $user->id)->get();

        if ($user) {
            return view('pages.profile.view_user', ['user' => $user, 'games' => $gameResults]);
        }
        return redirect()->back()->with('error', 'User not found');
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
        // Validate the incoming request to ensure an image file is provided
        $request->validate([
            'submitNewAvatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Retrieve the currently logged-in user's ID from the session
        $id = session("loggedIn")->id;

        // Find the user by their ID
        $user = User::find($id);

        // Check if the request has a file for the new avatar
        if ($request->hasFile('submitNewAvatar')) {
            // Retrieve the uploaded file
            $file = $request->file('submitNewAvatar');

            // Get the content of the file
            $fileContent = file_get_contents($file->getRealPath());


            // Update the user's avatar with the new file content
            $user->avatar = $fileContent;
            $user->save();


            // Redirect to the edit profile page
            return redirect("/edit-profile");
        }

        return redirect("/edit-profile")->withErrors(['submitNewAvatar' => 'No file uploaded']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $userId = $request->session()->get('loggedIn')->id;
        $user = User::find($userId);

        if ($user && $user->avatar) {
            return response($user->avatar)->header('Content-Type', 'image/jpeg');
        } else {
            // If user or avatar not found, return a default avatar
            return response('')->header('Content-Type', 'image/jpeg');
        }
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

    public function view(Request $request)
    {
        $userId = $request->session()->get('loggedIn')->id;

        // Fetch game results for the given user ID
        $gameResults = Game::where('game_user_id', $userId)->get();
        // Extract games from game results


        return view('pages.profile.edit_profile', ['games' => $gameResults]);
    }
}
