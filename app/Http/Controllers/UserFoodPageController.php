<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserFoodPageController extends Controller
{
    public function index()
    {
        if(session('success_message'))
        {
            Alert::success('Success', session('success_message'));
        }
        $foods = Food::all();

        $categories = Category::all();

        return view('front.userFoodPage',compact('foods','categories'));
    }

    public function searchFoodByCategory(Request $request)
    {
        $search = $request->get('category_id');

        $categories = Category::all();

        if($search == "all")
        {
            $foods = Food::all();  
        }
        else
        {
            $foods = Food::where('category_id','like',$search)->get();
        }

        

        return view('front.userFoodPage',compact('foods','categories'));
    }
}
