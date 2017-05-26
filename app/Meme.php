<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    //
    protected $fillable = ['is_flagged', 'upvotes','downvotes', 'image_url', 'title', 'user_id', 'group_id'];
}
