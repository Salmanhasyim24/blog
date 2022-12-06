<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SettingController extends Controller
{
       
        public function SocialSetting()
    {
    	$social = Social::first();
    	return view('backend.setting.social',compact('social'));
    }

       public function SocialUpdate(Request $request)
       {

        $social_id = $request->id;
        	
        $data = array();
    	 $data['facebook'] = $request->facebook;
    	 $data['twitter'] = $request->twitter;
    	 $data['youtube'] = $request->youtube;
    	 $data['linkedin'] = $request->linkedin;
    	 $data['instagram'] = $request->instagram;
    	
         Social::findOrFail($social_id)->update($data);

    	 $notification = array(
    	 	'message' => 'Social Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('social.setting')->with($notification);
   }

}
