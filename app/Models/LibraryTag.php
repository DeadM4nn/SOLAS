<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryTag extends Model
{
    use HasFactory;

    public function libraries()
    {
        return $this->belongsTo(Library::class);
    }

    public function tags(){
        return $this->belongsTo(Tag::class);
    }
}
