<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::latest()->get();

        $categories = Category::all();
        
        return view('food.index', compact('foods'))->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required',
            'food_image' => 'required',
            'category_id' => 'required',          
            'price' => 'required',
            'description' => 'required',
            'status' => 'required',
            'have' => 'required'
            
        ]);

        $food = new Food();
        $food->name = $request->food_name;
        $food->category_id = $request->category_id;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->status = $request->status;
        $food->have = $request->have;

        if($request->hasFile('food_image'))
        {
            $file = $request->file('food_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/foodImage/',$file_name);
            $food->food_image = $file_name;
        }
        $food->save();
        return redirect('/food')->with('successAlert','You Have Successfully Added New Food');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'food_name' => 'required',
            'category_id' => 'required',          
            'price' => 'required',
            'description' => 'required'
            
        ]);

        $food = Food::find($id);
        $food->name = $request->food_name;
        $food->category_id = $request->category_id;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->status = $request->status;
        $food->have = $request->have;

        if($request->hasFile('food_image'))
        {
            $destination = 'uploads/foodImage/'. $food->food_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('food_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('uploads/foodImage/',$file_name);
            $food->food_image = $file_name;
        }
        
        $food->update();
        return redirect('/food')->with('successAlert','You Have Successfully Updated Food Information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $destination = 'uploads/foodImage/'.$food->food_image;
        {
            File::delete($destination);
        }
        $food->delete();
        return redirect('/food')->with('successAlert','You Have Successfully Delete Food');
    }
}
