<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(6);

        Session::put('tasks_url', request()->fullUrl());
        
        return view('category.index', compact('categories'));
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
            'category_name' => 'required',
            'status' => 'required',
            'category_image' => 'required'
        ]);


        $category = new Category();
        $category->name = $request->category_name;
        if($request->hasFile('category_image'))
        {
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'category'.time().'.'.$extension;
            $file->move('/home/saithihaaung/Pictures/FoodOrder/',$file_name);
            $category->category_image = $file_name;
        }
        $category->status = $request->status;
        $category->save();
        return redirect('category')->with('successAlert','You have successfully Added');
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
        $category = Category::find($id);//find id in Post model if exist compact it into return
        return view('category.edit',compact('category'));
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
            'category_name' => 'required',
            'status' => 'required',
        ]);


        $category = Category::find($id);
        $category->name = $request->category_name;
        
        $category->status = $request->status;

        if($request->hasFile('category_image'))
        {

            $destination = '/home/saithihaaung/Pictures/FoodOrder/'. $category->category_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'category'.time().'.'.$extension;
            $file->move('/home/saithihaaung/Pictures/FoodOrder/',$file_name);
            $category->category_image = $file_name;
        }
        
        $category->update();

        if(session('tasks_url')){
            return redirect(session('tasks_url'));
        }

        return redirect('/category')->with('successAlert','You have successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = '/home/saithihaaung/Pictures/FoodOrder/'.$category->category_image;
        {
            File::delete($destination);
        }
        $category->delete();
        
        if(session('tasks_url')){
            return redirect(session('tasks_url'));
        }
        return redirect('/category')->with('successAlert','You have successfully delete');
    }
}
