<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';

    use HasFactory;

    public function word()
    {
        return $this->belongsTo(Word::class, 'game_word_id');
    }
    public function user()
    {
        return $this->belongsTo(Word::class, 'game_user_id');

    }
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->game_date = now();
        });
    }
}
