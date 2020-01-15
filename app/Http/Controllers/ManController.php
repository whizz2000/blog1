<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Db;
use App\Man;
use Illuminate\Support\Facades\cache;
class ManController extends Controller
{
      /** Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
{       
        $word = request()->word??'';
        $page = request()->page?:1;

        $data = cache('data_'.$page);
        echo 'data_'.$page;
        dump($data);

        if(!$data){
            echo"走db";
        $where=[];
        if($word){
            $where[]=['man_name','like',"%$word%"];
        }
        $data =man::where($where)->orderBy('man_id','desc')->paginate(2);
        cache(['data_'.$page=>$data],20);


    }

        $query = request()->all();

        return view('admin.man.index',['data'=>$data,'query'=>$query]);
        //
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.man.create');
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'man_name' => 'required|unique:man|max:255',
            'man_age' => 'required', 
       ],[
           'man_name.required'=>'员工名称必填',
           'man_name.unique'  =>'员工名称已存在',
           'man_age.required' =>'员工年龄必填',                  
        ]);

        $post =$request->except(['_token']);
        //$post =$request->only(['_token','man_name']);

       if($request->hasFile('man_logo')){
           $post['man_logo']=$this->upload('man_logo');
       }
        $res =man::insert($post);
        if($res){
            return redirect('/man/index');
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
        $data = man::find($id);
        return view('admin.man.edit',['data'=>$data]);
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
        $res = man::where('man_id','=',$id)->update($post);
        if($res!==false){
            return redirect('/man/index');
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
        $res = man::where('man_id',$id)->delete();
        if($res){
            return redirect('/man/index');
        }
    }
}
