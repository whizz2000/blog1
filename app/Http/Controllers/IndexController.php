<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function test(){
        $name="没人";
        return view('hello',['name'=>$name]);
    }
    public function login(){
        $post =request()->all();
        dump($post);
        return view('login');
    }
    public function dologin(){
        $post =request()->all();
        dd($post);
    }

    public function getgoods($goods_id,$goods_name='iphone'){
        echo 'Id是:'.$goods_id;
        echo "<br>";
        echo '名称是:'.$goods_name;
    }
}
