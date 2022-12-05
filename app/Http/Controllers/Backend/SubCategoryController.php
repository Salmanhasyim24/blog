<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   
    public function index()
    {
        $subcategories = SubCategory::with(['category'])->latest()->get();

        return view('backend.subcategory.index', [
           'subcategories' => $subcategories 
        ]);
    }

  
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategory.create', [
            'categories' => $categories
        ]);
    }

  
    public function store(Request $request)
    {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_en' => $request->subcategory_en,
            'subcategory_idn' => $request->subcategory_idn,
        ]);

       $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subcategory')->with($notification); 

    }// End Method 

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        
      $categories = Category::orderBy('category_en','ASC')->get();
      $subcategory = SubCategory::findOrFail($id);

      return view('backend.subcategory.edit', [
        'categories' => $categories,
        'subcategory' => $subcategory
      ]);
    }

    
    public function update(Request $request)
    {

        $subcat_id = $request->id;

         SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_en' => $request->subcategory_en,
            'subcategory_idn' => $request->subcategory_idn,
        ]);

       $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subcategory')->with($notification); 


    }// End Method 

  
    public function destroy($id)
    {
         SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 
 

     public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('name','ASC')->get();
            return json_encode($subcat);

    }// End Method 

}
