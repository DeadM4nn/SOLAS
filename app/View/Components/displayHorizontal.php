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
    public $library_id;
    public $id;
    public $creator_id;
    public $last_updated;
    public $views;

    public function __construct($data)
    {
        $this->name = $data->name;
        $this->desc = $data->description;
        $this->library_id = $data->library_id;
        $this->creator_id = $data->creator_id;
        $this->views = $data->views;

        if ($data->updated_at == null) {
            $timestamp = $data->created_at;
        } else {
            $timestamp = $data->updated_at;
        }
        

        // Convert the timestamp to a UNIX timestamp
        $timestamp = strtotime($timestamp);

        // Get the current timestamp
        $current_time = time();

        // Calculate the difference in seconds between the current time and the timestamp
        $diff = $current_time - $timestamp;

        // Define the time intervals in seconds
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $week = $day * 7;
        $month = $day * 30;
        $year = $day * 365;

        // Determine the time interval and format the output accordingly
        if ($diff < $minute) {
            $result = "Updated just now";
        } elseif ($diff < $hour) {
            $result = "Updated " . floor($diff / $minute) . " minutes ago";
        } elseif ($diff < $day) {
            $result = "Updated " . floor($diff / $hour) . " hours ago";
        } elseif ($diff < $week) {
            $result = "Updated " . floor($diff / $day) . " days ago";
        } elseif ($diff < $month) {
            $result = "Updated last week";
        } elseif ($diff < $year) {
            $result = "Updated last month";
        } else {
            $result = "Updated " . floor($diff / $year) . " years ago";
        }

        $this->last_updated = $result;
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
