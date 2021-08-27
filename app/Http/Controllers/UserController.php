<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

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
}
