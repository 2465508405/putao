<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Advertisement;
use App\Models\AdSpace;
use App\Models\BaseConfig;
use App\Models\Goods;
use App\Utils\PageUtil;
class HomeController extends Controller
{

    public function index(Request $reques){
        $firstCategory = Category::where('base_id',1)->orderBy('number','desc')->first();
        $firstArticles = Article::where('category_id',$firstCategory->id)->where('status',3)->orderBy('created_at','desc')->take(10)->get();
        $categories = Category::where('base_id',1)->where('id','!=',$firstCategory->id)->orderBy('number','desc')->limit(3)->get();
        $fourCategory = Category::where('base_id',1)->orderBy('number','asc')->limit(1)->first();
        $goods = Goods::where('status',3)->get();
        $fourArticles = Article::where('category_id',$fourCategory->id)->where('status',3)->orderBy('created_at','desc')->take(8)->get();
        //友情链接
        $links = Link::take(10)->get();
        $baseConfig = BaseConfig::first();
        return view('home.index',['firstCategory'=>$firstCategory,'categories'=>$categories,'fourCategory'=>$fourCategory,'firstArticles'=>$firstArticles,'fourArticles'=>$fourArticles,'links'=>$links,'goods'=>$goods,'baseConfig'=>$baseConfig]);
    }

    public function lists(Request $request,$id){
        $position = strpos($id, 's');;
        
        if($position < 0 || $position === false){
            $id = $id;
            $page=1;
        }else{
            $info = $id;
            $id = substr($id, 0,strpos($info, 's'));
            $page = substr($id,strpos($info, 's')+1);
        }
        $request->page = $page;
        $pageSize = 10;
        $category =  Category::where('id',$id)->first();
        $categories = Category::where('base_id',1)->where('id','!=',$category->id)->orderBy('number','desc')->limit(3)->get();
        $articles = Article::where('status',3)->where('category_id',$id)->orderBy('created_at','desc')->paginate($pageSize);
        $pageSize = PageUtil::getPage($page,$articles->total(),$pageSize,$id,'s');
        return view('home.list',['category'=>$category,'categories'=>$categories,'articles'=>$articles,'pageSize'=>$pageSize]);
    }

    public function detail(Request $request,$id){
        $article = Article::where('id',$id)->first();
        $article->visit_num = $article->visit_num+1;
        $article->save();
        $category =  Category::where('id',$article->category_id)->first();
        $nextArticle = Article::where('id',$id+1)->first();
        $prevArticle = Article::where('id',$id-1)->first();
        $categories = Category::where('base_id',1)->where('id','!=',$article->category_id)->orderBy('number','desc')->take(3)->get();
        return view('home.detail',['article'=>$article,'categories'=>$categories,'category'=>$category,'nextArticle'=>$nextArticle,'prevArticle'=>$prevArticle]);
    }

    public function goodsDetail(Request $request,$id){
        $goods = Goods::where('id',$id)->where('status',3)->first();
        $goods->visit_num = $goods->visit_num+1;
        $goods->save();
        $nextGoods = Goods::where('id',$id+1)->first();
        $prevGoods = Goods::where('id',$id-1)->first();
        $category =  Category::where('id',1)->first();
        $categories = Category::where('base_id',1)->where('id','!=',1)->orderBy('number','desc')->take(3)->get();
        return view('home.goodsDetail',['goods'=>$goods,'categories'=>$categories,'category'=>$category,'nextGoods'=>$nextGoods,'prevGoods'=>$prevGoods]);
    }
}