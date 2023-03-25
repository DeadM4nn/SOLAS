<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryLanguage extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function libraries()
    {
        return $this->belongsTo(Library::class);
    }

    public function tags(){
        return $this->belongsTo(Language::class);
    }
}
