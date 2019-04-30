<?php

namespace App\Http\Controllers\Notice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Category;
use App\Models\Article;
class NoticeController extends Controller
{
    public function index(){
        $notice = Notice::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('notice.index',['notice'=>$notice,'categories'=>$categories]);
    }
    public function hindex(){
        $notice = Notice::first();
        $data['related'] = $notice;
        $articles = Article::where('category_id',2)->take(7)->get();
        $data['articles'] = $articles;
        return view('h5.home.related',$data);
    }
}
