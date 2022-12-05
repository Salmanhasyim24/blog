<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    
    public function index()
    {
        $districts = District::latest()->get();
        return view('backend.district.index', [
            'districts' => $districts
        ]);
    }

    
    public function create()
    {
        return view('backend.district.create');
    }

   
    public function store(Request $request)
    {
         $data = array();
    	 $data['district_en'] = $request->district_en;
    	 $data['district_idn'] = $request->district_idn;
    	
         District::insert([$data]);

    	 $notification = array(
    	 	'message' => 'District Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return to_route('district')->with($notification);
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $district = District::findOrFail($id);
        return view('backend.district.edit', [
           'district' => $district 
        ]);
    }

  
    public function update(Request $request, $id)
    {

         $id = $request->id;
       District::findOrFail($id)->update([
            'district_en' => $request->district_en,
            'district_idn' => $request->district_idn,
        ]);

           $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );

        return to_route('district')->with($notification); 
    }

  
    public function destroy($id)
    {
        District::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
