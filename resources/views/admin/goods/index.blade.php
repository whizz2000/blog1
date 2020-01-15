<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
</html>
<h3>商品列表</h3>
<a href="{{url('/goods/create')}}">添加</a>
<form>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>名称</th> 
      <th>货号</th>
      <th>品牌名称</th>
      <th>分类名称</th>
      <th>添加时间</th>
      <th>相册列表</th>
      <th>Logo</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->goods_id}}</td>
      <td class="success">{{$v->goods_name}}</td>
      <td class="warning">{{$v->goods_sn}}</td>
      <td class="active">{{$v->brand_name}}</td>
      <td class="success">{{$v->cate_name}}</td>
      <td class="warning">{{date('Y-m-d H:i:s',$v->add_time)}}</td>
      <td class="active"> 
      @if($v->goods_imgs)
      @foreach ($v->goods_imgs as $vv)
      <img width="50" src="{{env('UPLOAD_URL')}}{{$vv}}">
      @endforeach
      @endif
      </td>
      <td class="active"><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="100" height="80"}}></td>
      <td><a href="{{url('/goods/show/'.$v->goods_id)}}" class="btn btn-primary">预览</a>|
      <a onclick="ajaxdel({{$v->brand_id}})" href="javascript:void(0)" class="btn btn-primary">删除</a>
      </td>
  </tr>
    @endforeach
    <tr>
    <td colspan="4">{{$data->links()}}</td>
    </tr>
  </tbody>
</table>


<!-- ajax删除 -->
  <script>
      function ajaxdel(id){
        
        if(!id){
          return;
        }
        $.get('/goods/del/'+id,function(res){
          if(res.code=='00004'){
            alert(res.msg);
            location.reload();
          }
        },'json');
        // $.ajaxSetup({
        // headers: {
        //    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').a
        // ttr('content') 
        // }                                                            
        // });
        // $.ajax({
        //   methpd="POST";
        //   url:"/goods/del/"+id,
        
        //   data:'';
        // }).done(function(msg){
        //   alert("Data Saved: " + msg);
        //218页 
        }
      } 