<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery-3.2.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<h3>品牌列表</h3>
<h3>欢迎【{{session('user')['username']}}】登陆,<a href="{{url('/logout')}}">退出</h3>
<a href="{{url('/brand/create')}}">添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字">
<button>搜索</button>
<table class="table">
  <caption>上下文表格布局</caption>
  <thead>
    <tr>
      <th>名称</th>
      <th>网址</th> 
      <th>图片</th>
      <th>描述</th> 
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->brand_id}}</td>
      <td class="success">{{$v->brand_name}}</td>
      <td class="active"><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100" height="80"}}></td>
      <td class="warning">{{$v->brand_url}}</td>
      <td class="danger">{{$v->brand_desc}}</td>
      <td><a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">修改</a>|
          <a onclick="ajaxdel({{$v->brand_id}})" href="javascript:void(0)" class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
    <tr>
    <td colspan="4">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>

  <!-- ajax删除 -->
  <script>
      function ajaxdel(id){
        
        if(!id){
          return;
        }
        $.get('/brand/del/'+id,function(res){
          if(res.code=='00000'){
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
        //   url:"/brand/del/"+id,
        
        //   data:'';
        // }).done(function(msg){
        //   alert("Data Saved: " + msg);
        //218页 

        }
        //ajax分页
      $(document).on('click','.pagination a',function(){
        var url = $(this).attr('href');
        $.get(url,function(res){
          $('tbody').html(res);
      });
      return false;
      });
      </script>
</body>
</html>