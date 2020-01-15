<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\news;
use App\Http\Requests\StorenewPost;
use Validator;
use Illuminate\Support\Facades\cache;
class newController extends Controller
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
            $where[]=['new_name','like',"%$word%"];
        }
        $data =news::where($where)->orderBy('new_id','desc')->paginate(2);
        cache(['data'=>$data],20);
        $query = request()->all();

        return view('admin.new.index',['data'=>$data,'query'=>$query]);
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
        return view('admin.new.create');
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
           // 'new_name' => 'required|unique:new|max:255',
            //'new_url' => 'required', 
       //],[
           //'new_name.required'=>'品牌名称必填',
           //'new_name.unique'  =>'品牌名称已存在',
           //'new_url.required' =>'品牌网址必填',                  
        //]);

        $post =$request->except(['_token']);
        //$post =$request->only(['_token','new_name']);

        $res =news::insert($post);
        if($res){
            return redirect('/new/index');
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
        $data = news::find($id);
        return view('admin.new.edit',['data'=>$data]);
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
        $res = news::where('new_id','=',$id)->update($post);
        if($res!==false){
            return redirect('/new/index');
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
        $res = news::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
            }
            return redirect('/new');
        }
    }

    public function checkOnly(){
        $new_name = requesr()->new_name;
        $where = [];
        if($new_name){
            $where['new_name'] = $new_name;
        }
        $count = news::where($where)->count();
    }
}
