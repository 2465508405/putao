<?php
namespace App\Http\Controllers\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleClassify;
class ClassifyController extends Controller{
    public function __contruct(){

    }

    public function index(Request $request){
        $classify = ArticleClassify::paginate(20);
        return view('classify.index',['classify'=>$classify]);
    }

    public function add(Request $request){
        $classify = ArticleClassify::paginate(10);
        return view('classify.add',['classify'=>$classify]);
    }
    public function edit(Request $request,$id){
        $classify = ArticleClassify::get();
        $articleClass = ArticleClassify::where('id',$id)->first();
        return view('classify.edit',['articleClass'=>$articleClass,'classify'=>$classify]);
    }
    public function postEdit(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $pid = $request->input('class');
        $weight = $request->input('weight');
        $show = $request->input('show');
        $classify = ArticleClassify::where('id',$id)->first();
        $classify->name = $name;
        $classify->pid = $pid;
        $classify->weight = $weight;
        $classify->show = $show;
        $classify->save();
        return redirect('/classify/list');
    }
    public function postCreate(Request $request){
        $name = $request->input('name');
        $pid = $request->input('class');
        $weight = $request->input('weight');
        $show = $request->input('show');
        $classify = new ArticleClassify();
        $classify->name = $name;
        $classify->pid = $pid;
        $classify->weight = $weight;
        $classify->show = $show;
        $classify->save();
        return redirect('/classify/list');
    }
}