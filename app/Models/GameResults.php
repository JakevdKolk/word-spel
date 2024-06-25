<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameResults extends Model
{
    protected $table = 'game_results';

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_results_game_id');
    }
    use HasFactory;
}
