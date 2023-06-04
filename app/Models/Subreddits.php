<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subreddits extends Model
{
    use HasFactory;

    //table name
    protected $table = 'subreddits';

    protected $guarded = [];

    // Relationships
    public function redditAuth()
    {
        return $this->belongsToMany(RedditAuth::class);
    }
}
