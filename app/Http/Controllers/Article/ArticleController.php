<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $artcles = Article::paginate(10);
        return view('articles.list',['articles'=>$artcles]);
    }

    public function add(Request $request){
        return view('articles.add');
    }
    /*
     * 添加文章
     */
    public function postCreate(Request $request){
        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('detail');
        $article->content = $request->input('content');
        $article->thumbPic = $request->input('imgurl');
        if($article->save()){
            return redirect('/article/list');
        }
    }
    /*
     *标题图上传
     */
    public function upload(Request $request)
    {
        $file =$request->input('base64');
        $seg = explode(";",$file);
        if(sizeof($seg)!=2){
            return resError(400,"wrong paramater" );
        }
        $segments = explode(",",$seg[1]);
        if(sizeof($segments)!=2){
            return resError(400,"wrong paramter");
        }
        $data = $segments[1];
        $encoding = $segments[0];

        $header = explode(":",$seg[0]);
        if(sizeof($header)!=2){
            return resError(400,"wrong paramter");
        }

        $mime = explode("/",$header[1]);
        if(sizeof($header)!=2){
            return resError(400,"wrong paramter");
        }
        $extName =  strtolower($mime[1]);
        if(!in_array($extName,array("jpg","bmp","gif","png","jpeg"))) {
            return resError(403,"bad extension name of the file");
        }
        try{
            $real_data = base64_decode($data);
        }catch(Exception $e){
            return resError(402,"parse data failed");
        }
        $y= date("Ym");
            $subDirectory = date("Ym/d/");
        $destDirectory = $this->getUploadDirectory() . $subDirectory;
        if (!file_exists($destDirectory)) {
            mkdir($destDirectory, 0777, true);
        }
        $extension = $extName;
        $mime = $header[1];
        $filename = $this->buildPasteFileName($extension);
        file_put_contents($destDirectory.$filename,$real_data);
        $clientSize = filesize($destDirectory.$filename);
        return  json_encode(['status'=>0,'imgurl'=>'/thumb' . DIRECTORY_SEPARATOR . $subDirectory . $filename]);
    }

    private function buildPasteFileName($extension){
        $fi = microtime(true).rand(0,99999);
        return $fi.'.'.$extension;
    }
    private function getUploadDirectory(){
        return '/Users/yangzhengxing/project/images/thumb/';
    }
}
