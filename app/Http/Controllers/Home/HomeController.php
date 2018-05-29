<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdSpace;
use App\Models\ArticleClassify;
use App\Utils\PageUtil;
class HomeController extends Controller
{

    public function index(Request $reques){
        $firstCategory = Category::where('base_id',1)->orderBy('number','desc')->first();
        $firstArticles = Article::where('category_id',$firstCategory->id)->orderBy('number','desc')->limit(10)->get();
        $categories = Category::where('base_id',1)->where('id','!=',$firstCategory->id)->orderBy('number','desc')->limit(3)->get();
        $fourCategory = Category::where('base_id',1)->orderBy('number','asc')->limit(1)->first();
        $fourArticles = Article::where('category_id',$fourCategory->id)->orderBy('number','desc')->limit(10)->get();
        //友情链接
        $links = Link::limit(10)->get();
        return view('home.index',['firstCategory'=>$firstCategory,'categories'=>$categories,'fourCategory'=>$fourCategory,'firstArticles'=>$firstArticles,'fourArticles'=>$fourArticles,'links'=>$links]);
    }

    public function lists(Request $request,$id){
        $page = 1;
        $pageSize = 1;
        $category =  Category::where('id',$id)->first();
        $categories = Category::where('base_id',1)->where('id','!=',$category->id)->orderBy('number','desc')->limit(3)->get();
        $articles = Article::where('status',3)->orderBy('created_at','desc')->paginate($pageSize);
        $pageSize = PageUtil::getPage($page,$articles->total(),$pageSize,$id);
        // dd($pageSize);
        return view('home.list',['category'=>$category,'categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize]);
    }

    public function detail(Request $request,$id){
        $article = Article::where('id',$id)->first();
        $category =  Category::where('id',$article->category_id)->first();
        $categories = Category::where('base_id',1)->where('id','!=',$article->category_id)->orderBy('number','desc')->limit(3)->get();
        return view('home.detail',['article'=>$article,'categories'=>$categories,'category'=>$category]);
    }
}

