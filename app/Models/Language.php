<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'library_languages', 'language_id', 'library_id');
    }

}
