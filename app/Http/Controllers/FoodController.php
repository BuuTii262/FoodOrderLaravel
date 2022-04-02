<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;




class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('isAdminOrStaff');
    }

    public function index()
    {
        if (session('success_message')) {
            Alert::success('Success', session('success_message'));
        }
        $foods = Food::latest()->paginate(10);

        $categories = Category::all();

        Session::put('tasks_url', request()->fullUrl());


        return view('food.index', compact('foods', 'categories'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $foods = Food::where('name', 'like', '%' . $search . '%')->paginate(10);

        $categories = Category::all();

        return view('food.index', compact('foods', 'categories'));
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
            'food_name' => 'required|unique:food,name|max:20,name',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'status' => 'required',
            'have' => 'required'

        ]);

        $defaultImage = "defaultfood.jpg";


        $food = new Food();
        $food->name = $request->food_name;
        $food->category_id = $request->category_id;
        $food->price = $request->price;
        $food->description = $request->description;
        $food->status = $request->status;
        $food->have = $request->have;

        if ($request->hasFile('food_image')) {
            $file = $request->file('food_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $extension;
            $file->move('uploads/foodImage/', $file_name);
            $food->food_image = $file_name;
        } else {
            $food->food_image = $defaultImage;
        }
        $food->save();

        if (session('tasks_url')) {
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Added New Food');
        }
        return redirect('/food')->withSuccessMessage("Successfully Added New Food");
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

        if ($request->hasFile('food_image')) {
            $destination = 'uploads/foodImage/' . $food->food_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('food_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = "food" . time() . '.' . $extension;
            $file->move('uploads/foodImage/', $file_name);
            $food->food_image = $file_name;
        }

        $food->update();

        if (session('tasks_url')) {
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Updated Food Data');
        }
        return redirect('/food')->withSuccessMessage('Successfully Updated Food Data');
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
        $destination = 'uploads/foodImage/' . $food->food_image; {
            File::delete($destination);
        }
        $food->delete();

        if (session('tasks_url')) {
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Deleted');
        }
        return redirect('/food')->withSuccessMessage('Successfully Deleted');
    }
}
