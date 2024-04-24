<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dropdown;
use App\Models\login_;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name'=>'string',
            'email'=>'required|email|unique:login_',
            'password'=>'required'
        ]);

        login_::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => md5($request->input('password'))
        ]);
            return redirect()->route('login.home');
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $users = login_::where('email','=',$request->email)->first();
        if($users){
            // if(Hash::check($request->password,$users->password)){
                $request->session()->put('loginId',$users->id);
                return redirect()->route('category.index');
             }
            else{
                return back()->with('fail','Password Not Matches');
            }
        // }
        //     else{
        //         return back()->with('fail','Thid email is not registered');
        // }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect()->route('login.home');
        }
    }

    // for dropdown
    
    public function company(){

        $dropdown = Dropdown::get();
        $users = DB::table('dropdown')
        ->get();
        return view('drop.dropdown', compact('dropdown','users'));
    }
    public function companystore(Request $request){
        $request->validate([
            'name'=>'string',
            'companies'=>'required|array'
        ]);
        $name = $request->input('name');
        $companies = implode(',', $request->input('companies'));

        Dropdown::create([
            'name' => $name,
            'companies' => $companies,
        ]);
        if($request){
            return redirect()->back();
            echo "<h2> Data Updated </h2>";
        }
        else{
            echo "<h2> Data Not Updated </h2>";
        }
    }

    public function edit(int $id)
    {
        $dropdown  = Dropdown::find($id);
        return view('drop.editdropdown', compact('dropdown '));
    }

    public function delcompany(int $id) {
        $dropdown = Dropdown::find($id);
    
        if (!$dropdown) {
            return redirect()->back()->with('error', 'Dropdown not found');
        }
    
        if ($dropdown->delete()) {
            session()->flash('success', 'Dropdown deleted successfully');
        } else {
            session()->flash('error', 'Failed to delete dropdown');
        }
        return redirect()->route('company.name');
    }
    
        // Check if the record exists
    //     if (!$dropdown) {
    //         return redirect()->back()->with(['error' => "Dropdown not found"]);
    //     }
    //     $dropdown->delete();
    //     return redirect()->back()->with(['status' => "Dropdown deleted successfully"]);
    // }
    
}
