<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;



class accountAlertBox extends Component
{
    public $account_id;
    public $username;
    /**
     * Create a new component instance.
     */
    public function __construct($account_id_new, $username)
    {
        $this->account_id = $account_id_new;
        $this->username = $username;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.account-alert-box');
    }
}
