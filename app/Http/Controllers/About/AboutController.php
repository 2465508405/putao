<?php

namespace App\Http\Controllers\About;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('about.index',['about'=>$about,'categories'=>$categories]);
    }

    public function hindex(){
        $about = About::first();
        $data['related'] = $about;
        $articles = Article::where('category_id',2)->take(7)->get();
        $data['articles'] = $articles;
        return view('h5.home.related',$data);
    }
}
