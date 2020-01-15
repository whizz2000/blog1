<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
class LoginController extends Controller
{
     //session存
    //session(['username'=>'admin']);
    //session(['password'=>'123']);
    //request()->session()->save();
    //session 取
    //$username = session('username');
    //$password = session('password');
    //删除
    //session(['name=>null']);

    //request()实列
    //request()->session()->put('age',18);
    //request()->session()->save();

    //$age = request()->session()->get('age');
    //$all = request()->session()->all();
    
    public function dologin(Request $request){
        $post = $request->except('_token');
        $user = Login::where($post)->first();
        //dd($user);
        if($user){
            session(['user'=>$user]);
            request()->session()->save();
            return redirect('/goods/index');
        }
        return redirect('/login')->with('msg','没有此用户!请联系管理员');
    }

    public function logout(){
        session(['user'=>null]);
        request()->session()->save();
        return redirect('/login');
    } 
}