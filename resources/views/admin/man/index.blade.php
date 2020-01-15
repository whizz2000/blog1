<!Doctype HTML> /..///./
<html>
<head>
    <meta charset=utf-8>
    <title></title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
</html>
<h3>员工列表</h3>
<a href="{{url('/man/create')}}">添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字">
<button>搜索</button>
<table class="table">
  <caption>上下文表格布局</caption>
  <thead>
    <tr>
      <th>ID</th>
      <th>姓名</th>
      <th>年龄</th>
      <th>图片</th>
      <th>操作</th></tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
  <tr> 
      <td class="active">{{$v->man_id}}</td>
      <td class="success">{{$v->man_name}}</td>
      <td class="warning">{{$v->man_age}}</td>
      <td class="danger"><img src="{{env('UPLOAD_URL')}}{{$v->man_logo}}" width="100" height="80"}}></td>
      <td><a href="{{url('/man/edit/'.$v->man_id)}}" class="btn btn-primary">修改</a>|
          <a href="{{url('/man/del/'.$v->man_id)}}"  class="btn btn-primary">删除</a></span>
      </td>
  </tr>
    @endforeach
    <tr>
    <td colspan="4">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>