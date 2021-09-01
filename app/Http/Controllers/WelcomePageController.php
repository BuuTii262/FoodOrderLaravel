<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index()
    {
        // Session::put('tasks_url', request()->fullUrl());
        $special_categories = Category::where('status','Yes')->get();
        $popular_foods = Food::where('status','Yes')->get();
        $allfoods = Food::latest()->paginate(9);
        if(session('tasks_url')){
            return redirect(session('tasks_url'));
        }
        return view('welcome',compact('popular_foods','allfoods','special_categories'));
    }
}
