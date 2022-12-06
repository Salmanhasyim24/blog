<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveTv;
use App\Models\Notice;
use App\Models\Prayer;
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

      public function PrayerSetting(){
    	$prayer = Prayer::first();
    	return view('backend.setting.prayer',compact('prayer'));
    }


    public function PrayerUpdate(Request $request){

        $pray_id = $request->id;
    	$data = array();
    	 $data['fajr'] = $request->fajr;
    	 $data['dzuhur'] = $request->dzuhur;
    	 $data['ashar'] = $request->ashar;
    	 $data['maghrib'] = $request->maghrib;
    	 $data['isya'] = $request->isya;
    	 $data['jummah'] = $request->jummah;
    
        Prayer::findOrFail($pray_id)->update($data);

    	 $notification = array(
    	 	'message' => 'Prayers Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('prayer.setting')->with($notification);
   }

   	public function LiveTvSetting(){
 		$livetv = LiveTv::first();
 		return view('backend.setting.livetv',compact('livetv'));
 	}


   public function LivetvUpdate(Request $request){

	$livetv_id = $request->id;

   	$data = array();

    	 $data['embed_code'] = $request->embed_code;
    	 
		 LiveTv::findOrFail($livetv_id)->update($data);

    	 $notification = array(
    	 	'message' => 'Live Tv Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('livetv.setting')->with($notification);
   }

   public function ActiveSetting(Request $request, $id)
   {
	
		LiveTv::findOrFail($id)->update(['status' => 1]);
 	
 		$notification = array(
    	 	'message' => 'Live Tv Active Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}


 		public function InActiveSetting(Request $request, $id){
 		
			LiveTv::findOrFail($id)->update(['status' => 0]);

 		$notification = array(
    	 	'message' => 'Live Tv InActive Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}
	
	public function NoticeSetting(){
 		$notice = Notice::first();
 		return view('backend.setting.notice',compact('notice'));
 	}


   public function NoticeUpdate(Request $request){

	$notice_id = $request->id;

   	$data = array();

    	 $data['notice'] = $request->notice;
    	 
		 Notice::findOrFail($notice_id)->update($data);

    	 $notification = array(
    	 	'message' => ' Notice Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('notice.setting')->with($notification);
   }

    public function ActiveNoticeSetting(Request $request, $id)
   {
	
		Notice::findOrFail($id)->update(['status' => 1]);
 	
 		$notification = array(
    	 	'message' => 'Notice Active Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}


 		public function InActiveNotiveSetting(Request $request, $id){
 		
			Notice::findOrFail($id)->update(['status' => 0]);

 		$notification = array(
    	 	'message' => 'Notice InActive Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}

}
