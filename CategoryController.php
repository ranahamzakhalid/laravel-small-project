<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // show data
   

    public function indexx()
    {
        $category = Category::get();

        $users = DB::table('login_')
        ->get();
        return view('category/indexx', compact('category','users'));
    }
    public function create()
    {
        return view('category.create');
    }
    // validations

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
            'upload' => 'required|max:255|mimes:jpg,png,jpeg',
        ]);

        // file path

           $fileUpload = $request->upload; 

        if ($fileUpload) {
            $fileName = $fileUpload->getClientOriginalName(); 
            $path = $fileUpload->storeAs('public/uploads', $fileName);

            $db_path = 'storage/uploads/' . $fileName;
        }
        // insert data

        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_active' => $request->is_active == true ? 1 : 0,
            'upload' => $db_path,
        ]);
        return redirect()->back()->with(['status' => "Category Created"]);
    }
    // edit file

    public function edit(int $id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }
    // update data

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
            'upload' => 'required|max:255|mimes:jpg,png,jpeg'
        ]);

        $category = Category::find($id);
        $uploadedFile = $request->file('upload');

        if ($uploadedFile) {
            $fileName = $uploadedFile->getClientOriginalName(); // Get the original file name
            $path = $uploadedFile->storeAs('public/uploads', $fileName); // Store the file in the storage directory
        
            // Update the category's upload field with the file path
            $category->upload = 'storage/uploads/' . $fileName;
            $category->save();
        
            // Optionally, delete the previous file if it exists
            if ($category->upload) {
                Storage::disk('public')->delete($category->upload);
            }
        }
        

        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_active' => $request->is_active == true ? 1 : 0,
            
        ]);
        return redirect()->back()->with(['status' => "Category Updated"]);
    }
    // delete data

    public function delete(int $id)
    {
        $category = Category::find($id);
            if ($category->upload){
                Storage::disk('public')->delete('uploads/'.basename($category->upload));
        }
        $category->delete();
        return redirect()->back()->with(['status' => "Category Deleted"]);
    }
}
