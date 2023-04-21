<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library;
use App\Models\LibraryTag;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'tag_id';

    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'library_tags', 'tag_id', 'library_id');
    }

    public function searchableAs()
    {
        return 'tags_index';
    }
    
    public function toSearchableArray()
    {
        $array = $this->toArray();
    
        // Customize the searchable array as needed...
        // For example, you might only want to index the 'name' attribute:
        return [
            'name' => $array['name'],
        ];
    }

}
