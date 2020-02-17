<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['mini_glossary_id','value'];

    /**
     * Get the Term languages
     */
    public function translations()
    {
        return $this->belongsToMany('App\Language', 'translations')->withPivot('translator', 'translation','approved');
    }
    /**
     * Get the Term languages
     */
    public function miniGlossary()
    {
        return $this->belongsTo('App\MiniGlossary');
    }
}
