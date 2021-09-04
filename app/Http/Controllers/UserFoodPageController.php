<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class UserFoodPageController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        $categories = Category::all();

        return view('front.userFoodPage',compact('foods','categories'));
    }
}
