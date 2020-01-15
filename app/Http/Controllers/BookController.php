<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use validator ;
class BookController extends Controller
{
    public function index(){
        $word = request()->word??'';
        $where=[];
        if($word){
            $where[]=['book_name','like',"%$word%"];
        }
        $data=Book::where($where)->paginate(2);
        $query = request()->all(); 
        return view('admin.book.index',['data'=>$data,'query'=>$query]);
    }
    public function create()
    {

        return view('admin.book.create');
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request){

         $validatedData = $request->validate([
        'book_name' => 'required|unique:book|max:255',
        'book_price' => 'required', 
       ],[
           'book_name.required'=>'图书名称必填',
           'book_name.unique'  =>'图书名称已存在',
           'book_price.required' =>'图书价格必填',                  
        ]);

        $post =$request->except(['_token']);
    
        if($request->hasFile('book_logo')){
            $post['book_logo']=$this->upload('book_logo');
        }
         $res =book::insert($post);
         if($res){
             return redirect('/book/index');
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


    public function show($id)
    {
    }

    public function edit($id){
        $data=Book::find($id);
        return view('admin.book.edit',['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $post = $request->except('_token');
        $res = book::where('book_id','=',$id)->update($post);
        if($res!==false){
            return redirect('/book/index');
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
        $res = book::where('book_id',$id)->delete();
        if($res){
            return redirect('/book/index');
        }
    }
}
