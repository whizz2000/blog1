<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;
class BrandController extends Controller
{
    public function index(){
        $word =request()->word??'';
        $where=[];
        if($word){
            $where[] = ['brand_name','like',"%$word%"];
        }
        $data = Brand::where($where)->orderBy('brand_id','desc')->paginate(2);
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);

    public function create(){
        return view('admin.brand.create');
    }

    public function store(request,$request){

        $post= $request()->except(['_token']);



    if($request->hasfile('brand_logo')){
        $post['brand_logo']=$this->uplaod('brand_logo');
    }
        $res= Brang::insert($post);
        if($res){
            return redirect('')
        }
    }
    }

    if($request->hasfile('brand_logo')){
        $post['brand_logo']=$this->uplaod('brand_logo');
    }
        $res =Brand::insert($post);
        if($res){
            return redirect('./brand/index');
        }


    if($request->hasfile('brand_logo')){
        $post['brand_logo']=$this->uplaod('brand_logo');
    }
    $res = Brand::insert($post);
    if($res){
        return redirect('./brand/index');
    }

    function update(){
        $post = $request->except('_token');
        $res = Brand::where('brand_id','=',$id)->update($post);
        if($res!==false){
            return redirect('/brand/idnex');
        }

    if($request->hasFile('brand_logo')){
        $post['brand_logo'] = $this->upload('brand_logo');
    }
    $res = Brand::insert($post);
    if($res){
        return redirect('/brand/index');
    }

        public function upload($filename){}
             if(request()->file('$filename')->isValid()) { 
            $photo = $request->file($filename);   
            $store_result = $photo->store('uploads')
            return $store_result;
    }
        exit('没有文件或者文件上传出错');

        <a onclick="ajaxdel({{$v->brand_id)}}" href="jacascript:;"

        <script>
            function ajaxdel($id){
                if(!id){
                  return;
             }
             $.get('brand/del/'+id,function(res)){
                 if(res.code=='00000'){
                     alert(res.msg);
                     location.reload();
                 }
             }.'json';
         }

         <script>
            function ajaxdel($id){
                if(!id){
                    return;
                }
                $.get('brand/del/'+id,function(res)){
                    if(res.code=='00000'){
                        alert(res.msg);
                        location.reload();
                    }
                }

            <script>
             function ajax($id){
                 if(!id){
                     return ;
                 }
            $.get('brand/del'+id,function(res)){
                if(res.code=='0000'){
                    alert(res.msg);
                    location.reload(); 
                }
            }
             }
            }