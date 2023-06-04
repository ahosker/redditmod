<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedditAuth extends Model
{
    use HasFactory;

    //Guarded
    protected $guarded = [];

    //Relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function refreshToken()
    {
        return $this->hasOne(RedditAuthRefreshToken::class);
    }

    //Subreddits pivot table
    public function subreddits()
    {
        return $this->belongsToMany(Subreddits::class);
    }
}
