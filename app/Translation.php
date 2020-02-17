<?php

namespace App;

use App\Language;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['term_id','language_id','translation', 'approved'];
    /**
     * Get the language of this translation
     */
    public static function getLanguageCode( $language_id)
    {
        $language = Language::find($language_id);
        return $language->code;
    }
}
