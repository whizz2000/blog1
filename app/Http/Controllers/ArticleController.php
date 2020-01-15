<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\article;
use App\Http\Requests\StorearticlePost;
use Validator;
class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $word =request()->word??'';
        $where=[];
        if($word){
            $where[]=['article_name','like',"%$word%"];
        }
        $data =article::where($where)->orderBy('article_id','desc')->paginate(2);
        $query = request()->all();

        return view('admin.article.index',['data'=>$data,'query'=>$query]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        
       //$validatedData = $request->validate([
           // 'article_name' => 'required|unique:article|max:255',
            //'article_url' => 'required', 
       //],[
           //'article_name.required'=>'品牌名称必填',
           //'article_name.unique'  =>'品牌名称已存在',
           //'article_url.required' =>'品牌网址必填',                  
        //]);

        $post =$request->except(['_token']);
        //$post =$request->only(['_token','article_name']);

        $validator = Validator::make($request->all(), [
        'article_name' => 'required|unique:article|max:255',
        'article_cate' => 'required',
        'is_show'      => 'required',
        ],[
            'article_name.required'=>'名称必填',
            'article_name.unique'  =>'名称已存在',
            'article_cate.required' =>'分类必填',   
            'is_show.required'     => '是否展示必填',

                 ]); 

        if ($validator->fails()) { 
        return redirect('article/create')
        ->withErrors($validator)
        ->withInput();         
        } 

       if($request->hasFile('article_logo')){
           $post['article_logo']=$this->upload('article_logo');
       }
        $res =article::insert($post);
        if($res){
            return redirect('/article/index');
        }
    }

    public function upload($filename){
        if(request()->file($filename)->isValid()){
        //接收文件
        $photo = request()->file($filename);
        //上传文件
        $store_result = $photo->store('uploads');
        return $store_result;
        }
        exit('没有文件或者文件上传出错');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = article::first($id);
        return view('admin.article.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = request()->except('_token');
        $data = article::where('article_id','=',$id)->update($post);
        if($data!==false){
            return redirect('/article/index',['post'=>$post]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = article::where('article_id',$id)->delete();
        if($res){
            return redirect('/article/index');
        }
    }
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                