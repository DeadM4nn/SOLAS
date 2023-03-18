<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Library extends Model
{
    use HasFactory;
    use Searchable;
    protected $primaryKey = 'library_id';
    public $timestamps = false;

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
}
