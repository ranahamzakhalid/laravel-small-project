<?php

namespace App\Http\Controllers; 
use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // show data in main page

    public function showUsers(){
        $users = DB::table('students')
                    // ->get()
                    // ->where('city','Islamabad')
                    // ->orderBy('name')
                    ->simplePaginate(3);
        return view('welcome',compact('users'));
    }
        // view single user data

    public function singleUser(string $id){
        $users = DB::table('students')->find($id);
         
        return view('user',compact('users'));
    }
            // delete user data

    public function deleteUser(string $id){
        // $users = DB::table('students')
        //     ->where ('id',$id)
        //     ->delete(); 
    $users = student::find($id);
        if($users->delete()){
            session()->flash('success');
            return redirect()->route('home.index');
        }
        return redirect()->back()->with("error",'User not found!');
    }
        // add new user data

    public function addUser(Request $req){
        $req->validate([
                'name'=>'max:255|string',
                'age' => 'required',
                'email' => 'required|email|unique:students,email',
                'address' =>'required',
                'city' => 'required',
                'phone' => 'required',
                'password' => 'required',
        ]);

        $users = DB::table('students')
            ->insert(
                [
                    'name' => $req->name,
                    'age' => $req->age,
                    'email' => $req->email,
                    'address' => $req->address,
                    'city' => $req->city,
                    'phone' => $req->phone,
                    'password' => $req->password,
                ]
                );
        if($users){
            return redirect()->route('home.index');
            // echo "<h2> Data Updated </h2>";
        }
        else{
            echo "<h2> Data Not Updated </h2>";
        }
    }
            // update user data

        public function updateUser(string $id){
            $users = DB::table('students')->find($id);
            return view('update',['data'=> $users]);
        }
        public function updateData(Request $req, $id){
            
            $users =DB::table('students')
                    ->where('id',$id)
                    ->update([
                        'name' => $req->name,
                        'age' => $req->age,
                        'email' => $req->email,
                        'address' => $req->address,
                        'city' => $req->city,
                        'phone' => $req->phone,
                        'password' => $req->password,
                    ]);
            if($users){
                return redirect()->route('home.index');
            }
        }
}
