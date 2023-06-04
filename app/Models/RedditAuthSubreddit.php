<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//reddit_auth_subreddits

class RedditAuthSubreddit extends Model
{
    use HasFactory;

    protected $guarded = [];

    //table name
    protected $table = 'reddit_auth_subreddits';
}
