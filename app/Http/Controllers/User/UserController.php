<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function __construct(){

    }
    /*
     * 列表
     */
    public function index(Request $request){
        $users = User::paginate(10);
        return view('user.list',['users'=>$users]);
    }
    /*
     * 添加
     */
    public function add(Request $request){
        return view('user.add');
    }
    /*
     * 处理数据
     */
    public function postCreate(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt(md5($request->input('password')));
        $status = $request->input('status');
        $user = new User();
        $user->password = $password;
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;
        if($user->save()){
            return redirect('/user/list');
        }
    }
}
