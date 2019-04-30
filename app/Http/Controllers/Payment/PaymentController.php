<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Category;
use App\Models\Article;
class PaymentController extends Controller
{

    public function index(){
        $payment = Payment::first();
        $categories = Category::where('base_id',1)->orderBy('number','desc')->limit(3)->get();
        return view('payment.index',['payment'=>$payment,'categories'=>$categories]);
    }
    public function hindex(){
        $payment = Payment::first();
        $data['related'] = $payment;
        $articles = Article::where('category_id',2)->take(7)->get();
        $data['articles'] = $articles;
        return view('h5.home.related',$data);
    }
}
