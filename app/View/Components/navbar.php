<?php

namespace App\View\Components;
use App\HTTP\Controllers\BookmarkControl;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;


class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $has_notif;

    public function __construct()
    {
        if(Auth::user()){
            $bookmark_control = new BookmarkControl;
            $this->has_notif = $bookmark_control->check_for_updates();
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
