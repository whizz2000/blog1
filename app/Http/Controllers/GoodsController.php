<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Category;
use DB;
use Validator;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{

    public function sendemail()
    {
        Mail::to('2756571228@qq.com')->send(new SendCode());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pageSize = config('app.pageSize');
        $data = Goods::select('goods.*','brand.brand_name','category.cate_name')
                ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
                ->leftjoin('category','goods.cate_id','=','category.cate_id')
                ->paginate($pageSize);

                foreach($data as $v){
                    if($v->goods_imgs){
                       $v->goods_imgs = explode('|', $v->goods_imgs);
                    }
                }
        return view('admin.goods.index',['data'=>$data]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取品牌数据
        $brand = Brand::get();
        //dd($brand);
        //获取分类数据
        $category = Category::get();
        $category =createTree($category);
        //dd($category);
        return view('admin.goods.create',['brand'=>$brand,'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
        //dd($post);
        //单文件上传
        if(request()->hasFile('goods_img')){
            $post['goods_img']=uploads('goods_img');
        }
        //多文件上传
        if( isset($post['goods_imgs'])){
            $post['goods_imgs'] = moreuploads('goods_imgs');
            $post['goods_imgs'] = implode ('|', $post['goods_imgs']);
        }
            $post['add_time'] = time();
            $post['update_time'] =time();
        $res = Goods::insert($post);
        if($res){
            return redirect('/goods/index');
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
        //访问量
        $res = Redis::setnx('show_'.$id,1);
        if(!$res){
            Redis::incr('show_'.$id);
        }
        $current = Redis::get('show_'.$id);
        $goods = Goods::find($id);
        return view('admin.goods.show',['goods'=>$goods,'current'=>$current]);
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
        //
        $post = $request->except('_token');
        //文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=uploads('brand_logo');
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
        $res = Goods::destroy($id);
        if($res){
            if(request()->ajax()){
                echo json_encode(['code'=>'00004','msg'=>'删除成功']);die;
            }
            return redirect('/goods/index');
        }
    }
    public function addcart(){
       $goods_id = request()->goods_id;
       $buy_number = 1;
       //判断用户是否登陆
       if(!$this->isLogin()){
           //echo json_encode(['code'=>'00001','msg'=>'未登录,请登陆']);die;
           //未登录存入cookie
       }
       //登陆存入Db
       $this->addDBcart($goods_id,$buy_number);
}


    public function addDBcart($goods_id,$buy_number){
        //求商品信息
        $goods = Goods::where('goods_id',$goods_id)->first();
        //判断库存
        if($goods->goods_number<$buy_number){
            echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
        }
        $user_id = session('admin')['admin_id'];
        //判断用户之前是否购买过
        $cart = Db::table('cart')->where(['goods_id'=>$goods_id,'user_id'=>$user_id])->first();
        if($cart){
            //更新购买数量
                //判断库存
        if($cart->buy_number+$buy_number>$goods->goods_number){
            echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
        }
            $res = DB::table('cart')->where(['goods_id'=>$goods_id,'user_id'=>$user_id])->increment('buy_number');
            if($res) {echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;}
        }
        //没有买够则正常添加数据
        $data = [
            'user_id'=>$user_id,
            'goods_id'=>$goods_id,
            'buy_number'=>1,
            'goods_price'=>$goods->goods_price,
            'addtime' =>time(),
        ];
        $res = DB::table('cart')->insert($data);
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'加入购物车成功']);die;
        }
    }


    public function isLogin(){
        $user = session('admin');
        if(!$user){
            return false;
        }
        return true;
    }
}