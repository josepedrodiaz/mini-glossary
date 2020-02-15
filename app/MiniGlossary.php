<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniGlossary extends Model
{
    protected $fillable = ['user_id','name', 'language_id'];
}
