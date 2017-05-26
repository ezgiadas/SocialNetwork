<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['message', 'user_id','is_flagged', 'meme_id'];
}
