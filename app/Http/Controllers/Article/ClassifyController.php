<?php
namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleClassify;
class ClassifyController extends Controller
{

    public function index(Request $request){
        $classifies = ArticleClassify::paginate(10);
        return view('articles.classifyList',['classifies'=>$classifies]);
    }

    public function add(Request $request){
        $classifies = ArticleClassify::paginate(10);
        return view('articles.classifyAdd',['classifies'=>$classifies]);
    }

    public function postCreate(Request $request){
        $name = $request->input('name');
        $pid = $request->input('pid');
        $classify = new ArticleClassify();
        $classify->name = $name;
        $classify->pid = $pid;
        if($classify->save()){
            return redirect('position/list');
        }
    }
}
