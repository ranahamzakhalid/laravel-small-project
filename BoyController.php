<?php

namespace App\Http\Controllers; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoyController extends Controller
{
    public function index(){
        $users = DB::table('boys')
                    ->get();
        return view('boys',compact('users'));
    }
    // public function index(){
    //     $users = DB::table('cities')->join('boys','cities.id','=','boys.city')->get();
    //     return view('boys',compact('users'));
    // }
}
