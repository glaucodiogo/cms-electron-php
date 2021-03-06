<?php

namespace App\Pages;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $table = 'pages';
    protected $fillable = ['title', 'body', 'slug'];

    public function setTitleAttribute($value)
    {
        if (empty($this->attributes['slug'])) {
            $slug = transliterator_transliterate("Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $value);
            $slug = preg_replace('/[-\s]+/', '-', $slug);
            $this->attributes['slug'] = trim($slug, '-');
        }
        $this->attributes['title'] = $value;
    }
}
