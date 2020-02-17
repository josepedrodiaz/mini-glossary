<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MiniGlossary extends Model
{
    protected $fillable = ['user_id','name', 'language_id'];

    /**
     * Get the Mini-glossary owner
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the language base for this Mini-glossary
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
    /**
     * Get the terms for this Mini-glossary
     */
    public function terms()
    {
        return $this->hasMany('App\Term');
    }
}
