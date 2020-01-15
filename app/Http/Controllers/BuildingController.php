<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use Validator;
class BuildingController extends Controller
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
            $where[]=['building_name','like',"%$word%"];
        }
        $data =Building::where($where)->orderBy('building_id','desc')->paginate(2);
        $query = request()->all();

        return view('admin.building.index',['data'=>$data,'query'=>$query]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.building.create');
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
        // 'building_name' => 'required|unique:building|max:255',
        //'building_url' => 'required',
        //],[
        //'building_name.required'=>'品牌名称必填',
        //'building_name.unique'  =>'品牌名称已存在',
        //'building_url.required' =>'品牌网址必填',
        //]);

        $post =$request->except(['_token']);
        //$post =$request->only(['_token','building_name']);

        $validator = Validator::make($request->all(), [
            'building_name' => 'required|unique:building|max:255',
            'building_where' => 'required',
        ],[
            'building_name.required'=>'小区名称必填',
            'building_name.unique'  =>'小区名称已存在',
            'building_where.required' =>'地理位置必填',
        ]);

        if ($validator->fails()) {
            unset($post['building_logo']);
            return redirect('building/create')
                ->with('data',$post)
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('building_logo')){
            $post['building_logo']=$this->upload('building_logo');
        }
        $res =building::insert($post);
        if($res){
            return redirect('/building/index');
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
        $data = building::find($id);
        return view('admin.building.edit',['data'=>$data]);
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
        $res = building::where('building_id','=',$id)->update($post);
        if($res!==false){
            return redirect('/building/index');
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
        $res = building::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
            }
            return redirect('/building');
        }
    }
}
