<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class displayAccountHorizontal extends Component
{
    /**
     * Create a new component instance.
     */

    public $username;
    public $is_admin;
    public $email;
    public $account_id;
    public $picture;
    public $date_created;

    public function __construct($data)
    {
        $this->account_id = $data->id;
        $this->username = $data->username;
        $this->email = $data->email;
        $this->is_admin = $data->is_admin;
        $this->picture = $data->picture;
        $this->date_created = "created on " . date('m/d/Y', strtotime($data->created_at));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.display-account-horizontal');
    }
}
