<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemeUserVote extends Model
{
    protected $fillable = ['vote','meme_id', 'user_id'];
}
