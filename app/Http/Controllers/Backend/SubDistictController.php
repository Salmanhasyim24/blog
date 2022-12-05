<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class SubDistictController extends Controller
{
  
    public function index()
    {
        $subdistricts = SubDistrict::with(['district'])->latest()->get();

        return view('backend.subdistrict.index', [
           'subdistricts' => $subdistricts 
        ]);
    }

  
    public function create()
    {
        $districts = District::all();
        return view('backend.subdistrict.create', compact('districts'));
    }

    
    public function store(Request $request)
    {

        SubDistrict::insert([
            'district_id' => $request->district_id,
            'subdistrict_en' => $request->subdistrict_en,
            'subdistrict_idn' => $request->subdistrict_idn,
        ]);

       $notification = array(
            'message' => 'SubDistrict Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subdistrict')->with($notification); 

    }// End Method 
    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
         
      $districts = District::orderBy('district_en','ASC')->get();
      $subdistrict = SubDistrict::findOrFail($id);

      return view('backend.subdistrict.edit', [
        'districts' => $districts,
        'subdistrict' => $subdistrict
      ]);
    }

   
    public function update(Request $request, $id)
    {
         $subdist_id = $request->id;

         SubDistrict::findOrFail($subdist_id)->update([
            'district_id' => $request->district_id,
            'subdistrict_en' => $request->subdistrict_en,
            'subdistrict_idn' => $request->subdistrict_idn,
        ]);

       $notification = array(
            'message' => 'SubDistrict Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('subdistrict')->with($notification); 
    }

   
    public function destroy($id)
    {

    SubDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubDistrict Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }
}
