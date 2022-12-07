<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Image;
use Illuminate\Http\Request;

class AdsController extends Controller
{
      public function ListAds(){
    	$ads = Ads::orderBy('id','desc')->get();
    	return view('backend.ads.index',compact('ads'));

    }


    public function AddAds(){
    	return view('backend.ads.create');
    }
   

 public function StoreAds(Request $request){

 	$data = array();
 	$data['link'] = $request->link;
   
     if ($request->type == 2) {
    	 
            $image = $request->ads;
  	 	 
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(970,90)->save('upload/ads/'.$image_one);
  	 		$data['ads'] = 'upload/ads/'.$image_one;
  	 		// image/photogallery/343434.png
  	 		$data['type'] = 2;
  	 		// DB::table('ads')->insert($data);
            Ads::insert($data);


  	 		$notification = array(
    	 	'message' => 'Harizontal Ads Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('list.add')->with($notification);

    }else{

           $image = $request->ads;
  	 	 
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,500)->save('upload/ads/'.$image_one);
  	 		$data['ads'] = 'upload/ads/'.$image_one;
  	 		// image/photogallery/343434.png
  	 		$data['type'] = 1;
  	 		// DB::table('ads')->insert($data);
           Ads::insert($data);

  	 		$notification = array(
    	 	'message' => 'Vertical Ads Inserted Successfully',
    	 	'alert-type' => 'info'
    	 );

    	 return Redirect()->route('list.add')->with($notification);
    
    }

 } // End Method

     public function DeleteAds($id)
   {
       $ads = Ads::findOrFail($id);
    unlink($ads->ads);

    Ads::findOrFail($id)->delete();


    $notification = array(
        'message' => 'Ads Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

}
