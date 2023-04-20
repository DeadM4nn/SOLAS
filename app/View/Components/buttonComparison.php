<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Comparison;
use Illuminate\Support\Facades\Auth;

class buttonComparison extends Component
{
    public $library_id;
    public $is_exist;

    public function __construct($id)
    {
        $this->library_id = $id;
        $this->is_exist = Comparison::where('account_id', '=', Auth::user()->id)
        ->where('library_id', '=', $id)
        ->exists();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-comparison');
    }
}
