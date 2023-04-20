<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Tag;

class widgetTag extends Component
{
    public $tags;
    
    public function __construct($id)
    {
        $this->tags = Tag::select('tags.name', 'tags.tag_id')
        ->distinct()
        ->join('library_tags', 'library_tags.tag_id', '=', 'tags.tag_id')
        ->where('library_tags.library_id', '=', $id)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widget-tag');
    }
}
