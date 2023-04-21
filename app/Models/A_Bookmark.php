<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A_Bookmark extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bookmarks_archived';
}
