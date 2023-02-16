<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Library extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'library';
    protected $primaryKey = 'library_id';
}
