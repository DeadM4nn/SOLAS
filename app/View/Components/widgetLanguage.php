<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Language;

class widgetLanguage extends Component
{
    /**
     * Create a new component instance.
     */
    public $languages;

    public function __construct($id)
    {
        $this->languages = Language::select('languages.name', 'languages.language_id')
        ->distinct()
        ->join('library_languages', 'library_languages.language_id', '=', 'languages.language_id')
        ->where('library_languages.library_id', '=', $id)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.widget-language');
    }
}
