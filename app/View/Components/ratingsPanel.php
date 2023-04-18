<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ratingsPanel extends Component
{
    public $library_id;
    public $library_name;
    /**
     * Create a new component instance.
     */
    public function __construct($data)
    {
        $this->library_id = $data->library_id;
        $this->library_name = $data->name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ratings-panel');
    }
}
