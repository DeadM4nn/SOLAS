<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryTag extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'library_tags';

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
    
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
