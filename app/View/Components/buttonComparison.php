<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class buttonComparison extends Component
{
    public $library_id;

    public function __construct($library_id)
    {
        $this->library_id = $library_id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-comparison');
    }
}
