<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\SubDistrict;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   
    public function index()
    {
        $posts = Post::with([
            'category', 'subcategory','district', 'subdistrict'
            ])->get();
            return view('backend.post.index', [
                'posts' => $posts
            ]);
    }

  
    public function create()
    {
        $categories = Category::all();
        $districts = District::all();

        return view('backend.post.create', [
            'categories' => $categories,
            'districts' => $districts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = array();
            $data['title_en'] = $request->title_en;
            $data['title_idn'] = $request->title_idn;
            $data['user_id'] = Auth::id();
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['district_id'] = $request->district_id;
            $data['subdistrict_id'] = $request->subdistrict_id;
            $data['tags_en'] = $request->tags_en;
            $data['tags_idn'] = $request->tags_idn;
            $data['details_en'] = $request->details_en;
            $data['details_idn'] = $request->details_idn;
            $data['headline'] = $request->headline;
            $data['first_section'] = $request->first_section;
            $data['first_section_thumbnail'] = $request->first_section_thumbnail;
            $data['bigthumbnail'] = $request->bigthumbnail;
            $data['post_date'] = Carbon::now();
            $data['post_month'] = date("F");


  	 $image = $request->image;
  	 	if ($image) {
  	 		$image_one = uniqid().'.'.$image->getClientOriginalExtension(); 
  	 		Image::make($image)->resize(500,300)->save('upload/postimg/'.$image_one);
  	 		$data['image'] = 'upload/postimg/'.$image_one;
  	 		// image/postimg/343434.png
  	 		// DB::table('posts')->insert($data);
            Post::insert($data);

  	 		$notification = array(
    	 	'message' => 'Post Inserted Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return to_route('post')->with($notification);
  	 	
  	 	}else{
  	 		return Redirect()->back();
  	 	} // End Condition


  }  // END Method 

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $districts = District::all();
        $subcategory = SubCategory::all();
        $subdistricts = SubDistrict::all();
        $post = Post::findOrFail($id);

        return view('backend.post.edit', [
            'categories' => $categories,
            'districts' => $districts,
            'subcategory' => $subcategory,
            'subdistricts' => $subdistricts, 
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

         $post_id = $request->id;

             Post::findOrFail($post_id)->update([

            'district_id' => $request->district_id,
            'subdistrict_id' => $request->subdistrict_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => Auth::id(),

            'title_en' => $request->title_en,
            'title_idn' => $request->title_idn,
            'details_en' => $request->details_en,
            'details_idn' => $request->details_idn,
            'tags_en' => $request->tags_en,
            'tags_idn' => $request->tags_idn,


            'headline' => $request->headline,
            'first_section' => $request->first_section,
            'first_section_thumbnail' => $request->first_section_thumbnail,
            'bigthumbnail' => $request->bigthumbnail, 


            'post_date' => Carbon::now(),
        ]);


         $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return to_route('post')->with($notification); 

    }// End Method 

         public function updateimage(Request $request){

        $post_id = $request->id;
          $post = Post::findOrFail($post_id);
        $oldImage = $post->image;

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,300)->save('upload/postimg/'.$name_gen);
        $save_url = 'upload/postimg/'.$name_gen;

         if (file_exists($oldImage)) {
           unlink($oldImage);
        }

        Post::findOrFail($post_id)->update([

            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Product Image Post Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 
   
    public function destroy($id)
    {

  $post = Post::findOrFail($id);
    unlink($post->image);

    Post::findOrFail($id)->delete();


    $notification = array(
        'message' => 'Post Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}

    public function GetSubCategory($category_id)
    {
         $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_en','ASC')->get();
            return json_encode($subcat);
    }

    public function GetSubDistrict($district_id)
    {
         $subdist = SubDistrict::where('district_id',$district_id)->orderBy('subdistrict_en','ASC')->get();
            return json_encode($subdist);
    }
}
