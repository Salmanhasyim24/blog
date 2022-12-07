<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Image;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
      public function WebSetting(){
    	$websitesetting = WebsiteSetting::first();
    	return view('backend.setting.website',compact('websitesetting'));
    }



    public function UpdateWebSetting(Request $request){
      
     $data = array();
  	 $data['address_en'] = $request->address_en;
  	 $data['address_idn'] = $request->address_idn;
   	 $data['phone_en'] = $request->phone_en;
  	 $data['phone_idn'] = $request->phone_idn;
  	 $data['email'] = $request->email;
  	  

     $oldimage = $request->logo;
     $web_id = $request->id;

  	 $image = $request->logo;
  	 	if ($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(320,130)->save('upload/logo/'.$image_one);
  	 		$data['logo'] = 'upload/logo/'.$image_one;
  	 		// image/postimg/343434.png
  	 		// DB::table('websitesettings')->where('id',$id)->update($data);
            WebsiteSetting::findOrFail($web_id)->update($data);
  	 		unlink($oldimage);

  	 		$notification = array(
    	 	'message' => 'Website Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('website.setting')->with($notification);
  	 	
  	 	}else{
  	 		$data['logo'] = $oldimage;
  	 		// DB::table('websitesettings')->where('id',$id)->update($data);
  	 		 WebsiteSetting::findOrFail($web_id)->update($data);
  	 		$notification = array(
    	 	'message' => 'Website Updated Successfully',
    	 	'alert-type' => 'success'
    	 );
         return Redirect()->route('website.setting')->with($notification);
  	 	} // End Condition

    } // End Method 
}
