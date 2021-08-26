<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
       $this->middleware('isAdminOrStaff'); 
    }
    public function index(){      
        return view('back.adminDashboard');
    }
}
