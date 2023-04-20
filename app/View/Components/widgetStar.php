<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Rating;

class widgetStar extends Component
{
    public $rating;
    public function __construct($id)
    {
        $this->rating = round(Rating::where('library_id', $id)->avg('rating'));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widget-star');
    }
}
