<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alertBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $library_id;
    public $name;
    public $link;

    public function __construct($newLibraryId, $libraryName = "names", $link)
    {
        $this->library_id = $newLibraryId;
        $this->name = $libraryName;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-box');
    }
}
