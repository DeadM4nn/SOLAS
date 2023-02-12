<?php

namespace App\View\Components;

use Illuminate\View\Component;

class displayHorizontal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $desc;
    
    public function __construct($data)
    {
        $this->name = $data->name;
        $this->desc = $data->description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.display-horizontal');
    }
}
