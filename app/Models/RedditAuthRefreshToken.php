<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedditAuthRefreshToken extends Model
{
    use HasFactory;

    //Guarded
    protected $guarded = [];
}
