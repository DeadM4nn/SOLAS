<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Rating;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;

class ratingsPanel extends Component
{
    public $library_id;
    public $library_name;
    public $is_update;
    public $update_data;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $user=-1)
    {
        $data = Library::find($id);
        $this->library_id = $data->library_id;
        $this->library_name = $data->name;

        // This means it will take the current user as the target
        if($user == -1){
            $user_id = Auth::user()->id;
        } else {
            $user_id = $user;
        }

        // Gets Update Data by the current user.
        $this->update_data = Rating::select('ratings.*', 'users.username')
        ->join('users', 'ratings.account_id', '=', 'users.id')
        ->where('library_id', $data->library_id)
        ->where("account_id", $user_id)
        ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ratings-panel');
    }
}
