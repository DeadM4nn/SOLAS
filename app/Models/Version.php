<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    protected $primaryKey = 'version_id';
    protected $table = 'version';
    
    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
