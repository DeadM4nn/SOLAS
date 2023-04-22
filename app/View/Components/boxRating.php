<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Rating;
use App\Models\User;


class boxRating extends Component
{
    public $library_name;
    public $show;
    public $comment;
    public $rating;
    public $date;
    public $library_id;
    public $picture;
    public $username;
    public $rating_id;
    public $account_id;
    

    public function __construct($id, $show = false)
    {
        $data = Rating::select('ratings.*', 'libraries.name as library_name')
        ->join('libraries', 'ratings.library_id', '=', 'libraries.library_id')
        ->where('ratings.id', $id)
        ->first();

        $profile = User::find($data->account_id);
        $this->rating_id = $id;
        $this->library_id = $data->library_id;
        $this->username = $profile->username;
        $this->picture = $profile->picture;
        $this->library_name = $data->library_name;
        $this->comment = $data->comment;
        $this->rating = $data->rating;
        $this->show = $show;
        $this->account_id = $data->account_id;
        $this->date = $data->created_at->format('m/d/Y');

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.box-rating');
    }
}
