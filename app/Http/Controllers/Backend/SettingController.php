<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Social;
use Illuminate\Http\Request;

class SettingController extends Controller
{
       
        public function SocialSetting()
    {
    	$social = Social::firstOrFail();
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


    public function SeoSetting()
    {
    	$seo = Seo::firstOrFail();
    	return view('backend.setting.seo',compact('seo'));
    }



    public function SeoUpdate(Request $request){

        $seo_id = $request->id;
   	$data = array();
    	 $data['meta_author'] = $request->meta_author;
    	 $data['meta_title'] = $request->meta_title;
    	 $data['meta_keyword'] = $request->meta_keyword;
    	 $data['meta_description'] = $request->meta_description;
    	 $data['google_analytics'] = $request->google_analytics;
    	 $data['google_verification'] = $request->google_verification;
    	 $data['alexa_analytics'] = $request->alexa_analytics;
    	
        Seo::FindOrFail($seo_id)->update($data);

    	 $notification = array(
    	 	'message' => 'Seo Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('seo.setting')->with($notification);
   }// end Methos 

}
