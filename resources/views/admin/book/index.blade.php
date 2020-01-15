<!Doctype HTML>
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>品牌列表</h3>
<a href="{{url('/book/create')}}">添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字">
<button>搜索</button>
<table class="table">
  <thead>
    <tr>
      <th>名称</th>
      <th>价格</th>
      <th>封面</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr>
      <td class="active">{{$v->book_id}}</td>
      <td class="success">{{$v->book_name}}</td>
      <td class="active"><img src="{{env('UPLOAD_URL')}}{{$v->book_logo}}" width="100" height="80"}}></td>
      <td class="warning">{{$v->book_price}}</td>
      <td><a href="{{url('/book/edit/'.$v->book_id)}}" class="btn btn-primary">修改</a>|
          <a href="{{url('/book/del/'.$v->book_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
    <tr>
    <td colspan="4">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>