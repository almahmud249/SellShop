<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public.public_master');
    }
    public function index2()
    {
        return view('admin.admin_master');
    }
    public function GetUser(){

        $id = Auth::id();
        return $data=DB::table('users')->where('id',$id)->first();

    }


}
