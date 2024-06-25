<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Word;
use App\Models\Game;
use Hamcrest\Type\IsInteger;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;
use App\Models\GameResults;

class gameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $word =  Word::inRandomOrder()->first();
        $user = User::find(Session('loggedIn')->id);
        if (!$user || !$word) {
            return redirect('/');
        }

        if (Session::has('word_id')) {
            $word = Word::find(Session::get('word_id'));
        } else {
            $word = Word::inRandomOrder()->first();

            Session::put('word_id', $word->id);
        }

        $existingGame = Game::where('game_word_id', $word->id)
            ->where('game_user_id', $user->id)
            ->whereDate('game_date', date('Y-m-d'))
            ->first();

        if ($existingGame) {
            return view('pages.game.game', ['game' => $existingGame, 'right_guess' => '', 'word' => $word, 'turns' => 5]);
        }

        $game = new Game;

        $game->game_word_id = $word->id;
        $game->game_user_id = $user->id;
        $game->save();
        return view('pages.game.game', ['game' => $game, 'right_guess' => '', 'word' => $word, 'turns' => 5]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $game_results = new GameResults();
        $game = $request->input('game_id');
        $winner = $request->input('winner');
        
        $game_results->game_results_game_id = intval($game);
        $game_results->winner = $winner;
        $game_results->save();

        return redirect("/");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $turns = $request->input('turns');
        $turns = $turns - 1;
        if (is_int($turns) <= 0) {
            return redirect('/');
        }
        $guess = $request->input('guess');
        $game = $request->input('game_id');

        $gameFromDB = Game::find($game);
        $explodedGuess = str_split($guess);

        $explodedWord = str_split($gameFromDB->word->word);
        $right_guesses = array();
        for ($i = 0; $i < count($explodedWord); $i++) {
            // Loop through each element in $explodedGuess
            for ($j = 0; $j < count($explodedGuess); $j++) {
                // Check if the characters at current positions match
                if ($explodedWord[$i] == $explodedGuess[$j]) {
                    // Add the matched character from $explodedGuess to $right_guesses
                    // Use $j instead of $i to access $explodedGuess element
                    array_push($right_guesses, $explodedGuess[$j]);
                    // Break the inner loop once a match is found to avoid duplicates
                    break;
                }
            }
        }


        return view('pages.game.game', ['game' => $gameFromDB, 'right_guess' => implode($right_guesses), 'word' => $gameFromDB->word->word, 'turns' => $turns, 'guess' => $guess]);
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
