<?php

namespace App\Http\Controllers\Frotend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Ads;
use App\Models\Category;
use App\Models\District;
use App\Models\LiveTv;
use App\Models\Notice;
use App\Models\Post;
use App\Models\Prayer;
use App\Models\Social;
use App\Models\SubCategory;
use App\Models\Website;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function home()
    {

        $social = Social::first();
        $horizontal = Ads::where('type', 2)
        ->first();
        $websitesetting = WebsiteSetting::first();
        $subcategory = SubCategory::where('category_id', 'id')->get();
        $headline = Post::where('headline', 1)->limit(3)->inRandomOrder()->get();
        $notice = Notice::first();
        $firstsectionbig = Post::where('first_section_thumbnail', 1)
            ->orderBy('id', 'desc')
            ->inRandomOrder()
            ->first();
            $firstcategory = Category::first();
      $livetv = LiveTv::first();
        $firstsection = Post::where('first_section', 1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();    

      $dis = District::get();
      $prayer = Prayer::first();
      $websitelink= Website::get();

        return view('frontend.index', [
            'social' => $social,
            'horizontal' =>$horizontal,
            'websitesetting' => $websitesetting,
            'subcategory' => $subcategory,
            'headline' => $headline,
            'notice' => $notice,
            'livetv' => $livetv,
            'firstcategory' =>$firstcategory,
            'firstsectionbig' => $firstsectionbig,
            'firstsection' => $firstsection,
            'dis' => $dis,
            'websitelink' => $websitelink,
            'prayer' => $prayer,
        ]);
    }
    public function Indonesia(){
    	Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang','indonesia');
    	return redirect()->back();

    }

    public function English(){
 	    Session::get('lang');
    	Session()->forget('lang');
    	Session()->put('lang','english');
    	return redirect()->back();
    }

    public function SinglePost($id){
    $post = Db::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->join('subcategories','posts.subcategory_id','subcategories.id')
            ->join('users','posts.user_id','users.id')
            ->select('posts.*','categories.category_en','categories.category_idn','subcategories.subcategory_en','subcategories.subcategory_idn','users.name')
            ->where('posts.id',$id)->first();
            return view('frontend.single_post',compact('post'));

 }


  public function CatPost($id, $category_en){
    $catposts = DB::table('posts')->where('category_id',$id)->orderBy('id','desc')->paginate(5);
    return view('frontend.allpost',compact('catposts'));

  }


  public function SubCatPost($id, $subcategory_en){
     $subcatposts = DB::table('posts')->where('subcategory_id',$id)->orderBy('id','desc')->paginate(5);
    return view('frontend.subpost',compact('subcatposts'));
  }


  public function GetSubDist($district_id){
      $sub = Db::table('sub_districts')->where('district_id',$district_id)->get();
      return response()->json($sub);
  }


  public function SearchDistrict(Request $request){
    $distid = $request->district_id;
    $subdistid = $request->subdistrict_id;


  $catposts = DB::table('posts')->where('district_id',$distid)->where('subdistrict_id',$subdistid)->orderBy('id','desc')->paginate(5);
    return view('frontend.allpost',compact('catposts'));

        }

}
