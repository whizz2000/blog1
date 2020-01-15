<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Validator;
use Illuminate\Support\Facades\cache;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $word =request()->word??'';
        $data = cache ('data');
        if(!$data){
            echo "走DB";
        $where=[];
        if($word){
            $where[]=['brand_name','like',"%$word%"];
        }
        $data =Brand::where($where)->orderBy('brand_id','desc')->paginate(2);
        cache(['data'=>$data],20);
        $query = request()->all();

        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
        //
    }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
           // 'brand_name' => 'required|unique:brand|max:255',
            //'brand_url' => 'required', 
       //],[
           //'brand_name.required'=>'品牌名称必填',
           //'brand_name.unique'  =>'品牌名称已存在',
           //'brand_url.required' =>'品牌网址必填',                  
        //]);

        $post =$request->except(['_token']);
        //$post =$request->only(['_token','brand_name']);

        $validator = Validator::make($request->all(), [
        'brand_name' => 'required|unique:brand|max:255',
        'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_name.unique'  =>'品牌名称已存在',
            'brand_url.required' =>'品牌网址必填',      
                 ]); 

        if ($validator->fails()) { 
            unset($post['brand_logo']);
        return redirect('brand/create')
        ->with('data',$post)
        ->withErrors($validator)
        ->withInput();         
        } 

       if($request->hasFile('brand_logo')){
           $post['brand_logo']=uploads('brand_logo');
       }
        $res =Brand::insert($post);
        if($res){
            return redirect('/brand/index');
        }
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
        $data = Brand::find($id);
        return view('admin.brand.edit',['data'=>$data]);
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
        $post = $request->except('_token');
        $res = Brand::where('brand_id','=',$id)->update($post);
        if($res!==false){
            return redirect('/brand/index');
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
        $res = Brand::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
            }
            return redirect('/brand');
        }
    }

    public function checkOnly(){
        $brand_name = requesr()->brand_name;
        $where = [];
        if($brand_name){
            $where['brand_name'] = $brand_name;
        }
        $count = Brand::where($where)->count();
    }
}
