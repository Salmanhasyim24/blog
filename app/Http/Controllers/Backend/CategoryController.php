<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  

    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.category.index', [
            'categories' => $categories
        ]);
    }

   
    public function create()
    {
        return view('backend.category.create');
    }

   
    public function store(Request $request)
    {
    
    	 $data = array();
    	 $data['category_en'] = $request->category_en;
    	 $data['category_idn'] = $request->category_idn;
    	
         Category::insert([$data]);

    	 $notification = array(
    	 	'message' => 'Category Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return to_route('category')->with($notification);
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
          $category = Category::findOrFail($id);
        return view('backend.category.edit', [
            'category' => $category
        ]);
    }

   
    public function update(Request $request)
    {
          $id = $request->id;
       Category::findOrFail($id)->update([
            'category_en' => $request->category_en,
            'category_idn' => $request->category_idn,
        ]);

           $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return to_route('category')->with($notification); 
    }

    
    public function destroy($id)
    {
        
          Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 
 
}
