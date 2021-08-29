<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;



class CategoryController extends Controller
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
        if(session('success_message'))
        {
            Alert::success('Success', session('success_message'));
        }
        $categories = Category::latest()->paginate(5);

        Session::put('tasks_url', request()->fullUrl());
        
        // if (PHP_OS_FAMILY === "Windows") {
        //     echo "Running on Windows";
        //   } elseif (PHP_OS_FAMILY === "Linux") {
        //     echo "Running on Linux";
        //   }
        return view('category.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $categories = DB::table('categories')->where('name','like','%'.$search.'%')->paginate(5);

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
            $file->move('uploads/categoryImage/',$file_name);
            $category->category_image = $file_name;
        }
        $category->status = $request->status;
        $category->save();
        return redirect('category')->withSuccessMessage('Successfully Added');
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

            $destination = 'uploads/categoryImage/'.$category->category_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'category'.time().'.'.$extension;
            
            $file->move('uploads/categoryImage/',$file_name);
            $category->category_image = $file_name;
        }
        
        $category->update();

        if(session('tasks_url')){
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Updated');
        }

        return redirect('category')->withSuccessMessage('Successfully Updated');
        
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
        $destination = 'uploads/categoryImage/'.$category->category_image;
        {
            File::delete($destination);
        }
        $category->delete();
        
        if(session('tasks_url')){
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Deleted');
        }
        return redirect('/category')->withSuccessMessage('Successfully Deleted');
    }
}
