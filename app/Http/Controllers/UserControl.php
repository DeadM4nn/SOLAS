<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserControl extends Controller
{
    public function show_all(){
        $results = User::all();
        $amount=count(User::all());
        return view('users/search_result', ["results"=>$results, "amount"=>$amount]);
    }
}
