<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('isNormalUser');  
       
    }

    public function index()
    {
        $special_categories = Category::where('status','Yes')->get();
        $popular_foods = Food::where('status','Yes')->get();
        $allfoods = Food::latest()->paginate(9);
        return view('front.userDashboard',compact('popular_foods','allfoods','special_categories'));
    }
}
