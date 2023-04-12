<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library;
use App\Models\LibraryTag;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'tag_id';

    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'library_tags', 'tag_id', 'library_id');
    }


}