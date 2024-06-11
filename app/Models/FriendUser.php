<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendUser extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'friend_users';

    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = [
        'friend_user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function friendUser()
    {
        return $this->belongsTo(User::class, 'friend_user_id');
    }
}
