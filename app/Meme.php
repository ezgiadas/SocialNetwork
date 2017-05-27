<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    //
    protected $fillable = ['votes', 'title'];
}
