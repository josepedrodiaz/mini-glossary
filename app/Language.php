<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['code','name'];

    /**
     * Get the Language Terms
     */
    public function terms()
    {
        return $this->belongsToMany('App\Term', 'translations');
    }
}
