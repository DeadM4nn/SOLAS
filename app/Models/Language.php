<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'language_id';

    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'library_languages', 'language_id', 'library_id');
    }

    public function librariesWithLanguageId($id)
    {
        return $this->libraries()->where('language_id', $id)->get();
    }

}
