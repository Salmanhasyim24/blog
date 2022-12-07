<?php

namespace App\Http\Controllers\Frotend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function home()
    {

        $firstsectionbig = Post::where('first_section_thumbnail', 1)
            ->orderBy('id', 'desc')
            ->first();

        $firstsection = Post::where('first_section', 1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();    
        return view('frontend.index', [
            'firstsectionbig' => $firstsectionbig,
            'firstsection' => $firstsection,
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
}
