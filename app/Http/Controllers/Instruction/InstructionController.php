<?php

namespace App\Http\Controllers\Instruction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instruction;
use App\Models\Category;
use App\Models\Article;
class InstructionController extends Controller
{
    public function index(Request $request){
        $instruction = Instruction::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('instruction.index',['instruction'=>$instruction,'categories'=>$categories]);
    }

    public function hindex(Request $request){
        $instruction = Instruction::first();
        $data['related'] = $instruction;
        $articles = Article::where('category_id',2)->take(7)->get();
        $data['articles'] = $articles;
        return view('h5.home.related',$data);
    }
}
