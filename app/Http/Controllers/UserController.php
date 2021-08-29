<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdminOrStaff');  
       
    }
    
    public function index(){
        if(session('success_message'))
        {
            Alert::success('Success', session('success_message'));
        }
        $users = User::paginate(5);
        $roles = Role::all();
        Session::put('tasks_url', request()->fullUrl());
        return view('user.index',compact('users','roles'));
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit',compact('user','roles'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        // return dd($user->id);

        $roleIds =  $request->role_ids;

        $user->roles()->sync($roleIds);
        if(session('tasks_url')){
            return redirect(session('tasks_url'))->withSuccessMessage('You Have Successfully Change User Role');
        }

        return redirect('/user')->withSuccessMessage('You Have Successfully Change User Role');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        if(session('tasks_url')){
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Deleted');
        }
        return redirect('/user')->withSuccessMessage('Successfully Deleted');
    }
    
    public function editprofile($id){
        $user = User::find($id);
        return view('user.editprofile',compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('user_image'))
        {
            $destination = 'uploads/userImage/'. $user->user_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('user_image');
            $extension = $file->getClientOriginalExtension();
            $file_name = 'user'.time().'.'.$extension;
            $file->move('uploads/userImage/',$file_name);
            
            $user->user_image = $file_name;
        }

        $user->update();

        if(session('tasks_url')){
            return redirect(session('tasks_url'))->withSuccessMessage('Successfully Updated Your Profile');
        }

        return redirect('admindashboard')->withSuccessMessage('Successfully Updated Your Profile');
        
    }
    public function search(Request $request)
    {
        $search = $request->get('search');

        $users = User::where('name','like','%'.$search.'%')->paginate(5);
        $roles = Role::all();

        return view('user.index',compact('users','roles'));

    }
}
