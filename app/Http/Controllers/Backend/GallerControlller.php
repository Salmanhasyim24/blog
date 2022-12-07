<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Video;
use Image;
use Illuminate\Http\Request;

class GallerControlller extends Controller
{
     public function PhotoGallery(){
    	$photos = Photo::orderBy('id','desc')->get();
    	return view('backend.gallery.photo',compact('photos'));
    }


    public function AddPhoto(){
    	return view('backend.gallery.createphoto');
    }



   public function StorePhoto(Request $request){
   	 
   	 $data = array();
  	 $data['title'] = $request->title;
  	 $data['type'] = $request->type;
  	 

  	 $image = $request->photo;
  	 	if ($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,300)->save('upload/photogallery/'.$image_one);
  	 		$data['photo'] = 'upload/photogallery/'.$image_one;
  	 		// image/photogallery/343434.png
  	 		// DB::table('photos')->insert($data);
            Photo::insert($data);

  	 		$notification = array(
    	 	'message' => 'Photo Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('photo.gallery')->with($notification);
  	 	
  	 	}else{
  	 		return Redirect()->back();
  	 	} // End Condition

   }// END Methods 

   public function DeletePhoto($id)
   {
       $photo = Photo::findOrFail($id);
    unlink($photo->photo);

    Photo::findOrFail($id)->delete();


    $notification = array(
        'message' => 'Post Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

    
   public function VideoGallery(){
   	$videos = Video::orderBy('id','desc')->get();
   	return view('backend.gallery.video',compact('videos'));
   }// END Methods 


   public function AddVideo(){
   	return view('backend.gallery.videocreate');
   }// END Methods 


  public function StoreVideo(Request $request){

  	 $data = array();
  	 $data['title'] = $request->title;
  	 $data['video'] = $request->video;
  	 $data['type'] = $request->type;
  
     Video::insert($data);

  	 $notification = array(
    	 	'message' => 'Video Inserted Successfully',
    	 	'alert-type' => 'info'
    	 );

    	 return Redirect()->route('video.gallery')->with($notification);

  }// END Methods 

  public function DeleteVideo($id)
    {
      Video::findOrFail($id)->delete();
        
      $notification = array(
    	 	'message' => 'Video Deleted Successfully',
    	 	'alert-type' => 'Success'
    	 );
         
    return redirect()->back()->with($notification);
  }

}
